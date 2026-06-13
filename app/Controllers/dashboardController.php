<?php 

namespace App\Controllers;

use App\Core\App;
use Exception;

// !composer dump-autoload reconstrói as rotas

class dashboardController {
    public function index() {

        $bancoDeDados = App::get('database');

        $totalDePosts = $bancoDeDados -> countAll('publicacoes');

        $totalDeUsuarios = $bancoDeDados -> countAll('usuarios');

        return view('admin/dashboard', [
            'totalDePosts' => $totalDePosts,
            'totalDeUsuarios' => $totalDeUsuarios
        ]);

    }
}