@extends('layouts.admin')

@section('content')

<body>
    

    <div class="container mt-4">
        <div class="row g-3">
            <div class="col-md-2">
                <div class="card text-center shadow-sm p-3">
                    <div class="status fw-bold">Concluídos</div>
                    <div class="percentual fs-4 text-success">79%</div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card text-center shadow-sm p-3">
                    <div class="status fw-bold">Chamados Abertos</div>
                    <div class="fs-4 text-primary">302</div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card text-center shadow-sm p-3">
                    <div class="status fw-bold">Em Andamento</div>
                    <div class="fs-4 text-warning">55</div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card text-center shadow-sm p-3">
                    <div class="status fw-bold">Pendentes</div>
                    <div class="fs-4 text-danger">4</div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card text-center shadow-sm p-3">
                    <div class="status fw-bold">SLA</div> 
                     <div class="fs-4 text-success">{{ $percentualSLA }}%</div>
                </div>
            </div>
        </div>
    </div>
@endsection
