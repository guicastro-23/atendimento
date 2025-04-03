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

        @if(session('success'))
            <div class="alert alert-success m-3" role="alert">
                {{session('success')}}
            </div>
        @endif

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
                <dd class="col-sm-9">
                <form action="{{ route('chamado.atualizar-situacao', $chamado->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PUT')
                    <div class="input-group input-group-sm" style="max-width: 200px;">
                        <select name="situacao_id" class="form-select form-select-sm" style="width: auto;">
                            @foreach($situacoes as $situacao)
                                <option value="{{ $situacao->id }}" 
                                    {{ $chamado->situacao_id == $situacao->id ? 'selected' : '' }}>
                                    {{ $situacao->status }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-sm btn-outline-primary ms-2">Atualizar</button>
                    </div>
                </form><br>
                </dd>
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
    
