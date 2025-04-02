<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    // Listar as Categorias 
    public function index()
    {
       return view('categorias.index');
    }

    // Carregar o formulario cadastrar nova categoria 
    public function create()
    {
        return view('categorias.create');
    }

    public function store()
    {
        return view('categorias.store');
    }

}
