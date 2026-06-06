<?php

namespace App\Controllers;
use App\Controllers\ExampleController;
use App\Core\Router;

// !composer dump-autoload reconstrói as rotas

$router->get('', 'ExampleController@index');
$router->get('posts', 'PaginaDePostsController@index');