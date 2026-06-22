<?php
    session_start();
    
    if(!isset($_SESSION['id'])) {
        header('Location: /login');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../public/css/tabelaPosts.css">
    <link rel="stylesheet" href="../../../public/css/paginacao.css">
    <!-- impotando fontes google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Erica+One&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- importando bootstrap-icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body id="tbposts">
    <?php 
        require 'sidebar.html';
    ?>

    <div class="filtro-ao-abrir-modal-da-tabelaPosts"></div>

    <div class="pagecontainer">
        <section class="topoTabelaUser">
                <button class="botao-novo-post" onclick="abrirModal('modal-criar-posts')">
                    <div class="addUserdesktop ">
                        <img src="../../../public/assets/mais.svg" class="mais" alt="mais">
                        <p class="textop">Novo post</p>
                    </div>

                    <div class="addUsermobile ">
                        <img src="../../../public/assets/window-plus.svg" alt="add" class="addm">
                    </div>
                </button>  
            <div class="infoUser">
                <img src="<?= $_SESSION['foto'] ?>" alt="User" class="userimg">

                <div class="infos">
                    <h3 class="textoh3"><?= $_SESSION['nome'] ?></h3>
                    <h3 class="textoh3"><?= $_SESSION['is_admin'] ? 'Administrador' : "Usuário" ?></h3>
                </div>

            </div>

        </section>

        <!-- Página -->

        <section class="titulo">
            <h1 class="textoTitulo">POSTAGENS</h1>
        </section>

        <section class="pesquisar">
            <form action="/tabelaUsuarios" method="GET" class="pesq">
                <input type="text" name="busca" class="busca" placeholder="Pesquisar postagem..." value="<?= $textoBusca ?? '' ?>">
            </form>
        </section>

        <section class="tabela">
            <table>
                <thead class="tabelacabe">
                    <tr class="linha linhaCab">
                        <th class="coluna colunaCab">ID</th>

                        <th class="coluna colunaCab">Álbum</th>

                        <th class="coluna colunaCab">Artista</th>

                        <th class="coluna colunaCab">Título</th>

                        <th class="coluna colunaCab">Ações</th>

                    </tr>

                </thead>
                <?php foreach ($publicacoes as $publicacao): ?>
                    <tr class="linha linhaTab">
                        <td class="colunageral"><?= $publicacao->id ?></td>
                        <td class="colunageral"><img class="capa-thriller" src="<?= $publicacao->foto?>"></td>
                        <td class="colunageral"><?= $publicacao->artista ?></td>
                        <td class="colunageral"><?= $publicacao->titulo ?></td>
                        <td class="colunageral">
                            <i class="acao bi bi-eye-fill" onclick="abrirModal('modal-visu-post<?= $publicacao->id ?>')"></i>
                            <i class="acao bi bi-pencil-square <?= $_SESSION['is_admin'] == 1 || $_SESSION['id'] == $publicacao->id_usuario ? '' : 'desabilitado' ?>" onclick="abrirModal('modal-edicao-posts<?= $publicacao->id ?>')"></i>
                            <i class="acao bi bi-trash <?= $_SESSION['is_admin'] == 1 || $_SESSION['id'] == $publicacao->id_usuario ? '' : 'desabilitado' ?>" onclick="abrirModal('modal-excluir-post<?= $publicacao->id ?>')"></i>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>
            <?php require "paginacao.view.php" ?>
        </section>

        <section class="tabelaMobile">

                <?php foreach($publicacoes as $publicacao): ?>
                    <div class="tabeladentroMobile">
                    
                        <div class="parte1">
                            <div class="containerId"> 
                                <p class="destaqueInfosMobile">ID</p>
                                <p class="infosMobile"><?= $publicacao->id ?></p>
                            </div>
                            <div class="containerId"> 
                                <p class="destaqueInfosMobile">Foto</p>
                                <img class="foto-de-cada-usuario-na-tabela" src="<?= $publicacao->foto ?>">
                            </div>
                        </div>

                        <div class="parte2">
                            <div class="containerNome"> 
                                <p class="destaqueInfosMobile">Nome</p>
                                <p class="infosMobile quebra"><?= $publicacao->artista ?></p>
                            </div>

                            <div class="containerPerfil"> 
                                <p class="destaqueInfosMobile">Título</p>
                                <p class="infosMobile quebra"><?= $publicacao->titulo ?></p>
                            </div>

                        </div>

                        <div class="parte3">
                            <p class="destaqueInfosMobile">AÇÕES</p>
                                <i class="acao bi bi-eye-fill" onclick="abrirModal('modal-visu-post<?= $publicacao->id ?>')"></i>                                              
                                <i class="acao bi bi-pencil-square <?= $_SESSION['is_admin'] == 1 || $_SESSION['id'] == $publicacao->id_usuario ? '' : 'desabilitado' ?>" onclick="abrirModal('modal-edicao-posts<?= $publicacao->id ?>')"></i>
                                <i class="acao bi bi-trash <?= $_SESSION['is_admin'] == 1 || $_SESSION['id'] == $publicacao->id_usuario ? '' : 'desabilitado' ?>" onclick="abrirModal('modal-excluir-post<?= $publicacao->id ?>')"></i>
                        </div>

                    </div>
                <?php endforeach; ?>
                <?php require "paginacao.view.php" ?>

                

        </section>
    </div>

        <?php foreach ($publicacoes as $publicacao): ?>

            <!-- *MODAL DE EDIÇÃO DE POSTS  -->
            <div class="modal-edicao-posts" id="modal-edicao-posts<?= $publicacao->id ?>">
                <div class="alto-modal-criar">
                    <div class="um-terco-alto-modal-criar parte-esquerda-alto-modal">
                        <h2>Editar publicação</h2>
                    </div>
                    <div class="um-terco-alto-modal-criar">
                        <div class="parte-media-alto-modal">
                            <img class="foto-album-criar-modal" id="foto_renderizada<?= $publicacao->id ?>" src="<?= $publicacao->foto ?>">
                        </div>
                    </div>
                    <div class="um-terco-alto-modal-criar parte-direita-alto-modal">
                        <button class="container-x" type="button" onclick="fecharModal('modal-edicao-posts<?= $publicacao->id ?>')">
                            <i class="sair-da-pagina bi bi-x fill"></i>
                        </button>
                    </div>
                </div>
                <form class="secao-edicao-dados-do-album" action="/tabelaPosts/edit" method="POST">
                    <!-- <section class="secao-instrucao-editar-foto-capa-do-album">
                        <div class="container-instrucao-editar-foto-capa-do-album">
                            <div class="container-texto-instrucao-editar-foto-capa-do-album">
                                <h2>Capa do álbum</h2>
                                <p>Recomendamos uma imagem quadrada de pelo menos 500x500px</p>
                            </div>
                            <button class="botao-alterar-foto-capa-do-album">
                                <i class="icone-alterar-foto-capa-do-album bi bi-box-arrow-up"></i>
                                <span>Alterar foto</span>
                            </button>
                        </div>
                    </section> -->
                    <div class="area-de-colocar-informacoes">
                        <input type="hidden" name="id" value="<?= $publicacao->id ?>">
                        <div class="quarto-da-area-informacoes">
                            <div class="container-dado-a-criar" style="background-color: #773B36;">Id deezer</div> <div class="container-input-e-botao"><input placeholder="Digite o id do deezer" class="input-container-com-botao" name="id_deezer" value="<?= $publicacao->id_deezer ?>"><button type="button" class="container-dado-a-criar botao-container-com-input" style="background-color: #773B36;" onclick="buscarAlbum()" >Salvar</button></div>
                        </div>
                        <div class="quarto-da-area-informacoes">
                            <div class="container-dado-a-criar" style="background-color: var(--cor-vinho-100);">Título</div> <input placeholder="Digite o título" name="titulo" value="<?= $publicacao->titulo ?>">
                        </div>
                        <div class="quarto-da-area-informacoes">
                            <div class="container-dado-a-criar" style="background-color: var(--cor-laranja-200);">Ano de lançamento</div> <input placeholder="Digite o ano" name="ano" value="<?= $publicacao->ano ?>">
                        </div>
                        <div class="quarto-da-area-informacoes">
                            <div class="container-dado-a-criar" style="background-color: var(--cor-vermelho-50);">Artista</div> <input placeholder="Digite o nome do artista" name="artista" value="<?= $publicacao->artista ?>">
                        </div>
                        <div class="quarto-da-area-informacoes">
                        <div class="container-dado-a-criar" style="background-color: #792B3C;">Gênero</div> <input placeholder="Digite o gênero"name="genero" value="<?= $publicacao->genero ?>">
                    </div>
                    <input type="hidden" id="foto_album<?= $publicacao->id ?>" name="foto" value="<?= $publicacao->foto ?>">
                    <div class="quarto-da-area-informacoes">
                        <div class="container-dado-a-criar" style="background-color: #A94752;">Duração</div> <input value="<?= $publicacao->duracao ?>" placeholder="Digite a duração"name="duracao">
                    </div>
                    <input type="hidden" name="id_usuario" value=<?= $publicacao->id_usuario ?>>                    
                     
                    <div class="container-textarea">
                        <div class="container-dado-a-criar" style="background-color: #D55955;">
                            Descrição
                        </div>
                        <textarea rows="10" placeholder="Digite a descrição" name="conceito"><?= $publicacao->conceito ?></textarea>
                    </div>
                    <div class="quarto-da-area-informacoes">
                        <button class="botao-modal-criar cancelar" type="button" onclick="fecharModal('modal-editar-posts')">Cancelar</button>
                        <button class="botao-modal-criar salva">Salvar</button>
                    </div>
                    </div>
                </form>
            </div>

        

            <!--* MODAL DE VISUALIZAR POSTS -->

                <!--* onclick="event.stopPropagation()" nn deixa fechar o modal quando clica nele, ou seja, para o onclick nessa div -->
                <div id="modal-visu-post<?= $publicacao->id ?>" class="des-modal-vi-post">
                    
                    <section class="text-img-boX">
                        <div class="oqmodalVI-post">
                            <h2 class="textpostvih3">Visualizar post</h2>
                        </div>

                        <figure class="imgpostvi">
                            <img class="foto-album-criar-modal" src="<?= $publicacao->foto ?>">
                        </figure>

                        <div class="X">
                            <button class="xisp" type="button" onclick="fecharModal('modal-visu-post<?= $publicacao->id ?>')">
                                <i class="icone-fechar-modal bi bi-x"></i>
                            </button>
                        </div>
                    </section>
                    <section class="container-dados-visu-post">

                        
                        <div class="dados-visu-post">
                            <div class="destaque-dados-visup idDeezer" style="background-color: #773B36;">Id deezer</div>
                            <input class="dado-visu-post" value=<?= $publicacao->id_deezer ?> readonly>
                        </div>

                        <div class="dados-visu-post">
                            <div class="destaque-dados-visup titulo" style="background-color: var(--cor-vinho-100);">Título</div>
                            <input class="dado-visu-post" value=<?= $publicacao->titulo ?> readonly>
                        </div>
                            
                        <div class="dados-visu-post">
                            <div class="destaque-dados-visup ano" style="background-color: var(--cor-laranja-200);">Ano</div>
                            <input class="dado-visu-post" value=<?= $publicacao->ano ?> readonly>                     
                        </div>

                        <div class="dados-visu-post">
                            <div class="destaque-dados-visup artista" style="background-color: var(--cor-vermelho-50);">Artista</div>
                            <input class="dado-visu-post" value=<?= $publicacao->artista ?> readonly>
                        </div>

                        <div class="dados-visu-post">
                            <div class="destaque-dados-visup genero" style="background-color: #792B3C;">Gênero</div>
                            <input class="dado-visu-post" value=<?= $publicacao->genero ?> readonly>
                        </div>
                    
                        <div class="dados-visu-post">
                            <div class="destaque-dados-visup duracao" style="background-color: #A94752;">Duração</div>
                            <input class="dado-visu-post" value=<?= $publicacao->duracao ?> readonly>
                        </div>


                        <div class="container-textarea-vi">
                            <div class="destaque-dados-visup descricao" style="background-color: #D55955">Descrição</div>
                            <textarea rows="10" name="conceito" readonly><?= $publicacao->conceito ?></textarea>
                        </div>

                    </section>

                </div>
            

            <!-- MODAL DE EXCLUIR POSTS -->
                <div id="modal-excluir-post<?= $publicacao->id ?>" class="des-modal-ex-post">

                    <section class="text-img-boX-ex">
                        <section class="oqmodalEX-post">
                            <h2 class="textpostexh3">Excluir post</h2>
                        </section>

                        <figure class="imgpostex">
                            <img class="foto-album-criar-modal" src="<?= $publicacao->foto ?>">
                        </figure>

                        <div class="X">
                            <button class="xisp" type="button" onclick="fecharModal('modal-excluir-post<?= $publicacao->id ?>')">
                                <i class="icone-fechar-modal bi bi-x"></i>
                            </button>
                        </div>
                    </section>

                    <div class="mensagem-botao">
                        <section class="containeravisop">
                            <div class="avisotextop">
                                <!--* o span é inline entt continua ja td na mesma linha -->
                                <p class="avisoSEMdestaquep">Tem certeza que deseja excluir esse post
                                    <span class="avisoCOMdestaquep"> <?= $publicacao->titulo ?> </span>?
                                </p>
                            </div>
                            <p class="rodapeavisop">Você não pode desfazer essa ação.</p>
                        </section>

                        <section class="containerbotoesp">
                            
                            <button class="botao cancelarp" onclick="fecharModal('modal-excluir-post<?= $publicacao->id?>')">CANCELAR</button>
                            
                            <form action="tabelaPosts/delete" method="POST">
                                <!-- hidden = nn aperece para o user
                                ai manda o id para o submit da função de excluir -->
                                <input type="hidden" name="id" value="<?= $publicacao->id ?>">
                    
                                <button class="botao simp" type="submit">SIM</button>
                            </form>                        
                        
                        </section>
                            
                    </div>
                </div>
        <?php endforeach; ?>

        <!-- MODAL DE CRIAR POSTS -->

        <!-- Parte de cima do modal, onde fica a imagem de capa  -->

        <form method="POST" action="/tabelaPosts/create" id="modal-criar-posts">

            <input type="hidden" name="faixas" id="faixas">

            <div class="alto-modal-criar">
                <div class="um-terco-alto-modal-criar parte-esquerda-alto-modal">
                    <h2>Criar publicação</h2>
                </div>
                <div class="um-terco-alto-modal-criar">
                    <div class="parte-media-alto-modal">
                        <img class="foto-album-criar-modal" id="foto_renderizada">
                    </div>
                </div>
                <div class="um-terco-alto-modal-criar parte-direita-alto-modal">
                    <button class="container-x" type="button" onclick="fecharModal('modal-criar-posts')">
                        <i class="sair-da-pagina bi bi-x fill"></i>
                    </button>
                </div>
            </div>

            <!-- Parte onde fica a opção de selecionar a foto -->

            <div class="baixo-modal-criar">
                <!-- <div class="area-de-colocar-informacoes container-informacoes-foto">
                    <div class="primeira-parte-do-container-informacoes-foto">
                        <h2>Capa do álbum</h2>
                        <p>Recomendamos uma imagem quadrada de pelo menos 500 por 500 pixels</p>
                    </div>
                    <div class="segunda-parte-do-container-informacoes-foto">
                        <button type="button" class="botao-anexar-foto-modal-criar">
                            <i class="bi bi-box-arrow-up"></i>
                            Anexar foto
                        </button>
                    </div>
                </div> -->

                <!-- Parte onde fica o formulario com as informações a serem preenchidas -->

                <div class="area-de-colocar-informacoes">
                    <div class="quarto-da-area-informacoes">
                        <div class="container-dado-a-criar" style="background-color: #773B36;">Id deezer</div> <div class="container-input-e-botao"><input placeholder="Digite o id do deezer" class="input-container-com-botao" id="id_deezer_album" name="id_deezer"><button type="button" class="container-dado-a-criar botao-container-com-input" style="background-color: #773B36;" onclick="buscarAlbum()" >Salvar</button></div>
                    </div>
                    <div class="quarto-da-area-informacoes">
                        <div class="container-dado-a-criar" style="background-color: var(--cor-vinho-100);">Título</div> <input id="titulo_album" placeholder="Digite o título" name="titulo">
                    </div>
                    <div class="quarto-da-area-informacoes">
                        <div class="container-dado-a-criar" style="background-color: var(--cor-laranja-200);">Ano</div> <input id="ano_album" placeholder="Digite o ano" name="ano">
                    </div>
                    <div class="quarto-da-area-informacoes">
                        <div class="container-dado-a-criar" style="background-color: var(--cor-vermelho-50);">Artista</div> <input id="artista_album" placeholder="Digite o nome do artista" name="artista">
                    </div>
                    <div class="quarto-da-area-informacoes">
                        <div class="container-dado-a-criar" style="background-color: #792B3C;">Gênero</div> <input placeholder="Digite o gênero" id="genero_album" name="genero">
                    </div>
                    <input type="hidden" id="foto_album" name="foto">
                    <div class="quarto-da-area-informacoes">
                        <div class="container-dado-a-criar" style="background-color: #A94752;">Duração</div> <input placeholder="Digite a duração" id="duracao_album" name="duracao">
                    </div>
                    <input type="hidden" name="id_usuario" value=<?= $_SESSION['id'] ?>>                    
                     
                    <div class="container-textarea">
                        <div class="container-dado-a-criar" style="background-color: #D55955;">
                            Descrição
                        </div>
                        <textarea id="conceito_album" rows="10" placeholder="Digite a descrição" name="conceito"></textarea>
                    </div>
                    <div class="quarto-da-area-informacoes">
                        <button class="botao-modal-criar cancelar" type="button" onclick="fecharModal('modal-criar-posts')">Cancelar</button>
                        <button class="botao-modal-criar salva">Salvar</button>
                    </div>
                </div>            
            </div>
        </form>
    <script src="../../../public/js/tabelaPosts.js"></script>
</body>

</html>