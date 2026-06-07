<?php

//! sempre q alterar composer dump-autoload

namespace App\Controllers;
use App\Controllers\ExampleController;
use App\Core\Router;

$router->get('', 'ExampleController@index');

$router->get('tabelaUsuarios', 'TabelaUsuariosController@index');
$router->post('tabelaUsuarios/criar', 'TabelaUsuariosController@criarUsuarios');
$router->post('tabelaUsuarios/editar', 'TabelaUsuariosController@editarUsuarios');