<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/tabelaUsuarios.css">


    <!--* impotando fontes google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Erica+One&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <!--* importando bootstrap-icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- link do bootstrap -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2JL0vWa8Ck2rdkQ2Bzep5IDxbcnCeu0xjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->

    <title>Usuários Cadastrados</title>
</head>

<body id="tbuser">

    
    

    <div class="fundo" id="fundo" onclick="fecharFundo()"></div>
   
    <!-- MODAL DE CRIAR POSTS -->

    <!-- Parte de cima do modal, onde fica a imagem de capa  -->

    <form id="modal-criar-usuarios" class="modalfundo" method="POST" action="/tabelaUsuarios/criar" enctype="multipart/form-data">
        <div class="alto-modal-criar">
            <div class="um-terco-alto-modal-criar parte-esquerda-alto-modal">
                <h2>Criar usuário</h2>
            </div>
            <div class="um-terco-alto-modal-criar">
                <div class="parte-media-alto-modal">
                    <img id="preview-foto-de-perfil-ao-criar-usuario" class="foto-de-perfil-do-usuario-no-modal" src="../../../public/assets/fotos-de-perfil-dos-usuarios/foto-de-perfil-padrao.png">
                </div>
            </div>
            <div class="um-terco-alto-modal-criar parte-direita-alto-modal">
                <button class="cresce container-x" type="button" onclick="fecharModal('#modal-criar-usuarios')">
                    <i class="sair-da-pagina bi bi-x fill"></i>
                </button>
            </div>
        </div>

        <!-- Parte onde fica a opção de selecionar a foto -->

        <div class="baixo-modal-criar">
            <div class="area-de-colocar-informacoes container-informacoes-foto">
                <div class="primeira-parte-do-container-informacoes-foto">
                    <h2>Foto de perfil</h2>
                    <p>Recomendamos uma imagem quadrada de pelo menos 500 por 500 pixels</p>
                </div>
                <div class="segunda-parte-do-container-informacoes-foto">
                    <button type="button" class="cresce botao-anexar-foto-modal-criar" onclick="adicionarFotoDePerfil()">
                        <i class="bi bi-box-arrow-up"></i>
                        Anexar foto
                    </button>
                    <input type="file" name="foto-de-perfil" class="foto-de-perfil-escolhida" accept="image/*">
                </div>
            </div>

        <!-- Parte onde fica o formulario com as informações a serem preenchidas -->

            <div class="area-de-colocar-informacoes">
                <div class="quarto-da-area-informacoes"><div class="container-dado-a-criar" style="background-color: var(--cor-vinho-100);">Nome</div> <input placeholder="Digite o nome" type="text" name="nome" required></div>
                <div class="quarto-da-area-informacoes"><div class="container-dado-a-criar" style="background-color: var(--cor-laranja-200);">Email</div> <input placeholder="Digite o email" type="email" name="email" required></div>
                <div class="quarto-da-area-informacoes"><div class="container-dado-a-criar" style="background-color: var(--cor-vermelho-50);">Senha</div> <input class="criar-senha" placeholder="Digite a senha" type="password" name="senha" required> <button class="botao-de-visualizar-senha-no-modal-de-criar" type="button" onclick="alternarVisualizacaoDaSenhaAoCriarUsuario()" > <i class="icone-visualizar-senha-no-modal-de-criar bi bi-eye-slash-fill"></i> </button> </div>
                <?php if($_SESSION['is_admin']): ?>
                    <div class="quarto-da-area-informacoes">
                        <div class="container-dado-a-criar" style="background-color: var(--cor-laranja-100);">
                            Acesso
                        </div> 
                        <button type="button" class="botao-toggle pin-inativo" id="botao-toggle" onclick="acionarBotaoToggle('#botao-toggle', '#texto-permissao-admin', '#is-admin-input')">
                            <span class="texto-permissao-admin" id="texto-permissao-admin">
                                Acesso padrão
                            </span>
                            <span class="fundo-toggle">
                                <span class="pin-toggle">
        
                                </span>
                            </span>
                        </button>
                        <input type="hidden" name="is_admin" id="is-admin-input" value="0">
                    </div>
                <?php endif; ?>
                <div class="quarto-da-area-informacoes">
                    <button class="botao-modal-criar cancelar cresce" type="reset" onclick="fecharModal('#modal-criar-usuarios')">Cancelar</button>
                    <button class="botao-modal-criar salva cresce" type="submit">Salvar</button>
                </div>
            </div>
        </div>
    </form>


    <div class="espacom">
        <section class="topoTabelaUser">
            <?php if ($_SESSION['is_admin']): ?>
                <button class="botao-novo-post" onclick="abrirModal('#modal-criar-usuarios')">
                    <div class="addUserdesktop ">
                        <i class="icone bi bi-plus"></i>
                        <p class="textop">Novo usuário</p>
                    </div>

                    <div class="addUsermobile ">
                        <img src="../../../public/assets/addMobile.svg" alt="add" class="addm">
                    </div>
                </button>
            <?php endif; ?>    
            <div class="infoUser">
                <img src="../../../public/assets/ícone usuário.svg" alt="User" class="userimg">

                <div class="infos">
                    <h3 class="textoh3"><?= $_SESSION['nome'] ?></h3>
                    <h3 class="textoh3"><?= $_SESSION['is_admin'] ? 'Administrador' : "Usuário" ?></h3>
                </div>

            </div>

        </section>

        <section class="titulo">
            <h1 class="textoTitulo">USUÁRIOS CADASTRADOS</h1>
        </section>

        <section class="pesquisar">
            <input type="text" class="pesqUser" placeholder="Pesquisar usuário...">
        </section>
    

        

        <section class="tabela">
            <table class="tabeladentro">
                <!-- cabeçalho -->
                <thead class="tabelacabe">
                    <!-- linha -->
                    <tr class="linha linhaCab">
                        <!-- coluna -->
                        <th class="coluna colunaCab">ID</th>

                        <th class="coluna colunaCab">Perfil</th>

                        <th class="coluna colunaCab">Nome</th>

                        <th class="coluna colunaCab">Email</th>

                        <th class="coluna colunaCab">Tipo</th>

                        <th class="coluna colunaCab">Ações</th>

                    </tr>

                </thead>

                <tbody class="tabelageral">

                    <?php foreach($usuarios as $usuario): ?>

                        <!-- linha -->
                        <tr class="linha linhaTab">
                            <td class="colunageral"><?= $usuario->id ?></td>
                            <td class="colunageral"><img class="foto-de-cada-usuario-na-tabela" src="<?= $usuario->foto ?>"></td>
                            <td class="colunageral"><?= $usuario->nome ?></td>
                            <td class="colunageral"><?= $usuario->email ?></td>
                            <td class="colunageral"><?= $usuario->is_admin ? 'Administrador' : 'Usuário' ?></td>

                            <td class="colunageral">
                                <i class="acao bi bi-eye-fill" onclick="abrirModal('#modal-visu-user<?= $usuario->id ?>')"></i>
                                <i class="acao bi bi-pencil-square" onclick="abrirModal('#modal-edicao-usuarios<?= $usuario->id ?>')"></i>
                                <i class="acao bi bi-trash" onclick="abrirModal('#modal-excluir-user<?= $usuario->id ?>')"></i>
                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

                <tfoot>
                    <td colspan="6">
                        <!-- paginaçao -->
                        <?php if ($totalPaginas > 1): ?>
                        
                            <div class="containerPaginacao">
                                <ul class="paginacao">
                                    <li >
                                        <a href="?pagina=<?= max(1, $paginaAtual - 1) ?>" class="<?= $paginaAtual <= 1 ? 'disabledseta' : ''?>">&laquo;</a>
                                    </li>

                                    <?php 
                                        $start = max(2, $paginaAtual - 1);
                                        $end = min($totalPaginas - 1, $paginaAtual + 1);
                                    ?>

                                    <li>
                                        <a href="?pagina=1" class="<?= $paginaAtual == 1 ? 'active' : ''?>">1</a>
                                    </li>

                                    <?php if ($start > 2):?>
                                        <li><span class="dots">...</span></li>
                                    <?php endif; ?>

                                    <?php for ($i = $start; $i <= $end; $i++): ?>
                                        <li>
                                            <a href="?pagina=<?= $i ?>" class="<?= $paginaAtual == $i ? 'active' : ''?>"> <?= $i ?></a>
                                        </li>
                                    <?php endfor; ?>

                                    <?php if ($end < $totalPaginas - 1):?>
                                        <li><span class="dots">...</span></li>
                                    <?php endif; ?>

                                    <li>
                                        <a href="?pagina=<?= $totalPaginas ?>" class="<?= $paginaAtual == $totalPaginas ? 'active' : ''?>"> <?= $totalPaginas ?></a>
                                    </li>

                                    <li>
                                        <a href="?pagina=<?= min($totalPaginas, $paginaAtual + 1) ?>" class="<?= $paginaAtual >= $totalPaginas ? 'disabledseta' : ''?>">&raquo;</a>
                                    </li>
                                    
                                </ul>
                            </div>
                        <?php endif; ?>

                    </td>
                </tfoot>
            </table>
        </section>

        <section class="tabelaMobile">

                <?php foreach($usuarios as $usuario): ?>
                    <div class="tabeladentroMobile">
                    
                        <div class="parte1">
                            <div class="containerId"> 
                                <p class="destaqueInfosMobile">ID</p>
                                <p class="infosMobile"><?= $usuario->id ?></p>
                            </div>

                            <div class="containerPerfil"> 
                                <p class="destaqueInfosMobile">Perfil</p>
                                <img class="foto-de-cada-usuario-na-tabela" src="<?= $usuario->foto ?>">
                            </div>
                        </div>

                        <div class="parte2">
                            <div class="containerNome"> 
                                <p class="destaqueInfosMobile quebra">Nome</p>
                                <p class="infosMobile"><?= $usuario->nome ?></p>
                            </div>

                            <div class="containerPerfil"> 
                                <p class="destaqueInfosMobile">Email</p>
                                <p class="infosMobile quebra"><?= $usuario->email ?></p>
                            </div>

                            <div class="containerTipo"> 
                                <p class="destaqueInfosMobile">Tipo</p>
                                <p class="infosMobile"><?= $usuario->is_admin ? 'Administrador' : 'Usuário' ?></p>
                            </div>
                        </div>

                        <div class="parte3">
                            <p class="destaqueInfosMobile">AÇÕES</p>
                            <div class="botoesAcao">
                                    <i class="acao bi bi-eye-fill" onclick="abrirModal('#modal-visu-user<?= $usuario->id ?>')"></i>
                                    <i class="acao bi bi-pencil-square" onclick="abrirModal('#modal-edicao-usuarios<?= $usuario->id ?>')"></i>
                                    <i class="acao bi bi-trash" onclick="abrirModal('#modal-excluir-user<?= $usuario->id ?>')"></i>
                            </div>
                        </div>

                    </div>
                <?php endforeach; ?>


                <section>
                    <div>
                        <!-- paginaçao -->
                        <?php if ($totalPaginas > 1): ?>
                        
                            <div class="containerPaginacao">
                                <ul class="paginacao">
                                    <li >
                                        <a href="?pagina=<?= max(1, $paginaAtual - 1) ?>" class="<?= $paginaAtual <= 1 ? 'disabledseta' : ''?>">&laquo;</a>
                                    </li>

                                    <?php 
                                        $start = max(2, $paginaAtual - 1);
                                        $end = min($totalPaginas - 1, $paginaAtual + 1);
                                    ?>

                                    <li>
                                        <a href="?pagina=1" class="<?= $paginaAtual == 1 ? 'active' : ''?>">1</a>
                                    </li>

                                    <?php if ($start > 2):?>
                                        <li><span class="dots">...</span></li>
                                    <?php endif; ?>

                                    <?php for ($i = $start; $i <= $end; $i++): ?>
                                        <li>
                                            <a href="?pagina=<?= $i ?>" class="<?= $paginaAtual == $i ? 'active' : ''?>"> <?= $i ?></a>
                                        </li>
                                    <?php endfor; ?>

                                    <?php if ($end < $totalPaginas - 1):?>
                                        <li><span class="dots">...</span></li>
                                    <?php endif; ?>

                                    <li>
                                        <a href="?pagina=<?= $totalPaginas ?>" class="<?= $paginaAtual == $totalPaginas ? 'active' : ''?>"> <?= $totalPaginas ?></a>
                                    </li>

                                    <li>
                                        <a href="?pagina=<?= min($totalPaginas, $paginaAtual + 1) ?>" class="<?= $paginaAtual >= $totalPaginas ? 'disabledseta' : ''?>">&raquo;</a>
                                    </li>
                                    
                                </ul>
                            </div>
                        <?php endif; ?>

                    </div>
                </section>

        </section>
    </div>
    

<?php foreach($usuarios as $usuario): ?>
    <!--* MODAL DE EDIÇÃO DE USUÁRIOS  -->
     <div id="modal-edicao-usuarios<?= $usuario->id ?>" class="modal-edicao-usuarios modalfundo">
        <section class="secao-texto-foto-fechar-modal">
            <div class="container-texto">
                <h1>Editar perfil</h1>
                <p>Atualize as informações do seu perfil</p>
            </div>
            <figure class="container-foto-de-perfil">
                <img id="preview-foto-de-perfil-ao-editar-usuario<?= $usuario->id ?>" class="foto-de-perfil-do-usuario-no-modal" src="<?= $usuario -> foto ?>">
            </figure>
            <div class="container-botao-fechar-modal">
                <button class="botao-fechar-modal" onclick="fecharModal('#modal-edicao-usuarios<?= $usuario->id ?>')">
                    <i class="icone-fechar-modal bi bi-x"></i>
                </button>
            </div>    
        </section>
        <form class="secao-edicao-dados-do-usuario" method="POST" action="/tabelaUsuarios/editar" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $usuario->id ?>">
            <section class="secao-instrucao-editar-foto-de-perfil">
                <div class="container-instrucao-editar-foto-de-perfil">
                    <div class="container-texto-instrucao-editar-foto-de-perfil">    
                        <h2>Foto de perfil</h2>
                        <p>Recomendamos uma imagem quadrada de pelo menos 500x500px</p>
                    </div>
                    <button type="button" class="botao-alterar-foto-de-perfil" onclick="editarFotoDePerfil('#foto-de-perfil-escolhida<?= $usuario->id ?>', '#preview-foto-de-perfil-ao-editar-usuario<?= $usuario->id ?>')">
                        <i class="icone-alterar-foto-de-perfil bi bi-box-arrow-up"></i>
                        <span>Alterar foto</span>
                    </button>
                    <input type="file" name="foto-de-perfil" id="foto-de-perfil-escolhida<?= $usuario->id ?>" class="foto-de-perfil-escolhida" accept="image/*">
                </div>
            </section>
            <section class="secao-editar-nome-email-senha">
                <div class="container-editar-dado container-editar-nome">
                    <span class="titulo-dado titulo-nome">Nome</span>
                    <input class="editar-dado editar-nome" type="text" placeholder="Novo nome" name="nome"> 
                </div>
                <div class="container-editar-dado container-editar-email">
                    <span class="titulo-dado titulo-email">Email</span>
                    <input class="editar-dado editar-email" placeholder="Novo email" type="email" name="email"></input>
                </div>
                <div class="container-editar-dado container-editar-senha">
                    <span class="titulo-dado titulo-senha">Senha</span>
                    <input class="editar-dado editar-senha" type="password" placeholder="Nova senha" name="senha">
                </div>
                <?php if($_SESSION['is_admin']): ?>
                    <div class="container-editar-dado container-editar-admin">
                        <span class="titulo-dado titulo-admin">Acesso</span>
                        <button type="button" class="botao-toggle pin-inativo" id="botao-toggle<?= $usuario -> id ?>" onclick="acionarBotaoToggle('#botao-toggle<?= $usuario -> id ?>', '#texto-permissao-admin<?= $usuario -> id ?>', '#is-admin-input<?= $usuario -> id ?>')">
                            <span class="texto-permissao-admin" id="texto-permissao-admin<?= $usuario -> id ?>">Acesso padrão</span>
                            <span class="fundo-toggle">
                                <span class="pin-toggle"></span>
                            </span>
                        </button>
                        <input type="hidden" name="is_admin" id="is-admin-input<?= $usuario -> id ?>" value="0">
                    </div>
                    <div class="secao-botoes-salvar-cancelar">
                        <button class="botao botao-cancelar" type="reset" onclick="fecharModal('#modal-edicao-usuarios<?= $usuario->id ?>')">Cancelar</button>
                        <button class="botao botao-salvar" type="submit">Salvar</button>
                    </div>
                <?php endif; ?>
            </section>
        </form>
    </div>
    
    <!--* MODAL DE VISUALIZAR USUÁRIOS -->
        <!--* onclick="event.stopPropagation()" nn deixa fechar o modal quando clica nele, ou seja, para o onclick nessa div -->
        <div id="modal-visu-user<?= $usuario->id ?>" class="des-modal-vi modalfundo" onclick="event.stopPropagation()">
            <div class="imagemV">
                
                <!-- <img class="fundoModalIMG" src="../../../public/assets/fundo modal.png" alt="Fundo"> -->

                <section class="oqmodalVI">
                    <h3 class="textvih3">Visualizar perfil</h3>
                    <p class="textvip">Visualize as informações do perfil</p>
                </section>

                <section class="fotodeperfilvi">
                    <img class="imgperfilvi" src="../../../public/assets/fotos-de-perfil-dos-usuarios<?= $usuario->foto ?>" alt="Foto de perfil">
                </section>

                <section class="x">

                    <img class="xis" src="../../../public/assets/XCircleFill.svg" alt="x"
                        onclick="fecharModal('#modal-visu-user<?= $usuario->id?>')">

                </section>

                
                <section id="container-dados-visu">
                    <!-- disabled- desbilita total 
            readonly- nn deixa editar mas pode clicar e copiar o texto -->

                    <div class="dados-visu">
                        <div class="destaque-dados-visu id">ID</div>
                        <div class="dado-visu"> <?= $usuario->id ?> </div>
                    </div>

                    <div class="dados-visu">
                        <div class="destaque-dados-visu nome">NOME</div>
                        <div class="dado-visu"> <?= $usuario->nome ?> </div>
                    </div>

                    <div class="dados-visu">
                        <div class="destaque-dados-visu email">EMAIL</div>
                        <div class="dado-visu"> <?= $usuario->email ?> </div>
                    </div>

                    <div class="dados-visu">
                        <div class="destaque-dados-visu tipo">TIPO</div>
                        <div class="dado-visu"> <?= $usuario->is_admin ?> </div>
                    </div>


                </section>

                 

            </div>

        </div>

    <!--* MODAL DE EXCLUIR USÚARIOS -->


        <!--* onclick="event.stopPropagation()" nn deixa fechar o modal quando clica nele, ou seja, para o onclick nessa div -->
        <div id="modal-excluir-user<?= $usuario->id ?>" class="des-modal-ex modalfundo" onclick="event.stopPropagation()">
            <div class="imagemE">

                <section class="oqmodalEX">
                    <h3 class="textexh3">Excluir perfil</h3>
                    <p class="textexp">Excluir as informações do perfil</p>
                
                </section>


                <section class="fotodeperfilex">
                    <img class="imgperfilex" src="../../../public/assets/fotodeperfil.jpg" alt="Foto de perfil">
                </section>

                <section class="X">
                    <img class="xis" src="../../../public/assets/XCircleFill.svg" alt="x"
                        onclick="fecharModal('#modal-excluir-user<?= $usuario->id?>')">
                </section>

                <div class="caixamensagem">
                    <section class="containeraviso">
                        <div class="avisotexto">
                            <!--* o span é inline entt continua ja td na mesma linha -->
                            <p class="avisoSEMdestaque">Tem certeza que deseja excluir o usuário
                                <span class="avisoCOMdestaque"> <?= $usuario->nome ?> </span>?
                            </p>
                        </div>
                        <p class="rodapeaviso">Você não pode desfazer essa ação.</p>
                    </section>
                </div>

                <section class="containerbotoes">

                <button class="botao cancelar-excluir" onclick="fecharModal('#modal-excluir-user<?= $usuario->id?>')">CANCELAR</button>

                <form action="tabelaUsuarios/excluir" method="POST">
                    <!-- hidden = nn aperece para o user
                    ai manda o id para o submit da função de excluir -->
                    <input type="hidden" name="id" value="<?= $usuario->id ?>">
                    
                    <button class="botao sim" type="submit">SIM</button>
                </form>
                  
                </section>
            </div>
     </div>

<?php endforeach; ?>


    <script src="../../../public/js/tabelaUsuarios.js"></script>

</body>


</html>