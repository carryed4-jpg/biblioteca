<?php
namespace App\Models;

use CodeIgniter\Model;

class CategoriaModel extends Model
{
    protected $table = 'categoria';
    protected $primaryKey = 'idCategoria';
    protected $allowedFields = ['nombre'];

    public function getAllCategorias()
    {
        return $this->orderBy('nombre', 'ASC')->findAll();
    }
}
