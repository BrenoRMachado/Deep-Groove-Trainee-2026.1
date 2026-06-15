<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../public/css/tabelaPosts.css">
    <!-- impotando fontes google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Erica+One&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- importando bootstrap-icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body id="tbposts">
    <?php require "sidebar.html"; ?>

    <div class="filtro-ao-abrir-modal-da-tabelaPosts"></div>
    <div class="pagecontainer">

        <!-- Topo da tabela -->
         
        <section class="topoTabelaPosts">
            <button class="botao-novo-post" onclick="abrirModal('modal-criar-posts')">
                <div class="addPost">
                    <i class="icone bi bi-plus" style="font-size: x-large;"></i>
                    <p class="textop">Novo Post</p>
                </div>
            </button>

            <div class="infoUser">
                <img src="../../../public/assets/ícone usuário.svg" alt="User">

                <div class="infos">
                    <h3 class="textoh3">Fulano</h3>
                    <h3 class="textoh3">Administrador</h3>
                </div>

            </div>
        </section>

        <!-- Página -->

        <section class="titulo">
            <h1 class="textoTitulo">POSTAGENS</h1>
        </section>

        <section class="pesquisar">
            <input type="text" class="pesqUser" placeholder="Pesquisar postagem...">
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
                        <td class="colunageral"><img class="capa-thriller" src="../../../public/assets/capa-thriller.jpg"></td>
                        <td class="colunageral"><?= $publicacao->artista ?></td>
                        <td class="colunageral"><?= $publicacao->titulo ?></td>

                        <td class="colunageral">
                            <i class="acao bi bi-eye-fill" onclick="abrirModal('modal-visu-post<?= $publicacao->id ?>')"></i>
                            <i class="acao bi bi-pencil-square" onclick="abrirModal('modal-edicao-posts<?= $publicacao->id ?>')"></i>
                            <i class="acao bi bi-trash" onclick="abrirModal('modal-excluir-post<?= $publicacao->id ?>')"></i>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>
        </section>

        <?php foreach ($publicacoes as $publicacao): ?>

            <!-- *MODAL DE EDIÇÃO DE POSTS  -->
            <div class="modal-edicao-posts" id="modal-edicao-posts<?= $publicacao->id ?>">
                <section class="secao-texto-foto-fechar-modal">
                    <div class="container-texto">
                        <h1>Editar álbum</h1>
                        <p>Atualize as informações do álbum</p>
                    </div>
                    <figure class="container-foto-capa-do-album">
                        <i class="icone-foto-capa-do-album bi bi-image"></i>
                    </figure>
                    <div class="container-botao-fechar-modal">
                        <button class="botao-fechar-modal" type="button" onclick="fecharModal('modal-edicao-posts<?= $publicacao->id ?>')">
                            <i class="icone-fechar-modal bi bi-x"></i>
                        </button>
                    </div>
                </section>
                <form class="secao-edicao-dados-do-album" action="/tabelaPosts/edit" method="POST">
                    <section class="secao-instrucao-editar-foto-capa-do-album">
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
                    </section>
                    <div class="area-de-colocar-informacoes">
                        <input type="hidden" name="id" value=<?= $publicacao->id ?>>
                        <div class="quarto-da-area-informacoes">
                            <div class="container-dado-a-criar" style="background-color: var(--cor-vinho-100);">Título</div> <input placeholder="Digite o título" name="titulo" value=<?= $publicacao->titulo ?> required>
                        </div>
                        <div class="quarto-da-area-informacoes">
                            <div class="container-dado-a-criar" style="background-color: var(--cor-laranja-200);">Ano de lançamento</div> <input placeholder="Digite o ano" name="ano" value=<?= $publicacao->ano ?> required>
                        </div>
                        <div class="quarto-da-area-informacoes">
                            <div class="container-dado-a-criar" style="background-color: var(--cor-vermelho-50);">Artista</div> <input placeholder="Digite o nome do artista" name="artista" value=<?= $publicacao->artista ?> required>
                        </div>
                        <div class="quarto-da-area-informacoes">
                            <div class="container-dado-a-criar" style="background-color: green;">Gênero</div> <input name="genero" value=<?= $publicacao->genero ?> required>
                        </div>
                        <div class="quarto-da-area-informacoes">
                            <div class="container-dado-a-criar" style="background-color: blue;">Foto</div> <input name="foto" value=<?= $publicacao->foto ?> required>
                        </div>
                        <div class="quarto-da-area-informacoes">
                            <div class="container-dado-a-criar" style="background-color: purple;">Duração</div> <input name="duracao" value=<?= $publicacao->duracao ?> required>
                        </div>
                        <div class="quarto-da-area-informacoes">
                            <div class="container-dado-a-criar" style="background-color: black;">Id usuário</div> <input name="id_usuario" value=<?= $publicacao->id_usuario ?> required>
                        </div>
                        <div class="quarto-da-area-informacoes">
                            <div class="container-dado-a-criar" style="background-color: cyan;">Id deezer</div> <input name="id_deezer" value=<?= $publicacao->id_deezer ?> required>
                        </div>
                        <div class="container-textarea">
                            <div class="container-dado-a-criar" style="background-color: var(--cor-amarelo);">
                                Descrição
                            </div>
                            <textarea rows="10" placeholder="Digite a descrição" name="conceito"><?= $publicacao->conceito ?></textarea>
                        </div>
                        <div class="quarto-da-area-informacoes">
                            <button class="botao-modal-criar cancelar" type="button" onclick="fecharModal('modal-edicao-posts<?= $publicacao->id ?>')">Cancelar</button>
                            <button class="botao-modal-criar salva">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>

        

            <!--* MODAL DE VISUALIZAR POSTS -->

                <!--* onclick="event.stopPropagation()" nn deixa fechar o modal quando clica nele, ou seja, para o onclick nessa div -->
                <div id="modal-visu-post<?= $publicacao->id ?>" class="des-modal-vi-post">
                    <div class="imagemV-post">

                        <section class="oqmodalVI-post">
                            <h3 class="textpostvih3">Visualizar post</h3>
                            <p class="textpostvip">Visualize as informações do post</p>
                        </section>

                        <section class="fotodopostvi">
                            <img class="imgpostvi" src="../../../public/assets/deepgroove-logo.png<?= $publicacao->foto ?>" alt="Foto do post">
                        </section>

                        <section class="X">
                            <img class="xisp" src="../../../public/assets/XCircleFill.svg" alt="x"
                            onclick="fecharModal('modal-visu-post<?= $publicacao->id ?>')">
                        </section>

                        <section id="container-dados-visu-post">
                            <!-- disabled- desbilita total 
                            readonly- nn deixa editar mas pode clicar e copiar o texto -->
                            <div class="dados-visu-post">
                                <div class="destaque-dados-visup id" style="background-color: var(--coloid);">Id</div>
                                <div class="dado-visu-post"> <?= $publicacao->id ?> </div>                     
                            </div>

                            <div class="dados-visu-post">
                                <div class="destaque-dados-visup titulo" style="background-color: var(--cor-vinho-100);">Título</div>
                                <div class="dado-visu"> <?= $publicacao->titulo ?> </div>
                            </div>
                                
                            <div class="dados-visu-post">
                                <div class="destaque-dados-visup ano" style="background-color: var(--cor-laranja-200);">Ano de lançamento</div>
                                <div class="dado-visu-post"> <?= $publicacao->ano ?> </div>                     
                            </div>

                            <div class="dados-visu-post">
                                <div class="destaque-dados-visup artista" style="background-color: var(--cor-vermelho-50);">Artista</div>
                                <div class="dado-visu-post"> <?= $publicacao->artista ?> </div>
                            </div>

                            <div class="dados-visu-post">
                                <div class="destaque-dados-visup genero" style="background-color: green;">Gênero</div>
                                <div class="dado-visu-post"> <?= $publicacao->genero ?> </div>
                            </div>

                            <div class="dados-visu-post">
                                <div class="destaque-dados-visup foto" style="background-color: blue;">FOTO</div>
                                <div class="dado-visu-post"> <?= $publicacao->foto ?> </div>
                            </div>

                            <div class="dados-visu-post">
                                <div class="destaque-dados-visup duracao" style="background-color: purple;">Duração</div>
                                <div class="dado-visu-post"> <?= $publicacao->duracao ?> </div>
                            </div>

                            <div class="dados-visu-post">
                                <div class="destaque-dados-visup idUsuario" style="background-color: black;">Id usuário</div>
                                <div class="dado-visu-post"> <?= $publicacao->id_usuario ?> </div>
                            </div>

                            <div class="dados-visu-post">
                                <div class="destaque-dados-visup idDeezer" style="background-color: cyan;">Id deezer</div>
                                <div class="dado-visu-post"> <?= $publicacao->id_deezer ?> </div>
                            </div>

                            <div class="container-textarea-vi">
                                <div class="destaque-dados-visup descricao" style="background-color: var(--cor-amarelo);">Descrição</div>
                                <textarea rows="10" name="conceito"><?= $publicacao->conceito ?></textarea>
                            </div>

                        </section>

                    </div>
                </div>
                
            </div>     
    
            
            <!--* MODAL DE EXCLUIR POSTS -->
                
                <!--* onclick="event.stopPropagation()" nn deixa fechar o modal quando clica nele, ou seja, para o onclick nessa div -->
                <div id="modal-excluir-post<?= $publicacao->id ?>" class="des-modal-ex-post">
                    <div class="caixaclara">

                        <section class="oqmodalEX-post">
                            <h3 class="textpostexh3">Excluir post</h3>
                            <p class="textpostexp">Excluir as informações do post</p>
                        </section>

                        <section class="fotodopostex">
                            <img class="imgpostex" src="../../../public/assets/deepgroov-logo.png<?= $publicacao->foto ?>" alt="Foto do post">
                        </section>

                        <section class="X">
                            <img class="xisp" src="../../../public/assets/XCircleFill.svg" alt="x" onclick="fecharModal('modal-excuir-post<?= $publicacao->id ?>')">
                        </section>

                        <div class="mensagem-botao">
                            <section class="containeravisop">
                                <div class="avisotextop">
                                    <!--* o span é inline entt continua ja td na mesma linha -->
                                    <p class="avisoSEMdestaquep">Tem certeza que deseja excluir esse post?
                                        <span class="avisoCOMdestaquep"> <?= $publicacao->titulo ?> </span>?
                                    </p>
                                </div>
                                <p class="rodapeavisop">Você não pode desfazer essa ação.</p>
                            </section>

                            <section class="containerbotoesp">
                                
                                <button class="botao cancelarp" onclick="fecharModal('modal-excluir-post<?= $publicacao->id?>')">CANCELAR</button>
                                
                                <form action="tabelaPosts/excluir" method="POST">
                                    <!-- hidden = nn aperece para o user
                                    ai manda o id para o submit da função de excluir -->
                                    <input type="hidden" name="id" value="<?= $publicacao->id ?>">
                        
                                    <button class="botao simp" type="submit">SIM</button>
                                </form>                        
                            
                            </section>
                                
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <!-- MODAL DE CRIAR POSTS -->

        <!-- Parte de cima do modal, onde fica a imagem de capa  -->

        <form method="POST" action="/tabelaPosts/create" id="modal-criar-posts">
            <div class="alto-modal-criar">
                <div class="um-terco-alto-modal-criar parte-esquerda-alto-modal">
                    <h2>Criar postagem</h2>
                </div>
                <div class="um-terco-alto-modal-criar">
                    <div class="parte-media-alto-modal">
                        <i class="imagem-placeholder-capa-criar-post bi bi-image"></i>
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
                <div class="area-de-colocar-informacoes container-informacoes-foto">
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
                </div>

                <!-- Parte onde fica o formulario com as informações a serem preenchidas -->

                <div class="area-de-colocar-informacoes">
                    <div class="quarto-da-area-informacoes">
                        <div class="container-dado-a-criar" style="background-color: var(--cor-vinho-100);">Título</div> <input placeholder="Digite o título" name="titulo">
                    </div>
                    <div class="quarto-da-area-informacoes">
                        <div class="container-dado-a-criar" style="background-color: var(--cor-laranja-200);">Ano de lançamento</div> <input placeholder="Digite o ano" name="ano">
                    </div>
                    <div class="quarto-da-area-informacoes">
                        <div class="container-dado-a-criar" style="background-color: var(--cor-vermelho-50);">Artista</div> <input placeholder="Digite o nome do artista" name="artista">
                    </div>
                    <div class="quarto-da-area-informacoes">
                        <div class="container-dado-a-criar" style="background-color: green;">Gênero</div> <input name="genero">
                    </div>
                    <div class="quarto-da-area-informacoes">
                        <div class="container-dado-a-criar" style="background-color: blue;">Foto</div> <input name="foto">
                    </div>
                    <div class="quarto-da-area-informacoes">
                        <div class="container-dado-a-criar" style="background-color: purple;">Duração</div> <input name="duracao">
                    </div>
                    <div class="quarto-da-area-informacoes">
                        <div class="container-dado-a-criar" style="background-color: black;">Id usuário</div> <input name="id_usuario">
                    </div>
                    <div class="quarto-da-area-informacoes">
                        <div class="container-dado-a-criar" style="background-color: cyan;">Id deezer</div> <input name="id_deezer">
                    </div>
                    <div class="container-textarea">
                        <div class="container-dado-a-criar" style="background-color: var(--cor-amarelo);">
                            Descrição
                        </div>
                        <textarea rows="10" placeholder="Digite a descrição" name="conceito"></textarea>
                    </div>
                    <div class="quarto-da-area-informacoes">
                        <button class="botao-modal-criar cancelar" type="button" onclick="fecharModal('modal-criar-posts')">Cancelar</button>
                        <button class="botao-modal-criar salva">Salvar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="../../../public/js/tabelaPosts.js"></script>
</body>

</html>