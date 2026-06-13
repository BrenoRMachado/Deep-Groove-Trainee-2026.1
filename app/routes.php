<?php

namespace App\Controllers;
use App\Controllers\ExampleController;
use App\Core\Router;

$router->get('', 'ExampleController@index');

// Método para chegar na página
$router->get('tabela-de-posts', 'TabelaPostsController@index');

// Método para criar o post
$router->post('tabela-de-posts/create', 'TabelaPostsController@store');

// Método para editar as informações
$router->post('tabela-de-posts/edit', 'TabelaPostsController@edit');

//Método para deletar o post
$router->post('tabela-de-posts/delete', 'TabelaPostsController@delete');