<div class="container mt-2">
    <h4>Lista de categorías</h4>

    <table class="table table-sm">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categorias as $categoria): ?>
                <tr>
                    <td><?= esc($categoria['idCategoria']) ?></td>
                    <td><?= esc($categoria['nombre']) ?></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-info">Editar</a>
                        <a href="#" class="btn btn-sm btn-danger">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="#" class="btn btn-sm btn-success">Registrar</a>
</div>
<?= $footeradmin; ?>
