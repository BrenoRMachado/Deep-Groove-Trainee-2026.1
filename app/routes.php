<?php

namespace App\Controllers;
use App\Controllers\ExampleController;
use App\Core\Router;

$router->get('', 'ExampleController@index');

// caminho para ir para landingpage
$router->get('landingpage', 'landingpageController@index');