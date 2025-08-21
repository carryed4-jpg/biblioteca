<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CategoriaController extends BaseController
{

    public function index(): string{
        return view('categorias/listar');
    }

    public function crear() : string{
        return view('categorias/crear');
    }

    public function editar() : string {
        return view('categorias/editar');
    }
}