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

<div class="filtro-ao-abrir-modal-da-tabela-de-posts"></div>

<section class="topoTabelaPosts">
    <button class="botao-novo-post" onclick="abrirModalCriar()">
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

    <!-- *MODAL DE EDIÇÃO DE POSTS  -->
    <div id="modal-edicao-posts">
        <section class="secao-texto-foto-fechar-modal">
            <div class="container-texto">
                <h1>Editar álbum</h1>
                <p>Atualize as informações do álbum</p>
            </div>
            <figure class="container-foto-capa-do-album">
                <i class="icone-foto-capa-do-album bi bi-image"></i>
            </figure>
            <div class="container-botao-fechar-modal">
                <button class="botao-fechar-modal">
                    <i class="icone-fechar-modal bi bi-x"></i>
                </button>
            </div>    
        </section>
        <form class="secao-edicao-dados-do-album">
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
            <section class="secao-editar-titulo-ano-autor">
                <div class="container-editar-dado container-editar-titulo">
                    <span class="titulo-dado titulo-titulo">Título</span>
                    <input class="editar-dado" type="text" placeholder="Título do álbum">
                </div>
                <div class="container-editar-dado container-editar-ano">
                    <span class="titulo-dado titulo-ano">Ano</span>
                    <input class="editar-dado editar-ano" placeholder="Ano do álbum"></input>
                </div>
                <div class="container-editar-dado container-editar-autor">
                    <span class="titulo-dado titulo-autor">Autor</span>
                    <input class="editar-dado" type="text" placeholder="Autor da publicação">
                </div>
                <div class="secao-botoes-salvar-cancelar">
                    <button class="botao botao-cancelar">Cancelar</button>
                    <button class="botao botao-salvar">Salvar</button>
                </div>
            </section>
        </form>
    </div>

    
    <!--* MODAL DE VISUALIZAR POSTS -->
    <div class="fundoV" onclick="fecharModalVisu('modal-visu-user')">

        <!--* onclick="event.stopPropagation()" nn deixa fechar o modal quando clica nele, ou seja, para o onclick nessa div -->
        <div id="modal-visu-user" class="des-modal-vi" onclick="event.stopPropagation()">

            <section class="fotodeperfilvi">
                <img class="imgperfilvi" src="../../../public/assets/foto placeholder de albuns borda marrom.png" alt="Foto de perfil">
            </section>

            <section class="containerpolvoIMG">
                <img class="polvoIMG" src="../../../public/assets/polvo-modal.jpeg" alt="polvo">


                <img class="xis" src="../../../public/assets/XCircleFill.svg" alt="x" 
                    onclick="fecharModalVisu('modal-visu-user')">

            </section>

            <section id="container-dados-visu">
                <!-- disabled- desbilita total 
            readonly- nn deixa editar mas pode clicar e copiar o texto -->

                <div class="dados-visu">
                    <div class="destaque-dados-visu">ID</div>
                    <div class="dado-visu">1</div>
                </div>

                <div class="dados-visu">
                    <div class="destaque-dados-visu">ARTISTA</div>
                    <div class="dado-visu">Fulano Sicrano da Silva Miguez Soares</div>
                </div>

                <div class="dados-visu">
                    <div class="destaque-dados-visu">TÍTULO</div>
                    <div class="dado-visu">Título</div>
                </div>

            </section>

        </div>

    </div>

    <!--* MODAL DE EXCLUIR USÚARIOS -->

    <div class="fundoE" onclick="fecharModalExcluir('modal-excluir-user')">

        <!--* onclick="event.stopPropagation()" nn deixa fechar o modal quando clica nele, ou seja, para o onclick nessa div -->
        <div id="modal-excluir-user" class="des-modal-ex" onclick="event.stopPropagation()">

            <div class="caixaclara">
                <section class="fotodeperfilex">
                    <img class="imgperfilex" src="../../../public/assets/foto placeholder albuns borda bege.png" alt="Foto de perfil">
                </section>

                <section class="X">
                    <img class="xis" src="../../../public/assets/XCircleFill.svg" alt="x"
                        onclick="fecharModalExcluir('modal-excluir-user')">
                </section>

                <div class="mensagem-botao">
                    <section class="containeraviso">
                        <div class="avisotexto">
                            <!--* o span é inline entt continua ja td na mesma linha -->
                            <p class="avisoSEMdestaque">Tem certeza que deseja excluir esse post?</p>
                        </div>
                        <p class="rodapeaviso">Você não pode desfazer essa ação.</p>
                    </section>

                    <section class="containerbotoes">
                        <button class="botao" onclick="fecharModalExcluir('modal-excluir-user')">CANCELAR</button>
                        <button class="botao" onclick="fecharModalExcluir('modal-excluir-user')">SIM</button>
                    </section>
                </div>

            </div>        

        </div>

    </div>

    <!-- MODAL DE CRIAR POSTS -->

    <!-- Parte de cima do modal, onde fica a imagem de capa  -->

    <form method="POST" action="/tabela-de-posts/create" id="modal-criar-posts">
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
                <button class="container-x">
                    <i class="sair-da-pagina bi bi-x fill"></i>
                </button>
            </div>
        </div>

        <!-- Parte onde fica a opção de mudar a foto -->

        <div class="baixo-modal-criar">
            <div class="area-de-colocar-informacoes container-informacoes-foto">
                <div class="primeira-parte-do-container-informacoes-foto">
                    <h2>Capa do álbum</h2>
                    <p>Recomendamos uma imagem quadrada de pelo menos 500 por 500 pixels</p>
                </div>
                <div class="segunda-parte-do-container-informacoes-foto">
                    <button class="botao-anexar-foto-modal-criar">
                        <i class="bi bi-box-arrow-up"></i>
                        Anexar foto
                    </button>
                </div>
            </div>

        <!-- Parte onde fica o formulario com as informações a serem preenchidas -->

            <div class="area-de-colocar-informacoes">
                <div class="quarto-da-area-informacoes"><div class="container-dado-a-criar" style="background-color: var(--cor-vinho-100);">Título</div> <input placeholder="Digite o título" name="titulo"></div>
                <div class="quarto-da-area-informacoes"><div class="container-dado-a-criar" style="background-color: var(--cor-laranja-200);">Ano de lançamento</div> <input placeholder="Digite o ano" name="ano"></div>
                <div class="quarto-da-area-informacoes"><div class="container-dado-a-criar" style="background-color: var(--cor-vermelho-50);">Artista</div> <input placeholder="Digite o nome do artista" name="artista"></div>
                <div class="quarto-da-area-informacoes"><div class="container-dado-a-criar" style="background-color: green;">Gênero</div> <input name="genero"></div>
                <div class="quarto-da-area-informacoes"><div class="container-dado-a-criar" style="background-color: blue;">Foto</div> <input name="foto"></div>
                <div class="quarto-da-area-informacoes"><div class="container-dado-a-criar" style="background-color: purple;">Duração</div> <input name="duracao"></div>
                <div class="quarto-da-area-informacoes"><div class="container-dado-a-criar" style="background-color: black;">Id usuário</div> <input name="id_usuario"></div>
                <div class="quarto-da-area-informacoes"><div class="container-dado-a-criar" style="background-color: cyan;">Id deezer</div> <input name="id_deezer"></div>
                <div class="container-textarea">
                    <div class="container-dado-a-criar" style="background-color: var(--cor-amarelo);">
                        Descrição
                    </div>
                    <textarea rows="10" placeholder="Digite a descrição" name="conceito"></textarea>
                </div>
                <div class="quarto-da-area-informacoes">
                    <button class="botao-modal-criar cancelar" type="button">Cancelar</button>
                    <button class="botao-modal-criar salva">Salvar</button>
                </div>
            </div>
        </div>
</form>

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
            <?php foreach($publicacoes as $publicacao): ?>
                <tr class="linha linhaTab">
                    <td class="colunageral"><?= $publicacao->id ?></td>
                    <td class="colunageral"><img class="capa-thriller" src="../../../public/assets/capa-thriller.jpg"></td>
                    <td class="colunageral"><?= $publicacao->artista ?></td>
                    <td class="colunageral"><?=  $publicacao->titulo ?></td>

                    <td class="colunageral">
                        <i class="acao bi bi-eye-fill" onclick="abrirModalVisu('modal-visu-user')"></i>
                        <i class="acao bi bi-pencil-square"></i>
                        <i class="acao bi bi-trash" onclick="abrirModalExcluir('modal-excluir-user')"></i>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </section>


    <script src="../../../public/js/tabelaPosts.js"></script>
</body>
</html>