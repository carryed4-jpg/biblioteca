<?php
namespace App\Models;

use CodeIgniter\Model;

class RecursoModel extends Model
{
    protected $table = 'recurso';
    protected $primaryKey = 'idRecurso';
    protected $allowedFields = [
        'codigo',
        'titulo',
        'autor',
        'idCategoria',
        'idTipo',
        'idNivel',
        'anioPublicacion',
        'urlDigital',
        'cantidad',
        'ubicacion',
        'descripcion',
        'portada',
        'formato',
        'observacion'
    ];
}
