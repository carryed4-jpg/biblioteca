<?= $headerAdmin; ?>

<div class="container mt-2">
  <h4>Lista de Categorías</h4>

  <table class="table table-sm table-striped">
    <colgroup>
      <col width="20%">
      <col width="60%">
      <col width="20%">
    </colgroup>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($categorias as $categoria): ?>
      <tr>
        <td><?= $categoria['idCategoria'] ?></td>
        <td><?= $categoria['nombre'] ?></td>
        <td>
          <a href="<?= base_url('categoria/editar/' . $categoria['idCategoria']) ?>" class="btn btn-sm btn-info">Editar</a>
          <a href="<?= base_url('categoria/eliminar/' . $categoria['idCategoria']) ?>" class="btn btn-sm btn-danger">Eliminar</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <a href="<?= base_url('categoria/crear') ?>" class="btn btn-sm btn-success">Registrar Nueva Categoría</a>
</div>
