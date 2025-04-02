@extends('layouts.admin')
@section('content')
    
    <a href="{{route('chamado.index')}}">Listar</a>
    <h2>   Cadastra chamado</h2>
    <form action="{{route('chamado.store')}}" method="POST">
        @csrf
        <label>Titulo: </label>
        <input type="text" name="titulo" id="titulo" placeholder="Digite o Titulo"><br>

        <label for="categoria_id">Categoria: </label>
        <select name="categoria_id" id="categoria" required>
            <option value="" disabled selected>Selecione uma categoria</option>
            @foreach ($categorias as $categoria)
                <option value="{{$categoria->id}}"> {{ $categoria->tipo }}</option>
            @endforeach
        </select>

        <label for="descricao">Descrição: </label>
        <textarea name="descricao" id="descricao" rows="4" placeholder="Descreva o chamado" required> </textarea>

        <label for="prazo_solucao">Prazo de Solução:</label>
        <input type="date" name="prazo_solucao" id="prazo_solucao" readonly>

        <input type="hidden" name="data_criacao" value="{{ now()->format('Y-m-d') }}">
        <input type="hidden" name="situacao_id" value="{{ $situacaoInicial->id }}">

        <button type="submit">Cadastrar Chamado</button>

    </form>

    <script>
       
        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date();
            today.setDate(today.getDate() + 3);
            const formattedDate = today.toISOString().split('T')[0];
            document.getElementById('prazo_solucao').value = formattedDate;
        });
    </script>

@endsection
