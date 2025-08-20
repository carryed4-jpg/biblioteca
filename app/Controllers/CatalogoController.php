<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\RecursoModel;

class CatalogoController extends Controller
{
    public function index()
    {
        // Cargar los datos del footer y header
        $data['header'] = view('layout/header');
        $data['footer'] = view('layout/footer');

        // Obtener los libros desde la base de datos
        $recursoModel = new RecursoModel();
        $data['libros'] = $recursoModel->findAll();

        return view('catalogo/index', $data);
    }
}
