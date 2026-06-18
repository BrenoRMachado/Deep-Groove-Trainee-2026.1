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

    $faixas = App::get('database')-> selectSearch('faixas', 'id_publicacao', $id);

    return view('site/paginaIndividual', [
        'post' =>  $buscar,
        'faixas' => $faixas,
    ]);
}
}