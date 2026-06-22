<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class TabelaPostsController
{
    public function index()
    {
        $database = App::get('database');

        // função de busca
        $textoBusca = isset($_GET['busca']) ? $_GET['busca'] : '';
        $colunaBusca = $textoBusca !== '' ? ['titulo', 'ano', 'artista', 'genero'] : null;
        
        // Número definido no documento de requisitos
        $limit = 5; 

        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ( $currentPage < 1) {
            $currentPage = 1;
        }

        $offset = ($currentPage - 1) * $limit;

        $totalPublicacoes = $database->countAll('publicacoes', $textoBusca, $colunaBusca);
        $totalPages = ceil($totalPublicacoes/$limit);

        $publicacoes = $database->paginate('publicacoes', $limit, $offset, $textoBusca, $colunaBusca);

        return view('admin/tabela-de-posts', [
            'publicacoes' => $publicacoes,
            'currentPage'=> $currentPage,
            'totalPages' => $totalPages,
            'textoBusca' => $textoBusca
        ]);
    }

    public function store()
    {
        $parameters = [
            'titulo' => $_POST['titulo'],
            'ano' => $_POST['ano'],
            'artista' => $_POST['artista'],
            'conceito' => $_POST['conceito'],
            'genero' => $_POST['genero'],
            'foto' => $_POST['foto'],
            'duracao' => $_POST['duracao'],
            'id_usuario' => $_POST['id_usuario'],
            'id_deezer' => $_POST['id_deezer'],
        ];

        $faixas = json_decode($_POST['faixas']); 

        App::get('database')->insert('publicacoes', $parameters);

        $post = App::get('database')->selectLast('publicacoes');

        foreach ($faixas as $faixa){
            $parameters = [
                'id' => $faixa -> id,
                'titulo' => $faixa -> title,
                'duracao' => $faixa -> duration,
                'id_publicacao' => $post -> id,
                'id_deezer' => $post -> id_deezer,
            ];
            App::get('database')->insert('faixas', $parameters);
            
        }
            
        
        header('Location: /tabelaPosts');
    }


    public function edit() 
    {
        $parameters = [
            'titulo' => $_POST['titulo'],
            'ano' => $_POST['ano'],
            'artista' => $_POST['artista'],
            'conceito' => $_POST['conceito'],
            'genero' => $_POST['genero'],
            'foto' => $_POST['foto'],
            'duracao' => $_POST['duracao'],
            'id_usuario' => $_POST['id_usuario'],
            'id_deezer' => $_POST['id_deezer'],
        ];

        $id = $_POST['id'];

        App::get('database')->update('publicacoes', $id, $parameters);

        header('Location: /tabelaPosts');
    }

    public function delete()
    {
        $id = $_POST['id'];

        App::get('database')->delete('publicacoes', $id);

        header('Location: /tabelaPosts');
    }
}