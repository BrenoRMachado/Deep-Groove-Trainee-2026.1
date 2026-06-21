<?php

//! sempre q alterar composer dump-autoload

namespace App\Controllers;
use App\Controllers\ExampleController;
use App\Core\Router;

$router->get('', 'LandingPageController@index');
$router->get('posts', 'LandingPageController@getPosts');

// Método para chegar na página
$router->get('tabelaPosts', 'TabelaPostsController@index');

// Método para criar o post
$router->post('tabelaPosts/create', 'TabelaPostsController@store');

// Método para editar as informações
$router->post('tabelaPosts/edit', 'TabelaPostsController@edit');

//Método para deletar o post
$router->post('tabelaPosts/delete', 'TabelaPostsController@delete');

$router->get('paginaIndividual', 'PaginaIndividualController@index');
$router->get('footer', 'Footer@index');
$router->get('login', 'LoginController@index');
$router->get('instrucoes', 'InstrucoesController@index');
$router->get('posts', 'PaginaDePostsController@index');
$router->get('dashboard', 'dashboardController@index');
$router->get('sidebar', 'sidebarController@index');
$router->get('tabelaUsuarios', 'TabelaUsuariosController@index');
$router->post('tabelaUsuarios/criar', 'TabelaUsuariosController@criarUsuarios');
$router->post('tabelaUsuarios/editar', 'TabelaUsuariosController@editarUsuarios');
$router->post('tabelaUsuarios/excluir', 'TabelaUsuariosController@excluirUsuarios');
$router->post('tabelaUsuarios/verificarEmail', 'TabelaUsuariosController@verificarEmailEmUso');
$router->get('footerLanding', 'FooterLanding@index');

//Rota para efetuar o login
$router->post('login', 'LoginController@efetuaLogin');

//Rota para efetuar o logout
$router->post('logout', 'LoginController@logout');

//Rota para efetuar o cadastro
$router->post('cadastro', 'LoginController@cadastro');
