<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class TabelaPostsController
{
    public function index()
    {
        $publicacoes = App::get('database')->selectAll('publicacoes');
        return view('admin/tabela-de-posts', $publicacoes);
    }
}