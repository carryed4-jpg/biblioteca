<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriaModel;

class CategoriaController extends BaseController
{
    public function index(): string{
        $categoria = new CategoriaModel();

        $datos['categorias'] = $categoria->orderBy('idCategoria', 'ASC')->findAll();


        //Solicitar las secciones: HEADER+FOOTER
        $datos['headeradmin'] = view('layout/headeradmin'); 
        $datos['footeradmin'] = view('layout/footeradmin'); 

        return view('categorias/listar', $datos);
    }

    public function crear(): string
    {
        $datos['headerAdmin'] = view('layout/headeradmin'); 
        $datos['footerAdmin'] = view('layout/footeradmin'); 

        return view('categorias/crear', $datos);
    }

    public function guardar()
    {
        $categoriaModel = new CategoriaModel();

        $nombre = $this->request->getPost('nombre');

        $categoriaModel->insert(['nombre' => $nombre]);

        return redirect()->to(base_url('categoria'));
    }

    public function editar($idCategoria): string
    {
        $categoriaModel = new CategoriaModel();

        $datos['categoria'] = $categoriaModel->find($idCategoria);
        $datos['headerAdmin'] = view('layout/headeradmin'); 
        $datos['footerAdmin'] = view('layout/footeradmin'); 

        return view('categorias/editar', $datos);
    }

    public function actualizar()
    {
        $categoriaModel = new CategoriaModel();

        $id = $this->request->getPost('idCategoria');
        $nombre = $this->request->getPost('nombre');

        $categoriaModel->update($id, ['nombre' => $nombre]);

        return redirect()->to(base_url('categoria'));
    }

    public function eliminar($idCategoria)
    {
        $categoriaModel = new CategoriaModel();
        $categoriaModel->delete($idCategoria);

        return redirect()->to(base_url('categoria'));
    }
}

