@extends('layouts.admin')

@section('content')

    <div class="card mt-4 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Listar Chamados</span>
            <span>
                <a href="{{route('chamado.create')}}">
                    <button type="button" class="btn btn-success btn-sm">Novo Chamado</button>
                </a>
            </span>
        </div>

        @if (session('success'))
            <div class="alert alert-success m-3" role="alert">
                {{session('success')}}
            </div>
        @endif

        <div class="card-body">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Categoria</th>

                    <th scope="col">Situação</th>

                    <th scope="col">Data de Criação</th>
                    <th scope="col">Prazo de Solução</th>
                    <th scope="col">Data de Solução</th>
                    <th scope="col" class="text-center">Ações</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($chamados as $chamado)
                        <tr>
                            <th>{{ $chamado->id }}</th>
                            <td>{{ $chamado->titulo }}</td>
                            <td>{{ $chamado->categoria->tipo }}</td>
                            <td>{{$chamado->situacao->status}}</td>
                            <td>{{\Carbon\Carbon::parse($chamado->data_criacao)->format('d/m/Y') }}</td>
                            <td>{{\Carbon\Carbon::parse($chamado->prazo_solucao)->format('d/m/Y') }}</td>
                            <td>{{\Carbon\Carbon::parse($chamado->data_solucao)->format('d/m/Y') }}</td>
                            <td class="d-md-flex justify-content-center">
                                <a href="{{route('chamado.show', ['chamado' => $chamado->id])}}">
                                    <button type="button" class="btn btn-primary bt-sm me-1">Visualizar/Atender</button>
                                </a>
                                <form action="{{route('chamado.destroy', ['chamado' => $chamado->id])}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger bt-sm me-1"
                                    onclick="return confirm('Tem certeza que deseja apagar o chamado?')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <span style="color: #f00;"> Nenhum chamado encontrado!</span>
                    @endforelse 
                </tbody>
            </table>  
        </div>
    </div>
@endsection