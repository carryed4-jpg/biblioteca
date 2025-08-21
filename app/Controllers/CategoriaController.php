<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CategoriaController extends BaseController
{

    public function index(): string{
        //Solicitar las secciones: HEADER+FOOTER
        $datos['headerAdmin'] = view('layout/headeradmin'); 
        $datos['footerAdmin'] = view('layout/footeradmin'); 

        return view('categorias/listar', $datos);
    }

    public function crear() : string{
        return view('categorias/crear');
    }

    public function editar() : string {
        return view('categorias/editar');
    }
}