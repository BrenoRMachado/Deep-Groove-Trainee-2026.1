<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class TabelaUsuariosController {

    public function index() {

        $usuarios = App::get('database') -> selectAll('usuarios');
    
        //* esse compact pega as info de ususrios de trasforma em um array
        return view('admin/tabelaUsuarios', compact('usuarios'));

    }

    public function criarUsuarios() {

        $fotoDePerfilTemporaria = $_FILES['foto-de-perfil']['tmp_name'];

        $nomeDaFotoDePerfil = sha1(uniqid($_FILES['foto-de-perfil']['name'], true)) . "." . pathinfo($_FILES['foto-de-perfil']['name'], PATHINFO_EXTENSION);

        $caminhoDaImagem = $_SERVER['DOCUMENT_ROOT'] . "/public/assets/fotos-de-perfil-dos-usuarios/" . $nomeDaFotoDePerfil;

        move_uploaded_file($fotoDePerfilTemporaria, $caminhoDaImagem);

        $parametros = [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => $_POST['senha'],
            'foto' => $caminhoDaImagem,
            ];    

        App::get('database') -> insert('usuarios', $parametros);

        header('Location: /tabelaUsuarios');

    }       
    
    public function editarUsuarios() {

        $fotoDePerfilTemporaria = $_FILES['foto-de-perfil']['tmp_name'];

        $nomeDaFotoDePerfil = sha1(uniqid($_FILES['foto-de-perfil']['name'], true)) . "." . pathinfo($_FILES['foto-de-perfil']['name'], PATHINFO_EXTENSION);

        $caminhoDaImagem = $_SERVER['DOCUMENT_ROOT'] . "/public/assets/fotos-de-perfil-dos-usuarios/" . $nomeDaFotoDePerfil;

        move_uploaded_file($fotoDePerfilTemporaria, $caminhoDaImagem);

        $parametros = [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => $_POST['senha'],
            'foto' => $caminhoDaImagem,
            ];  

        $id = $_POST['id'];

        App::get('database') -> update('usuarios', $id, $parametros);

        header('Location: /tabelaUsuarios');
    }

    public function excluirUsuarios() {
        $id = $_POST['id'];

        // var_dump($_POST); VER SE O ID TAVA INDO MSM
        
        App::get('database') -> delete('usuarios', $id);

        header('Location: /tabelaUsuarios');
    }

}