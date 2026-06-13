<?php

//! sempre q alterar composer dump-autoload

namespace App\Controllers;
use App\Controllers\ExampleController;
use App\Core\Router;

$router->get('', 'ExampleController@index');
$router->get('footer', 'Footer@index');
$router->get('login', 'LoginController@index');
$router->get('instrucoes', 'InstrucoesController@index');
$router->get('posts', 'PaginaDePostsController@index');
$router->get('dashboard', 'dashboardController@index');

$router->get('tabelaUsuarios', 'TabelaUsuariosController@index');
$router->post('tabelaUsuarios/criar', 'TabelaUsuariosController@criarUsuarios');
$router->post('tabelaUsuarios/editar', 'TabelaUsuariosController@editarUsuarios');
$router->post('tabelaUsuarios/excluir', 'TabelaUsuariosController@excluirUsuarios');
