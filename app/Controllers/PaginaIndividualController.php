<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class PaginaIndividualController
{

   public function index()
{
    $id = $_GET['id'];

    $buscar = App::get('database')->selectById('publicacoes', $id);

    return view('site/paginaIndividual', [
        'post' =>  $buscar
    ]);
}
}