<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class TabelaUsuariosController
{

    public function index()
    {
        return view('admin/tabelaUsuarios');
    }
}