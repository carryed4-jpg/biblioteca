<?php
// Incluir el header
include(APPPATH . 'Views/layout/header.php');
?>

<!-- inicio carrusel -->
<div class="container mt-4">
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/img/libro-en-biblioteca-con-libro-de-texto-abierto.jpg" class="d-block w-100" alt="Libro en biblioteca" style="height:400px; object-fit:cover;">
            </div>
            <div class="carousel-item">
                <img src="/img/libro-en-biblioteca-con-libro-de-texto-abierto.jpg" class="d-block w-100" alt="Libro en biblioteca" style="height:400px; object-fit:cover;">
            </div>
            <div class="carousel-item">
                <img src="/img/libro-en-biblioteca-con-libro-de-texto-abierto.jpg" class="d-block w-100" alt="Libro en biblioteca" style="height:400px; object-fit:cover;">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- carrusel fin -->

<!-- card1  inicio novedades-->
<div class="container mt-4">
    <div class="row">
        <h3>Novedades</h3>
        <?php if (!empty($libros) && is_array($libros)): ?>
            <?php foreach ($libros as $libro): ?>
                <div class="col-md-3 mb-4">
                    <div class="card" style="width: 16rem;">
                        <img src="<?= !empty($libro['portada']) ? $libro['portada'] : '/img/libro-en-biblioteca-con-libro-de-texto-abierto.jpg' ?>" class="card-img-top" alt="Portada del libro">
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($libro['titulo']) ?></h5>
                            <p class="card-text">
                                <?php 
                                    $resumen = isset($libro['descripcion']) ? strip_tags($libro['descripcion']) : '';
                                    if (strlen($resumen) > 120) {
                                        $resumen = substr($resumen, 0, 120) . '...';
                                    }
                                    echo esc($resumen);
                                ?>
                            </p>
                            <a href="#" class="btn btn-primary">Ver más</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay libros para mostrar.</p>
        <?php endif; ?>
    </div>
</div>

<!-- card 2 inicio los 10 mejores-->
 <div class="container mt-4">
    <div class="row">
        <h2>10 Mejores</h2>
        <div class="col-md-3">
            <div class="card" style="width: 16rem;">
                <img src="/img/libro-en-biblioteca-con-libro-de-texto-abierto.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card" style="width: 16rem;">
                <img src="/img/libro-en-biblioteca-con-libro-de-texto-abierto.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card" style="width: 16rem;">
                <img src="/img/libro-en-biblioteca-con-libro-de-texto-abierto.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card" style="width: 16rem;">
                <img src="/img/libro-en-biblioteca-con-libro-de-texto-abierto.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- card 2 fin -->

<?php
// Incluir el footer
include(APPPATH . 'Views/layout/footer.php');