<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriaModel;

class AdministradorController extends BaseController
{
    public function index(): string{
        //Solicitar las secciones: HEADER+FOOTER
        $datos['headeradmin'] = view('layout/headeradmin'); 
        return view('administrador/inicio', $datos);
    }

    public function crear(): string
    {
        $datos['headerAdmin'] = view('layout/headeradmin'); 
        $datos['footerAdmin'] = view('layout/footeradmin'); 

        return view('categorias/crear', $datos);
    }
}
