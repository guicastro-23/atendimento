@extends('layouts.admin')

@section('content')
    
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
    
