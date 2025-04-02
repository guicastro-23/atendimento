<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Atendimento</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container ">
            <header class="d-flex justify-content-between align-items-center w-100 ">
                <ul class="nav nav-pills justify-content-center">
                    <li class="nav-item"><a href="{{url('/')}}" class="nav-link active" aria-current="page">Home</a></li>
                    <li class="nav-item"><a href="{{route('chamado.index')}}" class="nav-link">Chamados</a></li>
                    
                    {{-- <li class="nav-item"><a href="#" class="nav-link">FAQs</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">About</a></li> --}}
                </ul>
            </header>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>
    
</body>

</html>