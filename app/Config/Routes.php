<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('catalogo', 'CatalogoController::index');

// Rutas para administrador y categorías agrupadas
$routes->group('administrador', function($routes) {
    $routes->get('', 'AdministradorController::index');  // /administrador

    // Categorias
    $routes->get('categorias', 'CategoriaController::index'); // /administrador/categorias
    $routes->get('categorias/crear', 'CategoriaController::crear'); // /administrador/categorias/crear
    $routes->post('categorias/guardar', 'CategoriaController::guardar'); // POST para guardar
    $routes->get('categorias/editar/(:num)', 'CategoriaController::editar/$1'); // /administrador/categorias/editar/1
    $routes->post('categorias/actualizar', 'CategoriaController::actualizar'); // POST para actualizar
    $routes->get('categorias/eliminar/(:num)', 'CategoriaController::eliminar/$1'); // /administrador/categorias/eliminar/1
});
