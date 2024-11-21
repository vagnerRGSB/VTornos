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

/**
 * ROTAS PARA CATEGORIAS DE PECAS
 */
$routes->get(
    "/categorias-pecas/listar",
    "PecaController::listar",
    ["as" => "peca.listar", "filter" => "auth"]
);
$routes->get(
    "/categorias-pecas/inserir",
    "PecaController::inserir",
    ["as" => "peca.inserir", "filter" => "auth"]
);
$routes->get(
    "/categorias-pecas/editar/(:num)",
    "PecaController::editar/$1",
    ["as" => "peca.editar", "filter" => "auth"]
);
$routes->post(
    "/categorias-pecas/onSave",
    "PecaController::onSave",
    ["as" => "peca.onSave"]
);
$routes->get(
    "/categorias-pecas/onDelete/(:num)",
    "PecaController::onDelete/$1",
    ["as" => "peca.onDelete", "filter" => "auth"]
);

/**
 * ROTAS ESPECIFICAO DE PECA
 */
$routes->get(
    "/especificacao-pecas/listar",
    "EspecificacaoController::listar",
    ["as" => "especificacao.listar", "filter" => "auth"]
);
$routes->get(
    "/especificacao-pecas/inserir",
    "EspecificacaoController::inserir",
    ["as" => "especificacao.inserir"]
);
$routes->get(
    "/especificao-pecas/editar/(:num)",
    "EspecificacaoController::editar/$1",
    ["as" => "especificacao.editar", "filter" => "auth"]
);
$routes->post(
    "/especificao-pecas/onSave",
    "EspecificacaoController::onSave",
    ["as" => "especificacao.onSave", "filter" => "auth"]
);
$routes->get(
    "/especificao-pecas/onDelete/(:num)",
    "EspecificacaoController::onDelete/$1",
    ["as" => "Especificacao.onDelete", "filter" => "auth"]
);

/**
 * ROTAS ESTOQUE DE PECAS
 */
$routes->get(
    "/estoque-pecas/listar",
    "EstoqueController::listar",
    ["as" => "estoque.listar", "filter" => "auth"]
);
$routes->get(
    "/estoque-pecas/inserir",
    "EstoqueController::inserir",
    ["as" => "estoque.inserir", "filter" => "auth"]
);
$routes->get(
    "/estoque-pecas/editar/(:num)",
    "EstoqueController::editar/$1",
    ["as" => "estoque.editar", "filter" => "auth"]
);
$routes->post(
    "/estoque-pecas/onSave",
    "EstoqueController::onSave",
    ["as" => "estoque.onSave", "filter" => "auth"]
);
$routes->get(
    "/estoque-pecas/onDelete/(:num)",
    "EstoqueController::onDelete/$1",
    ["as" => "estoque.onDelete", "filter" => "auth"]
);

/**
 * ROTAS Estados
 */
$routes->get(
    "/estado/listar",
    "EstadoController::listar",
    ["as" => "estado.listar", "filter" => "auth"]
);
$routes->get(
    "/estado/inserir",
    "EstadoController::inserir",
    ["as" => "estado.inserir", "filter" => "auth"]
);
$routes->get(
    "/estado/editar/(:num)",
    "EstadoController::editar/$1",
    ["as" => "estado.editar", "filter" => "auth"]
);
$routes->post(
    "/estado/onSave",
    "EstadoController::onSave",
    ["as" => "estado.onSave", "filter" => "auth"]
);
$routes->get(
    "/estado/onDelete/(:num)",
    "EstadoController::onDelete/$1",
    ["as" => "estado.onDelete", "filter" => "auth"]
);

/**
 * ROTAS PARA CIDADES NOS ESTADOS
 */
$routes->get(
    "/cidade/listar",
    "CidadeController::listar",
    ["as" => "cidade.listar", "filter" => "auth"]
);
$routes->get(
    "/cidade/inserir",
    "CidadeController::inserir",
    ["as" => "cidade.inserir", "filter" => "auth"]
);
$routes->get(
    "/cidade/editar/(:num)",
    "CidadeController::editar/$1",
    ["as" => "cidade.editar", "filter" => "auth"]
);
$routes->post(
    "/cidade/onSave",
    "CidadeController::onSave",
    ["as" => "cidade.onSave", "filter" => "auth"]
);
$routes->get(
    "/cidade/onDelete/(:num)",
    "CidadeController::onDelete/$1",
    ["as" => "cidade.onDelete", "filter" => "auth"]
);

/**
 * ROTAS PARA LOCALIDADES
 */
$routes->get(
    "/localidade/listar",
    "LocalidadeController::listar",
    ["as" => "localidade.listar", "filter" => "auth"]
);
$routes->get(
    "/localidade/inseir",
    "LocalidadeController::inserir",
    ["as" => "localidade.inserir", "filter" => "auth"]
);
$routes->get(
    "/localidade/editar/(:num)",
    "LocalidadeController::editar/$1",
    ["as" => "localidade.editar", "filter" => "auth"]
);
$routes->post(
    "/localidade/onSave",
    "LocalidadeController::onSave",
    ["as" => "localidade.onSave", "filter" => "auth"]
);
$routes->get(
    "/localidade/onDelete/(:num)",
    "LocalidadeController::onDelete/$1",
    ["as" => "localidade.onDelete", "filter" => "auth"]
);

/**
 * ROTAS PARA CLIENTES
 */
$routes->get(
    "/cliente/listar",
    "ClienteController::listar",
    ["as" => "cliente.listar", "filter" => "auth"]
);
$routes->get(
    "/cliente/inserir",
    "ClienteController::inserir",
    ["as"=>"cliente.inserir","filter"=>"auth"]
);
$routes->get(
    "/cliente/editar/(:num)",
    "ClienteController::editar/$1",
    ["as"=>"cliente.editar", "filter" => "auth"]
);
$routes->post(
    "/cliente/onSave",
    "ClienteController::onSave",
    ["as"=>"cliente.onSave","filter"=>"auth"]
);
$routes->get(
    "/cliente/onDelete/(:num)",
    "ClienteController::onDelete/$1",
    ["as" => "cliente.onDelete", "filter" => "auth"]
);

/**
 * ROTAS PARA INCRIÇÕES DOS CLIENTES   
 */
 $routes->get(
    "/inscricao-cliente/listar/(:num)",
    "InscricaoController::listar/$1",
    ["as"=>"inscricao.listar", "filter" => "auth"]
 );
$routes->get(
    "/inscricao-cliente/inserir/(:num)",
    "InscricaoController::inserir/$1",
    ["as" => "inscricao.inserir", "filter" => "auth"]
);
$routes->get(
    "/inscricao-cliente/editar/(:num)",
    "InscricaoController::editar/$1",
    ["as"=>"inscricao.editar", "filter"=>"auth"]
);
$routes->post(
    "/inscricao-cliente/onSave",
    "InscricaoController::onSave",
    ["as"=>"inscricao.onSave", "filter" => "auth"]
);
$routes->get(
    "/inscricao-cliente/onDelete/(:num)",
    "InscricaoController::onDelete/$1",
    ["as"=>"inscricao.onDelete", "filter" => "auth"]
);

/**
 * ROTAS PARA ATIVIDADES
 */
$routes->get(
    "/atividade/listar",
    "AtividadeController::listar",
    ["as"=>"atividade.listar", "filter" => "auth"]
);
$routes->get(
    "/atividade/inserir",
    "AtividadeController::inserir",
    ["as"=>"atividade.inserir", "filter" => "auth"]
);
$routes->get(
    "/atividade/editar/(:num)",
    "AtividadeController::editar/$1",
    ["as"=>"atividade.editar", "filter"=>"auth"]
);
$routes->post(
    "/atividade/onSave",
    "AtividadeController::onSave",
    ["as"=>"atividade.onSave","filter"=>"auth"]
);
$routes->get(
    "/atividade/onDelete/(:num)",
    "AtividadeController::onDelete/$1",
    ["as"=>"atividade.onDelete","filter"=>"auth"]
);

/**
 * ROTAS PARA ORCAMENTO DE SERVIÇO
 */

 $routes->get(
    "/orcamento/listar/(:num)",
    "OrcamentoController::listar/$1",
    ["as"=>"orcamento.listar", "filter"=>"auth"]
 );
 $routes->get(
    "/orcamento/inserir/(:num)",
    "OrcamentoController::inserir/$1",
    ["as"=>"orcamento.inserir","filter"=>"auth"]
 );
 $routes->get(
    "/orcamento/editar/(:num)",
    "OrcamentoController::editar/$1",
    ["as"=>"orcamento.editar", "filter" => "auth"]
 );
 $routes->post(
    "/orcamento/onSave",
    "OrcamentoController::onSave",
    ["as"=>"orcamento.onSave", "filter" => "auth"]
 );