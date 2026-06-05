<?php

namespace App\Controllers;
use App\Controllers\ExampleController;
use App\Core\Router;

//! Sempre que mexer no routes tem que dar autoload

$router->get('', 'ExampleController@index');
$router->get('login', 'LoginController@index');