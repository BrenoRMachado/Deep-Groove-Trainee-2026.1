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

    <div class="filtro-ao-abrir-modal-da-tabela-de-usuarios"></div>

    <!-- MODAL DE CRIAR POSTS -->

    <!-- Parte de cima do modal, onde fica a imagem de capa  -->

    <form id="modal-criar-usuarios">
        <div class="alto-modal-criar">
            <div class="um-terco-alto-modal-criar parte-esquerda-alto-modal">
                <h2>Criar usuário</h2>
            </div>
            <div class="um-terco-alto-modal-criar">
                <div class="parte-media-alto-modal">
                    <i class="imagem-placeholder-capa-criar-post bi bi-person-circle"></i>
                </div>
            </div>
            <div class="um-terco-alto-modal-criar parte-direita-alto-modal">
                <button class="container-x" type="button" onclick="fecharModalCriar()">
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
                    <button type="button" class="botao-anexar-foto-modal-criar">
                        <i class="bi bi-box-arrow-up"></i>
                        Anexar foto
                    </button>
                </div>
            </div>

        <!-- Parte onde fica o formulario com as informações a serem preenchidas -->

            <div class="area-de-colocar-informacoes">
                <div class="quarto-da-area-informacoes"><div class="container-dado-a-criar" style="background-color: var(--cor-vinho-100);">Nome</div> <input placeholder="Digite o nome" name="titulo"></div>
                <div class="quarto-da-area-informacoes"><div class="container-dado-a-criar" style="background-color: var(--cor-laranja-200);">Email</div> <input placeholder="Digite o email" name="ano"></div>
                <div class="quarto-da-area-informacoes"><div class="container-dado-a-criar" style="background-color: var(--cor-vermelho-50);">Senha</div> <input placeholder="Digite a senha" name="ano"></div>
                <div class="quarto-da-area-informacoes">
                    <button class="botao-modal-criar cancelar" type="button" onclick="fecharModalCriar()">Cancelar</button>
                    <button class="botao-modal-criar salva">Salvar</button>
                </div>
            </div>
        </div>
    </form>



    <section class="topoTabelaUser">
        <button class="botao-novo-post" onclick="abrirModalCriar()">
            <div class="addUser">
                <i class="icone bi bi-plus"></i>
                <p class="textop">Novo usuário</p>
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
                        <td class="colunageral"><img src="<?= $usuario->foto ?>"></td>
                        <td class="colunageral"><?= $usuario->nome ?></td>
                        <td class="colunageral"><?= $usuario->email ?></td>
                        <td class="colunageral"><?= $usuario->is_admin ? 'Administrador' : 'Usuário' ?></td>

                        <td class="colunageral">
                            <i class="acao bi bi-eye-fill" onclick="abrirModal('#modal-visu-user<?= $usuario->id ?>', '#fundoV')"></i>
                            <i class="acao bi bi-pencil-square" onclick="abrirModalDeEdicaoDeUsuario('#modal-edicao-usuarios<?= $usuario->id ?>')"></i>
                            <i class="acao bi bi-trash" onclick="abrirModal('#modal-excluir-user<?= $usuario->id ?>', '#fundoE')"></i>
                        </td>

                    </tr>

                <?php endforeach; ?>

            </tbody>

            <tfoot>
                <tr>
                    <!-- paginaçao -->
                    <?php if ($totalPaginas > 1): ?>
                    
                        <div class="containerPaginacao">
                            <ul class="paginacao">
                                <li>
                                    <a heref="?pagina=<?= max(1, $paginaAtual - 1) ?>" class="<?= $paginaAtual <= 1 ? 'disabled' : ''?>">&laquo; Anterior</a>
                                </li>

                                <?php 
                                    $start = max(2, $paginaAtual - 1);
                                    $end = min($totalPaginas - 1, $paginaAtual + 1);
                                ?>

                                <li>
                                    <a heref="?pagina=1" class="<?= $paginaAtual == 1 ? 'active' : ''?>">1</a>
                                </li>

                                <?php if ($start > 2):?>
                                    <li><span class="dots">...</span>
                                <?php endif; ?>

                                <?php for ($i = $start; $i <= $end; $i++): ?>
                                    <li>
                                        <a heref="?pagina=<?= $i ?>" class="<?= $paginaAtual == $i ? 'active' : ''?>"> <?= $i ?></a>
                                    </li>
                                <?php endfor; ?>

                                <?php if ($end < $totalPaginas - 1):?>
                                    <li><span class="dots">...</span>
                                <?php endif; ?>

                                <li>
                                    <a heref="?pagina=<?= $totalPaginas ?>" class="<?= $paginaAtual == $totalPaginas ? 'active' : ''?>"> <?= $totalPaginas ?></a>
                                </li>

                                <li>
                                    <a heref="?pagina=<?= min($totalPaginas, $paginaAtual + 1) ?>" class="<?= $paginaAtual >= $totalPaginas ? 'disabled' : ''?>">Próximo &raquo;</a>
                                </li>
                                
                            </ul>
                        </div>
                    <?php endif; ?>

                </tr>
            </tfoot>
        </table>
    </section>

    <!--* MODAL DE EDIÇÃO DE USUÁRIOS  -->
    <?php foreach($usuarios as $usuario): ?>
     <div id="modal-edicao-usuarios<?= $usuario->id ?>" class="modal-edicao-usuarios">
        <section class="secao-texto-foto-fechar-modal">
            <div class="container-texto">
                <h1>Editar perfil</h1>
                <p>Atualize as informações do seu perfil</p>
            </div>
            <figure class="container-foto-de-perfil">
                <i class="icone-foto-de-perfil bi bi-person-circle"></i>
            </figure>
            <div class="container-botao-fechar-modal">
                <button class="botao-fechar-modal" onclick="fecharEdicaoDeUsuario('#modal-edicao-usuarios<?= $usuario->id ?>')">
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
                    <button type="button" class="botao-alterar-foto-de-perfil" onclick="editarFotoDePerfil('#foto-de-perfil-escolhida<?= $usuario->id ?>')">
                        <i class="icone-alterar-foto-de-perfil bi bi-box-arrow-up"></i>
                        <span>Alterar foto</span>
                    </button>
                    <input type="file" name="foto-de-perfil" id="foto-de-perfil-escolhida<?= $usuario->id ?>" class="foto-de-perfil-escolhida" accept="image/*">
                </div>
            </section>
            <section class="secao-editar-nome-email-senha">
                <div class="container-editar-dado container-editar-nome">
                    <span class="titulo-dado titulo-nome">Nome</span>
                    <input class="editar-dado" type="text" placeholder="Nome" name="nome">
                </div>
                <div class="container-editar-dado container-editar-email">
                    <span class="titulo-dado titulo-email">Email</span>
                    <input class="editar-dado editar-email" placeholder="Email" type="email" name="email"></input>
                </div>
                <div class="container-editar-dado container-editar-senha">
                    <span class="titulo-dado titulo-senha">Senha</span>
                    <input class="editar-dado" type="password" placeholder="Senha" name="senha">
                </div>
                <div class="secao-botoes-salvar-cancelar">
                    <button class="botao botao-cancelar" type="button" onclick="cancelarEdicaoDeUsuario('#modal-edicao-usuarios<?= $usuario->id ?>')">Cancelar</button>
                    <button class="botao botao-salvar" type="submit" onclick="salvarEdicaoDeUsuario()">Salvar</button>
                </div>
            </section>
        </form>
    </div>
    <?php endforeach; ?>    
    
    <!--* MODAL DE VISUALIZAR USUÁRIOS -->
    <div class="fundo" id="fundoV" onclick="fecharModal('#modal-visu-user<?= $usuario->id ?>', '#fundoV')">
     <?php foreach($usuarios as $usuario): ?>
        <!--* onclick="event.stopPropagation()" nn deixa fechar o modal quando clica nele, ou seja, para o onclick nessa div -->
        <div id="modal-visu-user<?= $usuario->id ?>" class="des-modal-vi" onclick="event.stopPropagation()">
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
                        onclick="fecharModal('#modal-visu-user<?= $usuario->id?>', '#fundoV')">

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

     <?php endforeach; ?>
    </div>

    <!--* MODAL DE EXCLUIR USÚARIOS -->

    <div class="fundo" id="fundoE" onclick="fecharModal('#modal-excluir-user<?= $usuario->id ?>', '#fundoE')">
        
     <?php foreach($usuarios as $usuario): ?>


        <!--* onclick="event.stopPropagation()" nn deixa fechar o modal quando clica nele, ou seja, para o onclick nessa div -->
        <div id="modal-excluir-user<?= $usuario->id ?>" class="des-modal-ex" onclick="event.stopPropagation()">
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
                        onclick="fecharModal('#modal-excluir-user<?= $usuario->id?>', '#fundoE')">
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

                <button class="botao cancelar" onclick="fecharModal('#modal-excluir-user<?= $usuario->id?>', '#fundoE')">CANCELAR</button>

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
    </div>


    <script src="../../../public/js/tabela-de-usuarios.js"></script>

</body>


</html>