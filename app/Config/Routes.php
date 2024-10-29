<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get(
    '/',
    'Home::principal',
    ["as" => "home.principal", "filter" => "auth"]
);


/**
 * ROTAS PARA LOGAR
 */
$routes->get(
    "/telaLogin",
    "LoginController::telaLogin",
    ["as" => "login.tela"]
);

$routes->post(
    "/login/onLogin",
    "LoginController::onLogin",
    ["as" => "login.onLogin"]
);

$routes->get(
    "/login/onLogout",
    "LoginController::onLogout",
    ["as" => "login.onLogout"]
);

/**
 * ROTAS DOS USUARIOS
 */
$routes->get(
    "/usuario/listar-todos-usuarios",
    "UsuarioController::listarTodosUsuarios",
    ["as" => "usuarios.listar", "filter" => "auth"]
);

$routes->get(
    "/usuario/novo",
    "UsuarioController::inserir",
    ["as" => "usuario.inserir", "filter" => "auth"]
);

$routes->get(
    "/usuario/editar/(:num)",
    "UsuarioController::editar/$1",
    ["as" => "usuario.editar", "filter" => "auth"]
);

$routes->post(
    "/usuario/onSave",
    "UsuarioController::onSave",
    ["as" => "usuario.onSave", "filter" => "auth"]
);

$routes->get(
    "/usuario/onDelete/(:num)",
    "UsuarioController::onDelete/$1",
    ["as" => "usuario.onDelete", "filter" => "auth"]
);


/**
 * ROTAS PARA MARCA 
 */
$routes->get(
    "/marca/listar",
    "MarcaController::listar",
    ["as" => "marca.listar", "filter" => "auth"]
);

$routes->get(
    "/marca/inserir",
    "MarcaController::inserir",
    ["as" => "marca.inserir", "filter" => "auth"]
);

$routes->get(
    "/marca/editar/(:num)",
    "MarcaController::editar/$1",
    ["as" => "marca.editar", "filter" => "auth"]
);

$routes->post(
    "/marca/onSave",
    "MarcaController::onSave",
    ["as" => "marca.onSave", "filter" => "auth"]
);

$routes->get(
    "/marca/onDelete/(:num)",
    "MarcaController::onDelete/$1",
    ["as" => "marca.onDelete", "filter" => "auth"]
);


/**
 * ROTAS PARA MAQUINARIO
 */
$routes->get(
    "/maquinario/listar",
    "MaquinarioController::listar",
    ["as" => "maquinario.listar", "filter" => "auth"]
);

$routes->get(
    "/maquinario/inserir",
    "MaquinarioController::inserir",
    ["as" => "maquinario.inserir", "filter" => "auth"]
);

$routes->get(
    "/maquinario/editar/(:num)",
    "MaquinarioController::editar/$1",
    ["as" => "maquinario.editar", "filter" => "auth"]
);

$routes->post(
    "/maquinario/onSave",
    "MaquinarioController::onSave",
    ["as" => "maquinario.onSave", "filter" => "auth"]
);

$routes->get(
    "/maquinario/onDelete/(:num)",
    "MaquinarioController::onDelete/$1",
    ["as" => "maquinario.onDelete", "filter" => "auth"]
);

/**
 *  ROTAS PARA MODELO
 */
$routes->get(
    "/modelo/listar",
    "ModeloController::listar",
    ["as" => "modelo.listar", "filter" => "auth"]
);

$routes->get(
    "/modelo/inserir",
    "ModeloController::inserir",
    ["as" => "modelo.inserir", "filter" => "auth"]
);

$routes->get(
    "/modelo/editar/(:num)",
    "ModeloController::editar/$1",
    ["as" => "modelo.editar", "filter" => "auth"]
);

$routes->post(
    "/modelo/onSave",
    "ModeloController::onSave",
    ["as" => "modelo.onSave", "filter" => "auth"]
);

$routes->get(
    "/modelo/onDelete/(:num)",
    "ModeloController::onDelete/$1",
    ["as" => "modelo.onDelete", "filter" => "auth"]
);


/**
 * ROTAS PARA SERIE
 */
$routes->get(
    "/serie/listar",
    "SerieController::listar",
    ["as" => "serie.listar", "filter" => "auth"]
);

$routes->get(
    "/serie/inserir",
    "SerieController::inserir",
    ["as" => "serie.inserir", "filter" => "auth"]
);

$routes->get(
    "/serie/editar/(:num)",
    "SerieController::editar/$1",
    ["as" => "serie.editar", "filter" => "auth"]
);

$routes->post(
    "/serie/onSave",
    "SerieController::onSave",
    ["as" => "serie.onSave", "filter" => "auth"]
);

$routes->get(
    "/serie/onDelete/(:num)",
    "SerieController::onDelete/$1",
    ["as" => "serie.onDelete", "filter" => "auth"]
);
