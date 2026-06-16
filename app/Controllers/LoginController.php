<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class LoginController
{
    public function index()
    {
        return view('site/login');
    }

    public function efetuaLogin()
    {
        //Definição das variáveis
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        //Checagem se o usuário existe ou não no banco de dados
        $usuario = App::get('database')->verificaLogin($email, $senha);

        if ($usuario != false) {

            session_start();

            $_SESSION['id'] = $usuario->id;

            header('Location: /');
            exit();
        } else {
            
            session_start();
            $_SESSION['mensagem-erro'] = "Usuário ou senha incorretos!";
            header('Location: /login');
        }

    }
}