<?php
/**
 * Partial para mostrar los botones de navegación de carruseles
 * 
 * Variables esperadas:
 * @param string $carouselId - ID del carrusel al que se conectarán los botones
 */
?>

<!-- Estilo en línea para posicionar los botones más a los laterales -->
<style>
    #<?= $carouselId ?> .carousel-control-prev {
        left: 10px; /* Mueve el botón más a la izquierda */
        width: 40px;
        height: 40px;
        background-color: rgba(0, 0, 0, 0.2);
        border-radius: 50%;
        top: 50%;
        transform: translateY(-50%);
        z-index: 10; /* Aumentar la prioridad de apilamiento */
        display: flex !important; /* Forzar visualización */
        align-items: center;
        justify-content: center;
    }
    
    #<?= $carouselId ?> .carousel-control-next {
        right: 10px; /* Mueve el botón más a la derecha */
        width: 40px;
        height: 40px;
        background-color: rgba(0, 0, 0, 0.2);
        border-radius: 50%;
        top: 50%;
        transform: translateY(-50%);
        z-index: 10; /* Aumentar la prioridad de apilamiento */
        display: flex !important; /* Forzar visualización */
        align-items: center;
        justify-content: center;
    }
    
    #<?= $carouselId ?> .carousel-control-prev:hover,
    #<?= $carouselId ?> .carousel-control-next:hover {
        background-color: rgba(0, 0, 0, 0.5);
    }
    
    /* Asegurar que el contenedor del carrusel tenga posición relativa y espacio a los lados */
    #<?= $carouselId ?> {
        position: relative;
        padding: 0 0px; /* Añadimos más espacio en los lados */
        overflow: visible !important; /* Forzar la visibilidad del desbordamiento */
    }
</style>

<button class="carousel-control-prev d-flex align-items-center justify-content-center" type="button" data-bs-target="#<?= $carouselId ?>" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Anterior</span>
</button>
<button class="carousel-control-next d-flex align-items-center justify-content-center" type="button" data-bs-target="#<?= $carouselId ?>" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Siguiente</span>
</button>
