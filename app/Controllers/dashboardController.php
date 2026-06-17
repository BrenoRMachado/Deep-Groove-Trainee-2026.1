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

        $usuariosRecentes = $bancoDeDados -> selecionaUltimas3LinhasDaTabela('usuarios');

        foreach($usuariosRecentes as $usuarioRecente){
            $data = new DateTime($usuarioRecente -> data_da_criacao);
            $data -> modify('-3 hours');
            $usuarioRecente -> data_da_publicacao = $data -> format('d/m/Y H:i');
        }

        $totalDePosts = $bancoDeDados -> countAll('publicacoes');

        $publicacoesRecentes = $bancoDeDados -> selecionaUltimas3LinhasDaTabela('publicacoes');

        foreach($publicacoesRecentes as $publicacaoRecente){
            $data = new DateTime($publicacaoRecente -> data_da_publicacao);
            $data -> modify('-3 hours');
            $publicacaoRecente -> data_da_publicacao = $data -> format('d/m/Y H:i');
        }

        return view('admin/dashboard', [
            'totalDeUsuarios' => $totalDeUsuarios,
            'usuariosRecentes' => $usuariosRecentes,
            'totalDePosts' => $totalDePosts,
            'publicacoesRecentes' => $publicacoesRecentes
        ]);

    }
}