<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Chamado;
use App\Models\Situacao;
use Illuminate\Http\Request;

class ChamadoController extends Controller
{
    public function index()
    {
        // Listar os registros de chamados
        $chamados = Chamado::orderBy('created_at')->get();
        $situacoes = Situacao::all();
        return view('chamados.index', compact('chamados', 'situacoes'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        $situacaoInicial =Situacao::where('status', 'Novo')->first();
        return view('chamados.create', compact('categorias', 'situacaoInicial'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'categoria_id' => 'required|exists:categorias,id',
            'prazo_solucao' => 'required|date',
            'situacao_id' => 'required|exists:situacoes,id'
        ]);

        // Adiciona a data de criação automática
        $validated['data_criacao'] = now();

        Chamado::create($validated);
        return redirect()->route('chamado.index')->with('success', 'Chamado criado com sucesso!');

    }

    public function update(Request $request, $id)
    {
        $chamado = Chamado::findOrFail($id);

        // Buscar o ID correto da situação com base no status
        $situacao = Situacao::where('status', $request->situacao_id)->first();

        if (!$situacao) {
            return redirect()->route('chamados.index')->with('error', 'Situação inválida!');
        }

        // Atualiza a situação
        $chamado->situacao_id = $situacao->id;

     
        if ($situacao->status === 'Resolvido') {
            $chamado->data_solucao = now();
        } else {
            $chamado->data_solucao = null; 
        }

        $chamado->save();

        return redirect()->route('chamado.index')->with('success', 'Chamado atualizado com sucesso!');
    }

    public function show(Chamado $chamado)
    {
       
        return view('chamados.show', compact('chamado'));
    }

    public function destroy(Chamado $chamado)
    {
       $chamado->delete();
       return redirect()->route('chamado.index')->with('success', 'Conta excluida com sucesso');
    }


}
