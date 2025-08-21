<?php
// Incluir el header
include(APPPATH . 'Views/layout/header.php');
?>

<!-- Libro popular destacado -->
<div class="m-4">
    <?php
    // Mostrar un libro popular aleatorio (basado en favoritos)
    $librosPopulares = isset($librosPopulares) ? $librosPopulares : (isset($librosCarrusel) ? $librosCarrusel : $libros);
    if (!empty($librosPopulares)):
        $librosPopularesSlice = array_slice($librosPopulares, 0, 5);
        $totalPop = count($librosPopularesSlice);
        $randIndex = rand(0, $totalPop - 1);
        $libro = $librosPopularesSlice[$randIndex];
        $img = !empty($libro['imagen']) ? base_url('/img/' . $libro['imagen']) : base_url('/img/libro-en-biblioteca-con-libro-de-texto-abierto.jpg');
    ?>
    <section class="hero-libro-destacado mb-4" style="position:relative; min-height:620px; background: url('<?= $img ?>') center center/cover no-repeat; border-radius:1rem; overflow:hidden;">
        <div class="position-absolute top-0 start-0 w-100 h-100" style="background:rgba(20,20,20,0.7);">
            <div class=" h-100 position-relative z-1">
                <div class="row h-100 align-items-center ">
                    <div class="col-8 text-white py-5">
                        <div class="m-5">
                            <h1 style="font-family: 'Nunito', sans-serif; font-weight: 800; letter-spacing: -0.5px;" class="display-4 mb-3"><i class="bi bi-star-fill me-2"></i><?= esc($libro['titulo']) ?></h1>
                            <?php if (!empty($libro['autor'])): ?>
                                <p style="font-family: 'Montserrat', sans-serif; font-weight: 500;" class="lead mb-1"><i class="bi bi-person-fill me-1"></i> <strong>Autor:</strong> <?= esc($libro['autor']) ?></p>
                            <?php endif; ?>
                            <?php if (!empty($libro['anioPublicacion'])): ?>
                                <p style="font-family: 'Montserrat', sans-serif;" class="mb-1"><i class="bi bi-calendar me-1"></i> <strong>Publicado:</strong> <?= esc($libro['anioPublicacion']) ?></p>
                            <?php endif; ?>
                            <?php if (!empty($libro['favoritos'])): ?>
                                <p style="font-family: 'Montserrat', sans-serif;" class="mb-2"><i class="bi bi-heart-fill text-danger me-1"></i> <span class="badge bg-light text-dark"> <?= $libro['favoritos'] ?> favoritos</span></p>
                            <?php endif; ?>
                            <?php if (!empty($libro['descripcion'])): ?>
                                <p style="font-family: 'Nunito', sans-serif; font-weight: 300; line-height: 1.6;" class="mb-4 fs-5"> <?= substr(esc($libro['descripcion']), 0, 250) ?><?= (strlen($libro['descripcion']) > 250) ? '...' : '' ?></p>
                            <?php endif; ?>
                            <div class="d-flex gap-3 mt-4">
                                <a href="<?= base_url('catalogo/leer/' . $libro['idRecurso']) ?>" style="font-family: 'Montserrat', sans-serif; font-weight: 600; letter-spacing: 0.5px;" class="btn btn-success btn-lg px-4 shadow"><i class="bi bi-book me-1"></i> Leer</a>
                                <a href="<?= base_url('catalogo/detalle/' . $libro['idRecurso']) ?>" style="font-family: 'Montserrat', sans-serif; font-weight: 600; letter-spacing: 0.3px;" class="btn btn-outline-light btn-lg px-4"><i class="bi bi-info-circle me-1"></i> Más info</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php else: ?>
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 mb-4">
                <img src="<?= base_url('/img/libro-en-biblioteca-con-libro-de-texto-abierto.jpg') ?>" class="card-img-top" alt="No hay libros populares">
                <div class="card-body text-center">
                    <h5 class="text-muted">No hay libros populares en este momento</h5>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

<!-- Libros recomendados como carrusel -->
<div class="mt-4 m-4">
    <h2 style="font-family: 'Nunito', sans-serif; font-weight: 700; letter-spacing: -0.3px; color: #333;">Libros recomendados</h2>
    <?php 
    $mostrarLibros = (isset($librosRecomendados) && count($librosRecomendados) > 0) ? $librosRecomendados : (isset($libros) && is_array($libros) ? $libros : []);
    $total = count($mostrarLibros);
    $porSlide = 5;
    ?>
    <?php if($total > 0): ?>
    <div id="carouselRecomendados" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php for($i = 0; $i < $total; $i += $porSlide): ?>
                <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
                    <div class="row row-cols-1 row-cols-md-5 g-4">
                        <?php for($j = $i; $j < $i + $porSlide && $j < $total; $j++): 
                            $libro = $mostrarLibros[$j];
                            $img = !empty($libro['imagen']) ? base_url('/img/' . $libro['imagen']) : base_url('/img/libro-en-biblioteca-con-libro-de-texto-abierto.jpg');
                        ?>
                        <div class="col">
                            <?php 
                            // Usar el partial para mostrar la tarjeta
                            $tipo = (isset($librosRecomendados) && count($librosRecomendados) > 0) ? 'recomendado' : 'general';
                            $truncateDescripcion = 100;
                            include(APPPATH . 'Views/partials/libro_card.php'); 
                            ?>
                        </div>
                        <?php endfor; ?>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
        <?php 
        $carouselId = 'carouselRecomendados';
        include(APPPATH . 'Views/partials/carousel_buttons.php');
        ?>
    </div>
    <?php else: ?>
        <div class="col-12">
            <div class="alert alert-warning">
                <i class="bi bi-exclamation-circle me-2"></i> No hay libros recomendados disponibles en este momento.
            </div>
        </div>
    <?php endif; ?>
</div>
<!-- Libros disponibles-->
<div class="m-4 mt-4">
    <h2>Disponibles para préstamo</h2>
    <?php 
    $librosDisponibles = array_filter($libros ?? [], function($libro) {
        return isset($libro['cantidad']) && $libro['cantidad'] > 0;
    });
    $totalDisp = count($librosDisponibles);
    $porSlideDisp = 5;
    $librosDisponibles = array_values($librosDisponibles); // Reindexar para acceso por índice
    ?>
    <?php if($totalDisp > 0): ?>
    <div id="carouselDisponibles" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php for($i = 0; $i < $totalDisp; $i += $porSlideDisp): ?>
                <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
                    <div class="row row-cols-1 row-cols-md-5 g-4">
                        <?php for($j = $i; $j < $i + $porSlideDisp && $j < $totalDisp; $j++): 
                            $libro = $librosDisponibles[$j];
                            $img = !empty($libro['imagen']) ? $libro['imagen'] : '/img/libro-en-biblioteca-con-libro-de-texto-abierto.jpg';
                        ?>
                        <div class="col">
                            <?php 
                            // Usar el partial para mostrar la tarjeta
                            $tipo = 'disponible';
                            $truncateDescripcion = 150; // Un poco más largo para esta sección
                            include(APPPATH . 'Views/partials/libro_card.php'); 
                            ?>
                        </div>
                        <?php endfor; ?>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
        <?php 
        $carouselId = 'carouselDisponibles';
        include(APPPATH . 'Views/partials/carousel_buttons.php');
        ?>
    </div>
    <?php else: ?>
        <div class="col-12">
            <div class="alert alert-info">
                No hay libros disponibles para prestar en este momento.
            </div>
        </div>
    <?php endif; ?>
</div>
<!-- Top 10 libros más leídos -->
<div class="mt-4 m-4">
    <h2>Top 10 Libros más leídos</h2>
    <?php 
    $librosTopLeidos = isset($librosTopLeidos) && is_array($librosTopLeidos) ? $librosTopLeidos : [];
    $mostrarTop = !empty($librosTopLeidos) ? $librosTopLeidos : (isset($libros) && is_array($libros) ? $libros : []);
    $totalTop = count($mostrarTop);
    $porSlideTop = 5;
    ?>
    <?php if($totalTop > 0): ?>
    <div id="carouselTopLeidos" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php $contador = 1; ?>
            <?php for($i = 0; $i < $totalTop; $i += $porSlideTop): ?>
                <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
                    <div class="row row-cols-1 row-cols-md-5 g-4">
                        <?php for($j = $i; $j < $i + $porSlideTop && $j < $totalTop; $j++): 
                            $libro = $mostrarTop[$j];
                            $img = !empty($libro['imagen']) ? base_url('/img/' . $libro['imagen']) : base_url('/img/libro-en-biblioteca-con-libro-de-texto-abierto.jpg');
                        ?>
                        <div class="col">
                            <?php 
                            // Usar el partial para mostrar la tarjeta
                            $tipo = 'top';
                            $posicion = $contador++;
                            $truncateDescripcion = 100;
                            include(APPPATH . 'Views/partials/libro_card.php'); 
                            ?>
                        </div>
                        <?php endfor; ?>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
        <?php 
        $carouselId = 'carouselTopLeidos';
        include(APPPATH . 'Views/partials/carousel_buttons.php');
        ?>
    </div>
    <?php else: ?>
        <div class="col-12">
            <div class="alert alert-info">
                <i class="bi bi-exclamation-circle me-2"></i> No hay libros disponibles en este momento.
            </div>
        </div>
    <?php endif; ?>
</div>
<?php
// Incluir el footer
include(APPPATH . 'Views/layout/footer.php');