<?php

namespace App\Controllers;
use App\Controllers\ExampleController;
use App\Core\Router;

$router->get('', 'ExampleController@index');

// Método para chegar na página
$router->get('tabela-de-posts', 'TabelaPostsController@index');

// Método para criar o post
$router->post('tabela-de-posts/create', 'TabelaPostsController@store');