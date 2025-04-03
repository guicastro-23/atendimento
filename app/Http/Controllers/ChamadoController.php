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

       
        $validated['data_criacao'] = now();

        Chamado::create($validated);
        return redirect()->route('chamado.index')->with('success', 'Chamado criado com sucesso!');

    }

    public function show(Chamado $chamado)
    {
        $situacoes = Situacao::all();
        return view('chamados.show', compact('chamado', 'situacoes'));
    }

    public function destroy(Chamado $chamado)
    {
       $chamado->delete();
       return redirect()->route('chamado.index')->with('success', 'Conta excluida com sucesso');
    }

    public function atualizarSituacao(Request $request, Chamado $chamado)
    {
        $request->validate([
            'situacao_id' => 'required|exists:situacoes,id'
        ]);
    
        $situacao = Situacao::find($request->situacao_id);
    
        $chamado->situacao_id = $situacao->id;
        
        if ($situacao->status == 'Resolvido') {
            $chamado->data_solucao = now();
        }elseif ($chamado->getOriginal('situacao_id') == Situacao::where('nome', 'Resolvido')->first()->id) {
            $chamado->data_solucao = null;
        }

        $chamado->save();
    
        return redirect()->route('chamado.show', $chamado->id)
                        ->with('success', 'Situação atualizada!');
    }

    public function percentual()
    {
        $inicioMes = now()->startOfMonth();
        $fimMes = now()->endOfMonth();

        $totalResolvidos = Chamado::where('situacao_id', Situacao::where('status', 'Resolvido')->first()->id)
                       ->whereBetween('data_solucao', [$inicioMes, $fimMes])
                       ->count();

        $resolvidosPrazo = Chamado::where('situacao_id', Situacao::where('status', 'Resolvido')->first()->id)
                         ->whereBetween('data_solucao', [$inicioMes, $fimMes])
                         ->whereColumn('data_solucao', '<=', 'prazo_solucao')
                         ->count();
    
        $percentualSLA = $totalResolvidos > 0 ? round(($resolvidosPrazo / $totalResolvidos) * 100, 2) : 0;

        return view('welcome', ['percentualSLA' => $percentualSLA]);
    }
}
