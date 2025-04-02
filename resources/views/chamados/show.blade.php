@extends('layouts.admin')

@section('content')

    <div class="card mt-4 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Visualizar Chamado</span>
            <span>
                <a href="{{route('chamado.index')}}">
                    <button type="button" class="btn btn-info btn-sm">Listar</button>
                </a>
            </span>
        </div>
    </div>
    
    <a href="{{route('chamado.index')}}">Listar</a>
    <h2>Informações do Chamado</h2>
    ID: {{$chamado->id}}<br>
    Titulo: {{$chamado->titulo}}<br>
    Categoria: {{$chamado->categoria->tipo}}<br>
    Situação: {{$chamado->situacao->status}}<br>
    Data de Criação: {{ \Carbon\Carbon::parse($chamado->data_criacao)->format('d/m/Y') }}<br>
    Prazo de Solução: {{ \Carbon\Carbon::parse($chamado->prazo_solucao)->format('d/m/Y') }}<br>
    Data de Solução: {{ \Carbon\Carbon::parse($chamado->data_solucao)->format('d/m/Y') }}<br>
@endsection
    
