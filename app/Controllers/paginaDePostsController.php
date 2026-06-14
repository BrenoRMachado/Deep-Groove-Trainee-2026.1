<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

//* Controller da página de posts:
class PaginaDePostsController {
    public function index() {

        $bancoDeDados = App::get('database');

        //* Variáveis de pesquisa

        $textoDeBusca = isset($_GET['pesquisar']) ? $_GET['pesquisar'] : '';

        $colunaDeBusca = $textoDeBusca !== '' ? ['titulo', 'ano', 'artista'] : null;

        $filtro = isset($_GET['filtro']) ? $_GET['filtro'] : '';

        //* Detecta se a tela é mobile para determinar o limite de posts por página

        $ua = $_SERVER['HTTP_USER_AGENT'] ?? '';

        $isMobile = (bool) preg_match('/Mobile|Android|iPhone|iPad|webOS|BlackBerry/i', $ua);

        $limite = $isMobile ? 4 : 9;

        //* Páginação

        $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
        if ($paginaAtual < 1){
            $paginaAtual = 1;
        }

        $offset = ($paginaAtual - 1) * $limite;

        $totalDePosts = $bancoDeDados -> selectAllPosts('publicacoes', $textoDeBusca, $colunaDeBusca, $filtro);

        $totalDePaginas = ceil($totalDePosts / $limite);

        $posts = $bancoDeDados -> paginatePosts('publicacoes', $limite, $offset, $textoDeBusca, $colunaDeBusca, $filtro);

        //* Variáveis enviadas para a view

        return view('site/paginaDePosts', [
            'posts' => $posts,
            'textoDeBusca' => $textoDeBusca,
            'filtro' => $filtro,
            'paginaAtual' => $paginaAtual,
            'totalDePaginas' => $totalDePaginas
        ]);

    }

}