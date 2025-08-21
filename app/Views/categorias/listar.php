<?= $headeradmin; ?>

<div class="container mt-2">
    <h4>Lista de libros</h4>

  <table class="table table-sm">
    <colgroup>
      <col widht="10%">
      <col widht="40%">
      <col widht="30%">
      <col widht="20%">
    </colgroup>
    <thead>
      <tr>
        <th>Id</th>
        <th>Categorias</th>
        <th>Acciones</th>
      </tr>
    </thead>
      <tbody>
        <?php foreach($categorias as $categoria): ?>
        <tr>
          <td><?= $categoria['idCategoria'] ?></td>
          <td><?= $categoria['nombre'] ?></td>
          <td>
            <a href="" class="btn btn-sm btn-info">Editar</a>
            <a href="" class="btn btn-sm btn-danger">Eliminar</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
  </table>
  <a href="/libros/crear" class="btn btn-sm btn-success">Registrar</a>
</div>