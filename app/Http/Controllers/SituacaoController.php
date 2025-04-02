<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SituacaoController extends Controller
{
    public function index()
    {
        return view('situacoes.index');
    }

    public function create()
    {
        return view('situacoes.create');
    }
}
