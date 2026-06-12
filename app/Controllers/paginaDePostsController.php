<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

//* Controller da página de posts:
class PaginaDePostsController {
    public function index() {

        $bancoDeDados = App::get('database');

        //* Detecta mobile pelo User-Agent
        $ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
        $isMobile = (bool) preg_match('/Mobile|Android|iPhone|iPad|webOS|BlackBerry/i', $ua);
        $limite = $isMobile ? 4 : 9;

        $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
        if ($paginaAtual < 1){
            $paginaAtual = 1;
        }

        $offset = ($paginaAtual - 1) * $limite;

        $totalDePosts = $bancoDeDados -> countAllPosts('publicacoes');

        $totalDePaginas = ceil($totalDePosts / $limite);

        $posts = $bancoDeDados -> paginatePosts('publicacoes', $limite, $offset);

        return view('site/paginaDePosts', [
            'posts' => $posts,
            'paginaAtual' => $paginaAtual,
            'totalDePaginas' => $totalDePaginas
        ]);

    }

}