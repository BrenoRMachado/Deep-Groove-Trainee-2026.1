<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class TabelaUsuariosController {

    public function index() {

        $usuarios = App::get('database') -> selectAll('usuarios');
    
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

}