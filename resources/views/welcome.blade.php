@extends('layouts.admin')

@section('content')

<div class="card mt-4 mb-4 border-light shadow">
    <div class="card-header d-flex justify-content-between">
        <span>
            <a href="{{route('chamado.create')}}">
                <button type="button" class="btn btn-info btn-sm"> Novo Chamado</button>
            </a>
        </span>
    </div>
    <div class="container mt-4">
        <div class="row g-3">
            <div class="col-md-2">
                <div class="card text-center shadow-sm p-3">
                    <div class="status fw-bold">Resolvidos</div> 
                    <div class="fs-4 text-success">{{$resolvidos}}</div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card text-center shadow-sm p-3">
                    <div class="status fw-bold">Chamados Abertos</div>
                    <div class="fs-4 text-primary">{{$abertos}}</div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card text-center shadow-sm p-3">
                    <div class="status fw-bold">Pendentes</div>
                    <div class="fs-4 text-danger">{{$pendentes}}</div>
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
</div>
@endsection
