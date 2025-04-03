@extends('layouts.admin')

@section('content')

    <div class="card mt-4 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Novo Chamado</span>
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
            <form action="{{route('chamado.store')}}" method="POST" class="row g-3">
                @csrf

                <div class="col-12">
                <label for="titulo" class="form-label">Titulo </label>
                    <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Digite o Titulo"><br>
                </div>

                <div class="col-12">
                    <label for="categoria_id" class="form-label">Categoria</label>
                    <select name="categoria_id" id="categoria" class="form-control" required>
                        <option value="" disabled selected>Selecione uma categoria</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{$categoria->id}}"> {{ $categoria->tipo }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12">
                    <label for="descricao" class="form-label">Descrição </label>
                    <textarea name="descricao" id="descricao" class="form-control"   rows="4" placeholder="Descreva o chamado" required> </textarea>
                </div>

                <div class="col-12">
                    <label for="prazo_solucao" class="form-label">Prazo de Solução:</label>
                    <input type="date" name="prazo_solucao" id="prazo_solucao" class="form-control"  readonly>
                </div>

                <div class="col-12">
                    <input type="hidden" name="data_criacao" value="{{ now()->format('Y-m-d') }}">
                    <input type="hidden" name="situacao_id" value="{{ $situacaoInicial->id }}">
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-success btn-sm">Cadastrar Chamado</button>
                </div>
                
        
            </form>
        </div>
    </div>
   

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date();
            today.setDate(today.getDate() + 3);
            const formattedDate = today.toISOString().split('T')[0];
            document.getElementById('prazo_solucao').value = formattedDate;
        });
    </script>

@endsection
