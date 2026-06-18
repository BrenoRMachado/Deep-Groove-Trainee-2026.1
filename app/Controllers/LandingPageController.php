<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class LandingPageController
{

    public function index()
    {
        // Busca os posts utilizando o método que você já criou
        $posts = $this->getPosts();

        // Passa os posts para a view através de um array associativo
        return view('site/landingpage', [
            'posts' => $posts
        ]);
    }

    public function getPosts()
    {
        try {
            $posts = App::get('database')->selectAll('publicacoes');
            return $posts;
        } 
        catch (Exception $e) {
            die($e->getMessage());
        }
    }
}