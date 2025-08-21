<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Biblioteca - Sidebar Bootstrap</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
  />
</head>
<body>

<div class="d-flex">
  <!-- Sidebar vertical -->
  <nav class="nav flex-column bg-light vh-100 p-3" style="width: 220px;">
    <a class="navbar-brand mb-4" href="#">Biblioteca</a>
    <a class="nav-link" href="<?= base_url('categorias'); ?>">Categorias</a>
    <a class="nav-link" href="<?= base_url('editoriales'); ?>">Libros</a>
    <a class="nav-link" href="<?= base_url('editoriales'); ?>">Recursos</a>
    <a class="nav-link" href="<?= base_url('editoriales'); ?>">Usuarios</a>
    <a class="nav-link" href="<?= base_url('editoriales'); ?>">Prestamos</a>
    <a class="nav-link" href="<?= base_url('editoriales'); ?>">Reseñas</a>
  </nav>

  <!-- Contenido principal -->
  <main class="flex-grow-1 p-3">
    <h1>Bienvenido a la Biblioteca</h1>
  </main>
</div>

<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
></script>
</body>
</html>
