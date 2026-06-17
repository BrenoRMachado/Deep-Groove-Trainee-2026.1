<?php 

namespace App\Controllers;

use App\Core\App;
use Exception;
use DateTime;

// !composer dump-autoload reconstrói as rotas

class dashboardController {
    public function index() {

        $bancoDeDados = App::get('database');

        $totalDeUsuarios = $bancoDeDados -> countAll('usuarios');

        $totalDePosts = $bancoDeDados -> countAll('publicacoes');

        $publicacoesRecentes = $bancoDeDados -> selecionaUltimos3PostsPublicados();

        foreach($publicacoesRecentes as $publicacao){
            $data = new DateTime($publicacao -> data_da_publicacao);
            $data -> modify('-3 hours');
            $publicacao -> data_da_publicacao = $data -> format('d/m/Y H:i');
        }

        return view('admin/dashboard', [
            'totalDeUsuarios' => $totalDeUsuarios,
            'totalDePosts' => $totalDePosts,
            'publicacoesRecentes' => $publicacoesRecentes
        ]);

    }
}