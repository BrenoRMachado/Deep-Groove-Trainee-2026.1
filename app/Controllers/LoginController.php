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
            $_SESSION['email'] = $usuario->email;
            $_SESSION['nome'] = $usuario->nome;
            $_SESSION['is_admin'] = $usuario->is_admin;
            $_SESSION['foto'] = $usuario -> foto;

            App::get('database')->update('usuarios', $usuario->id, [
                'ultima_acao' => 'login',
                'data_ultima_acao' => date('Y-m-d H:i:s')
            ]);

            header('Location: /dashboard');
            exit();
        } else {
            
            session_start();
            $_SESSION['mensagem-erro'] = "Usuário ou senha incorretos!";
            header('Location: /login');
        }
    }
    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();

        header('Location: /login');
        exit();
    }

    public function cadastro()
    {
        $email = $_POST['email'];

        $parameters = [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => $_POST['senha'],
            'is_admin' => 0,
            'foto' => 'default'
        ];

        $usuario = App::get('database')->verificaEmail($email);

        if ($usuario == false) {
            App::get('database')->insert('usuarios', $parameters);
            session_start();
            header('Location: /login');
            exit();
        } 
        else {
            session_start();
            $_SESSION['mensagem-erro-email'] = "Email já cadastrado";
            header('Location: /login');
            exit();
        }
    }
}