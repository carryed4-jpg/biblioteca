<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\RecursoModel;
use App\Models\CategoriaModel;

class CatalogoController extends Controller
{
    public function index()
    {
        $categoriaModel = new CategoriaModel();
        $data['categorias'] = $categoriaModel->getAllCategorias();

        $idUsuario = session()->get('idUsuario');
        $recursoModel = new RecursoModel();
        $data['libros'] = $recursoModel->findAll();
        $data['librosRecomendados'] = $recursoModel->getLibrosRecomendadosPorUsuario($idUsuario, 4);

        return view('catalogo/index', $data);
    }
}
