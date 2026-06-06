<?php

//! sempre q alterar composer dump-autoload

namespace App\Controllers;
use App\Controllers\ExampleController;
use App\Core\Router;

$router->get('', 'ExampleController@index');

$router->get('tabelausuarios', 'TabelaUsuariosController@index');