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
    

        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">ID:</dt>
                <dd class="col-sm-9">{{$chamado->id}}</dd>
            </dl>
            <dl class="row">
                <dt class="col-sm-3">Titulo:</dt>
                <dd class="col-sm-9">{{$chamado->titulo}}</dd>
            </dl>
            <dl class="row">
                <dt class="col-sm-3">Categoria:</dt>
                <dd class="col-sm-9">{{$chamado->categoria->tipo}}</dd>
            </dl>

            <dl class="row">
                <dt class="col-sm-3">Descrição:</dt>
                <dd class="col-sm-9">{{$chamado->descricao}}</dd>
            </dl>
            <dl class="row">
                <dt class="col-sm-3">Situação:</dt>
                <dd class="col-sm-9">{{$chamado->situacao->status}}<br></dd>
            </dl>

            <dl class="row">
                <dt class="col-sm-3">Data de Criação:</dt>
                <dd class="col-sm-9"> {{ \Carbon\Carbon::parse($chamado->data_criacao)->format('d/m/Y') }}<br></dd>
            </dl>

            <dl class="row">
                <dt class="col-sm-3">Prazo de Solução:</dt>
                <dd class="col-sm-9">{{ \Carbon\Carbon::parse($chamado->prazo_solucao)->format('d/m/Y') }}<br></dd>
            </dl>

            <dl class="row">
                <dt class="col-sm-3"> Data de Solução:</dt>
                <dd class="col-sm-9">{{ \Carbon\Carbon::parse($chamado->data_solucao)->format('d/m/Y') }}<br></dd>
            </dl>
        </div>
    </div>
@endsection
    
