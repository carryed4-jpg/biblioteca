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
        'anioPublicacion',
        'urlDigital',
        'cantidad',
        'ubicacion',
        'descripcion',
        'portada',
        'formato',
        'observacion',
        'fechaRegistro'
    ];
    
    /**
     * Obtiene libros recomendados para un usuario según las categorías que ha leído (prestado), excluyendo los ya leídos.
     */
    public function getLibrosRecomendadosPorUsuario($idUsuario, $limite = 4)
    {
        $db = \Config\Database::connect();
        // Libros leídos por el usuario
        $prestados = $db->table('prestamo')
            ->select('idRecurso')
            ->where('idUsuario', $idUsuario)
            ->get()
            ->getResultArray();
        $idsLeidos = array_column($prestados, 'idRecurso');

        // Categorías de esos libros
        $categorias = [];
        if (!empty($idsLeidos)) {
            $categoriasQuery = $db->table('recurso')
                ->select('idCategoria')
                ->whereIn('idRecurso', $idsLeidos)
                ->get()
                ->getResultArray();
            $categorias = array_unique(array_column($categoriasQuery, 'idCategoria'));
        }

        // Buscar otros libros de esas categorías, excluyendo los ya leídos
        if (!empty($categorias)) {
            $builder = $db->table('recurso');
            $builder->whereIn('idCategoria', $categorias);
            if (!empty($idsLeidos)) {
                $builder->whereNotIn('idRecurso', $idsLeidos);
            }
            $builder->limit($limite);
            $query = $builder->get();
            return $query->getResultArray();
        }
        return [];
    }
}
