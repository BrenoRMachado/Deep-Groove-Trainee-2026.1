<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class TabelaUsuariosController {
    public function index() {
        $usuarios = App::get('database') -> selectAll('usuarios');
    
        return view('admin/tabelaUsuarios', compact('usuarios'));
    }
}