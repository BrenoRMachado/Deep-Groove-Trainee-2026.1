<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class TabelaPostsController
{
    public function index()
    {
        return view('admin/tabela-de-posts');
    }
}