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
                    <th scope="col">Ações</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($chamados as $chamado)
                        <tr>
                            <th>{{ $chamado->id }}</th>
                            <td>{{ $chamado->titulo }}</td>
                            <td>{{ $chamado->categoria->tipo }}</td>
                            <td>@mdo</td>
                            <td>{{\Carbon\Carbon::parse($chamado->data_criacao)->format('d/m/Y') }}</td>
                            <td>{{\Carbon\Carbon::parse($chamado->prazo_solucao)->format('d/m/Y') }}</td>
                            <td>{{\Carbon\Carbon::parse($chamado->data_solucao)->format('d/m/Y') }}</td>
                            <td>
                                <a href="{{route('chamado.show', ['chamado' => $chamado->id])}}">
                                    <button type="button" class="btn btn-primary bt-sm">Visualizar</button>
                                    </a>
                            </td>
                        </tr>
                    @empty
                        <span style="color: #f00;"> Nenhum chamado encontrado!</span>
                    @endforelse 
                </tbody>
            </table>  
          </div>
    </div>
    @forelse ($chamados as $chamado)
        <tr>
            <td></td>
            {{-- <td>{{ $chamado->descricao }}</td> --}}
            <td></td>
            <td>
                <form action="{{ route('chamado.update', $chamado->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <select name="situacao_id">
                        <option value="pendente" {{ $chamado->situacao_id == 'pendente' ? 'selected' : '' }}>Pendente</option>
                        <option value="resolvido" {{ $chamado->situacao_id == 'resolvido' ? 'selected' : '' }}>Resolvido</option>
                    </select>

                    <button type="submit">Salvar</button>
                </form>
            </td>
            <a href="{{route('chamado.show', ['chamado' => $chamado->id])}}">Visualizar</a>
        </tr>
        <hr>
    @empty
        <span style="color: #f00;"> Nenhum chamado encontrado!</span>
     @endforelse 

@endsection