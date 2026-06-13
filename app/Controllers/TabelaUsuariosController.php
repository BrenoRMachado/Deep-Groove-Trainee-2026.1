<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class TabelaUsuariosController {

    public function index() {

        $database = App::get('database');

        $limite = 6;

        //* verifica a pagina atual e retorna ela se for null retorna a pagina 1
        $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
        if ($paginaAtual < 1){
            $paginaAtual = 1;
        }

        $salto = ($paginaAtual - 1) * $limite;

        $totalUsuarios = $database -> countAll('usuarios');
        // ceil pega o teto(arrendoda pra cima)
        $totalPaginas = ceil($totalUsuarios/$limite);

        $usuarios = $database->paginate('usuarios', $limite, $salto);

        // $usuarios = App::get('database') -> selectAll('usuarios');
    
        //* esse compact pega as info de ususrios de trasforma em um array
        return view('admin/tabelaUsuarios', [
            'usuarios' => $usuarios,
            'paginaAtual' => $paginaAtual,
            'totalPaginas' => $totalPaginas
        ]);

    }

    public function criarUsuarios() {

        if (!empty($_FILES['foto-de-perfil']['tmp_name'])) {

            $fotoDePerfilTemporaria = $_FILES['foto-de-perfil']['tmp_name'];
    
            $nomeDaFotoDePerfil = sha1(uniqid($_FILES['foto-de-perfil']['name'], true)) . "." . pathinfo($_FILES['foto-de-perfil']['name'], PATHINFO_EXTENSION);
    
            $caminhoDaImagem = "public/assets/fotos-de-perfil-dos-usuarios/" . $nomeDaFotoDePerfil;
    
            move_uploaded_file($fotoDePerfilTemporaria, $caminhoDaImagem);

        } else {

            $caminhoDaImagem = "public/assets/fotos-de-perfil-dos-usuarios/foto-de-perfil-padrao.png";

        }

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

        $id = $_POST['id'];

        $usuarioAtual = App::get('database')->selectById('usuarios', $id);

        if (!empty($_FILES['foto-de-perfil']['tmp_name'])) {

            $fotoAntiga = $usuarioAtual->foto;
            
            if ($fotoAntiga !== 'public/assets/fotos-de-perfil-dos-usuarios/foto-de-perfil-padrao.png' && file_exists($fotoAntiga)) {
                unlink($_SERVER['DOCUMENT_ROOT'] . '/' . $fotoAntiga);
            }

            $fotoDePerfilTemporaria = $_FILES['foto-de-perfil']['tmp_name'];
    
            $nomeDaFotoDePerfil = sha1(uniqid($_FILES['foto-de-perfil']['name'], true)) . "." . pathinfo($_FILES['foto-de-perfil']['name'], PATHINFO_EXTENSION);
    
            $caminhoDaImagem = "public/assets/fotos-de-perfil-dos-usuarios/" . $nomeDaFotoDePerfil;
    
            move_uploaded_file($fotoDePerfilTemporaria, $caminhoDaImagem);

        }
        else {
            $caminhoDaImagem = $usuarioAtual->foto;
        }

        $parametros = [
            'nome' => !empty($_POST['nome']) ? $_POST['nome'] : $usuarioAtual->nome,
            'email' => !empty($_POST['email']) ? $_POST['email'] : $usuarioAtual->email,
            'senha' => !empty($_POST['senha']) ? $_POST['senha'] : $usuarioAtual->senha,
            'foto' => $caminhoDaImagem,
            ];  

        App::get('database') -> update('usuarios', $id, $parametros);

        header('Location: /tabelaUsuarios');
    }

    public function excluirUsuarios() {
        $id = $_POST['id'];

        // var_dump($_POST); VER SE O ID TAVA INDO MSM

        $usuarioAtual = App::get('database')->selectById('usuarios', $id);

        $fotoAtual = $usuarioAtual->foto;

        if ($fotoAtual !== 'public/assets/fotos-de-perfil-dos-usuarios/foto-de-perfil-padrao.png'  && file_exists($fotoAtual)){

            unlink($_SERVER['DOCUMENT_ROOT'] . '/' . $fotoAtual);

        }
        
        App::get('database') -> delete('usuarios', $id);

        header('Location: /tabelaUsuarios');
    }

}