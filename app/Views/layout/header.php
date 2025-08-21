<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogo</title>
    <!-- Google Fonts: Preconexión para cargar fuentes más rápido -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Google Fonts: Montserrat para títulos y Nunito para texto -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5: Framework CSS principal -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome 7: Biblioteca de iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Estilos personalizados: CSS propio de la aplicación (con parámetro v para evitar caché) -->
    <link href="<?= base_url('css/main.css') ?>?v=<?= time() ?>" rel="stylesheet">
</head>
<body>
    <div class="m-4 mt-0">
        <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">
                <a class="navbar-brand" href="#" style="font-family: 'Montserrat', sans-serif; text-decoration: none;">
                    <span style="font-weight: 300; font-size: 28px; letter-spacing: 1px;">
                        <span style="color: #D4AF37; font-weight: 500;">liber</span><span style="color: #9B0000; font-weight: 600;">.</span><span style="color: #9B0000; font-weight: 600;">hzg</span>
                    </span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link fs-5 text-dark" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link fs-5 text-dark" href="#">Mis Favoritos</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link fs-5 text-dark" href="#">Historial</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link fs-5 text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categorías
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (isset($categorias) && is_array($categorias)): ?>
                            <?php foreach ($categorias as $cat): ?>
                                <li><a class="dropdown-item" href="#"><?= esc($cat['nombre']) ?></a></li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li><a class="dropdown-item" href="#">Sin categorías</a></li>
                        <?php endif; ?>
                    </ul>
                    </li>
                </ul>
                
                <!-- Search Icon Button -->
                <button class="btn btn-link text-secondary position-relative p-0 border-0" type="button" data-bs-toggle="modal" data-bs-target="#searchModal">
                        <i class="fa-solid fa-search fs-4"></i>
                </button>

                <!-- Modal Buscador -->
                <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content bg-white">
                            <div class="modal-body p-4">
                                <form class="d-flex justify-content-center" role="search" action="#" method="GET">
                                    <div class="input-group input-group-lg w-100">
                                        <input class="form-control border border-dark" type="search" name="q" placeholder="Buscar libro o autor" aria-label="Buscar" style="outline: none; box-shadow: none;" autocomplete="off">
                                        <button class="btn btn-outline-dark d-flex align-items-center justify-content-center" type="submit" style="outline: none; box-shadow: none;">
                                            <i class="fa-solid fa-search fs-5"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Notifications Dropdown -->
                <div class="ms-2 position-relative dropdown">
                    <button class="btn btn-link text-secondary position-relative p-0 border-0" type="button" id="notificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-regular fa-bell fs-4"></i>
                        <!-- Badge for notifications count -->
                        <?php if (isset($notificaciones) && is_array($notificaciones) && count($notificaciones) > 0): ?>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.6rem;">
                                <?= count($notificaciones) ?>
                                <span class="visually-hidden">notificaciones no leídas</span>
                            </span>
                        <?php endif; ?>
                    </button>
                    
                    <div class="dropdown-menu dropdown-menu-end p-0 mt-1 shadow" aria-labelledby="notificationsDropdown" style="width: 320px; max-height: 400px; overflow-y: auto;">
                        <div class="p-2 bg-white border-bottom">
                            <h6 class="m-0">Notificaciones</h6>
                        </div>
                        <div>
                            <?php if (isset($notificaciones) && is_array($notificaciones) && count($notificaciones) > 0): ?>
                                <ul class="list-group list-group-flush">
                                    <?php foreach ($notificaciones as $noti): ?>
                                        <li class="list-group-item d-flex align-items-center">
                                            <div class="me-2">
                                                <i class="fa-solid fa-circle-info text-primary"></i>
                                            </div>
                                            <div>
                                                <?= esc($noti['mensaje']) ?>
                                                <div class="text-muted small">Hace 1 hora</div>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php else: ?>
                                <div class="p-3 text-center">Sin notificaciones</div>
                            <?php endif; ?>
                        </div>
                        <?php if (isset($notificaciones) && is_array($notificaciones) && count($notificaciones) > 0): ?>
                            <div class="p-2 text-center border-top">
                                <a href="#" class="text-decoration-none text-primary small">Ver todas</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- User Profile Dropdown -->
                <div class="ms-2"></div>
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-user me-1 fs-4"></i> 
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="/perfil.php"><i class="fa-solid fa-user-circle me-2"></i>Ver Perfil</a></li>
                                <li><a class="dropdown-item" href="/configuracion.php"><i class="fa-solid fa-cog me-2"></i>Configuración</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="/logout.php"><i class="fa-solid fa-sign-out-alt me-2"></i>Cerrar sesión</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                </div>
            </div>
        </nav>
    </div>
    <main>