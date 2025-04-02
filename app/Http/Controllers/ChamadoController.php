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
        return view('chamados.index');
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


}
