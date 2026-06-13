<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class TabelaPostsController
{
    public function index()
    {
        $publicacoes = App::get('database')->selectAll('publicacoes');
        return view('admin/tabela-de-posts', compact('publicacoes'));
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

        App::get('database')->insert('publicacoes', $parameters);

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
        $id = $_POST('id');

        App::get('database')->delete('publicacoes', $id);

        header('Location: /tabelaPosts');
    }
}