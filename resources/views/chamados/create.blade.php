<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atendimento</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.6;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        input, textarea, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 15px;
        }
        button:hover {
            background-color: #45a049;
        }
        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            text-decoration: none;
            color: #333;
        }
    </style>
</head>
<body>
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
        // Define automaticamente o prazo de solução (3 dias após hoje)
        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date();
            today.setDate(today.getDate() + 3);
            const formattedDate = today.toISOString().split('T')[0];
            document.getElementById('prazo_solucao').value = formattedDate;
        });
    </script>
</body>
</html>