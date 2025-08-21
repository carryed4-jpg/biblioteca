<?php
/**
 * Partial para mostrar una tarjeta de libro en diferentes secciones de la aplicación
 * Estilo inspirado en Netflix/streaming con imagen ocupando todo el card
 * 
 * Variables esperadas:
 * @param array $libro - Datos del libro (título, autor, descripción, etc.)
 * @param string $tipo - Tipo de tarjeta (recomendado, destacado, top, disponible)
 * @param int $posicion - Posición en ranking (para tarjetas de tipo 'top')
 * @param string $truncateDescripcion - Longitud máxima para la descripción (180 por defecto para mostrar al menos 3 líneas)
 */
$truncateDescripcion = $truncateDescripcion ?? 180; // Incrementado para mostrar al menos 3 líneas de texto
$imgHeight = $imgHeight ?? 450; // Altura incrementada para mejor visualización
$imgUrl = !empty($libro['imagen']) ? base_url('/img/' . $libro['imagen']) : base_url('/img/libro-en-biblioteca-con-libro-de-texto-abierto.jpg');
$tipo = $tipo ?? 'general';

// Configuración según el tipo de tarjeta
$cardConfig = [
    'recomendado' => [
        'borderClass' => '',
        'badgeClass' => 'bg-warning',
        'badgeIcon' => 'bi-star-fill',
        'badgeText' => 'Recomendado'
    ],
    'top' => [
        'borderClass' => '',
        'badgeClass' => 'bg-primary rounded-pill',
        'badgeIcon' => '',
        'badgeText' => $posicion ?? ''
    ],
    'disponible' => [
        'borderClass' => '',
        'badgeClass' => 'bg-success',
        'badgeIcon' => 'bi-check-circle-fill',
        'badgeText' => 'Disponible'
    ],
    'general' => [
        'borderClass' => '',
        'badgeClass' => '',
        'badgeIcon' => '',
        'badgeText' => ''
    ]
];

$config = $cardConfig[$tipo];
// URL de la página de detalle
$detalleUrl = base_url('catalogo/detalle/' . $libro['idRecurso']);
?>

<a href="<?= $detalleUrl ?>" class="text-decoration-none d-block h-100">
    <div class="card h-100 <?= $config['borderClass'] ?> overflow-hidden shadow-sm position-relative"
         style="transition: all 0.3s ease-out; cursor: pointer; transform-origin: center;"
         onmouseover="this.style.boxShadow='0 0.8rem 1.5rem rgba(0, 0, 0, 0.35)'; this.style.transform='translateY(-10px) scale(1.03)'; this.style.zIndex='10';" 
         onmouseout="this.style.boxShadow=''; this.style.transform='translateY(0) scale(1)'; this.style.zIndex='1';">
        <!-- Imagen ocupando todo el card -->
        <div class="card-img-container position-relative" style="height: <?= $imgHeight ?>px;">
            <img src="<?= $imgUrl ?>" alt="<?= esc($libro['titulo']) ?>" class="w-100 h-100" style="object-fit: cover;">
        
            <!-- Overlay con gradiente negro para mejor lectura del texto -->
            <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(0deg, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.4) 50%, rgba(0,0,0,0.1) 100%);">
            <!-- Badge de tipo -->
            <?php if (!empty($config['badgeText'])): ?>
                <div class="position-absolute top-0 <?= ($tipo === 'top') ? 'start-0' : 'end-0' ?> p-2 z-index-1">
                    <span class="badge <?= $config['badgeClass'] ?>" style="font-family: 'Montserrat', sans-serif; font-weight: 500;">
                        <?php if (!empty($config['badgeIcon'])): ?>
                            <i class="bi <?= $config['badgeIcon'] ?> me-1"></i>
                        <?php endif; ?>
                        <?= $config['badgeText'] ?>
                    </span>
                </div>
            <?php endif; ?>
            
            <!-- Información del libro -->
            <div class="position-absolute bottom-0 start-0 w-100 p-3 text-white">
                <h5 style="font-family: 'Nunito', sans-serif; font-weight: 700; font-size: 1.1rem; line-height: 1.3;" class="mb-1">
                    <?= esc($libro['titulo']) ?>
                </h5>
                
                <?php if (!empty($libro['autor'])): ?>
                    <p style="font-family: 'Montserrat', sans-serif; font-weight: 500; font-size: 0.9rem;" class="mb-1">
                        <i class="bi bi-person-fill me-1"></i> <?= esc($libro['autor']) ?>
                    </p>
                <?php endif; ?>
                
                <!-- Mostrar año si está disponible -->
                <?php if (!empty($libro['anioPublicacion'])): ?>
                    <p style="font-family: 'Montserrat', sans-serif; font-size: 0.8rem;" class="mb-1 text-light">
                        <i class="bi bi-calendar me-1"></i> <?= esc($libro['anioPublicacion']) ?>
                    </p>
                <?php endif; ?>
                
                <!-- Estadísticas (lecturas, favoritos) -->
                <div class="d-flex gap-2 mb-2">
                    <?php if (!empty($libro['lecturas'])): ?>
                        <span class="badge bg-info text-dark">
                            <i class="bi bi-eye-fill me-1"></i> <?= $libro['lecturas'] ?>
                        </span>
                    <?php endif; ?>
                    
                    <?php if (!empty($libro['favoritos']) && $mostrarFavoritos ?? false): ?>
                        <span class="badge bg-danger">
                            <i class="bi bi-heart-fill me-1"></i> <?= $libro['favoritos'] ?>
                        </span>
                    <?php endif; ?>
                </div>
                
                <!-- Descripción del libro -->
                <?php if (!empty($libro['descripcion'])): ?>
                    <p style="font-family: 'Nunito', sans-serif; font-weight: 300; font-size: 0.85rem; line-height: 1.4; min-height: 3.6rem; display: -webkit-box; -webkit-line-clamp: 3; line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;" class="mt-2 text-white-50">
                        <?= substr(esc($libro['descripcion']), 0, $truncateDescripcion) ?>
                        <?= (strlen($libro['descripcion']) > $truncateDescripcion) ? '...' : '' ?>
                    </p>
                <?php elseif (!empty($libro['titulo'])): ?>
                    <!-- Si no hay descripción, mostrar un espacio reservado con el título repetido para mantener el diseño consistente -->
                    <p style="font-family: 'Nunito', sans-serif; font-weight: 300; font-size: 0.85rem; line-height: 1.4; min-height: 3.6rem; opacity: 0.5;" class="mt-2 text-white-50">
                        "<?= esc($libro['titulo']) ?>" es un libro que te invitará a descubrir nuevos mundos y experiencias a través de sus páginas...
                    </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</a>