<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Atendimento</title>

    </head>
    <body>
        <h1>SLA</h1>
        <a href="{{route('chamado.index')}}">Listar os Chamados</a>
    </body>
</html>
