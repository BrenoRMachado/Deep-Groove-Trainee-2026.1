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

    <title>Usuários Cadastrados</title>
</head>

<body id="tbuser">

    <div class="filtro-ao-abrir-modal-da-tabela-de-usuarios"></div>

    <!-- MODAL DE CRIAR USUARIOS -->

    <form id="modal-criar-usuarios"  method="POST" action="/tabelaUsuarios/criar" enctype="multipart/form-data">
        <div class="metade-modal-criar imagem-modal-criar">
            <div class="imagem-capa-modal-criar">
                <i class="bi bi-image" style="font-size: 3rem; color: #5B162D; "></i>
            </div>
            <div class="area-lapis-editar">
                    <div class="container-lapis-editar">
                        <button type="button" class="botao-lapis-modal-criar">
                            <i class="bi bi-pencil" style="color: #5B162D;"></i>
                        </button>
                        <input type="file" name="foto-de-perfil" class="foto-de-perfil-escolhida" accept="image/*">
                    </div>
            </div>
        </div>
        <div class="metade-modal-criar formulario-modal-criar">
            <div class="container-formulario-criar">
                <div class="area-input-modal-criar">
                <h3 class="texto-campo-input-criar">Nome:</h3>
                <input class="input-criar-post" placeholder="Digite seu nome" type="text" name="nome">
                </div>
                <div class="area-input-modal-criar">
                    <h3 class="texto-campo-input-criar">Email:</h3>
                    <input class="input-criar-post" placeholder="Digite seu email" type="email" name="email">
                </div>
                <div class="area-input-modal-criar">
                    <h3 class="texto-campo-input-criar">Senha:</h3>
                    <input class="input-criar-post" placeholder="Digite sua senha" type="password" name="senha">
                </div>
            </div>
            <div class="container-botoes-criar">
                <button class="botao-modal-criar cancelar" type="button" onclick="fecharModalCriar()">Cancelar</button>
                <button class="botao-modal-criar salvar" type="submit">Salvar</button>
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
                            <i class="acao bi bi-pencil-square" data-id="<?= $usuario->id ?>" data-nome="<?= $usuario->nome ?> "data-email="<?= $usuario->email ?>"></i>
                            <i class="acao bi bi-trash" onclick="abrirModal('#modal-excluir-user<?= $usuario->id ?>', '#fundoE')"></i>
                        </td>

                    </tr>

                <?php endforeach; ?>

            </tbody>

            <tfoot>
                <tr>
                    <!-- tem q fazer a paginaçao -->
                </tr>
            </tfoot>
        </table>
    </section>

    <!--* MODAL DE EDIÇÃO DE USUÁRIOS  -->
     <div id="modal-edicao-usuarios">
        <section class="secao-texto-foto-fechar-modal">
            <div class="container-texto">
                <h1>Editar perfil</h1>
                <p>Atualize as informações do seu perfil</p>
            </div>
            <figure class="container-foto-de-perfil">
                <i class="icone-foto-de-perfil bi bi-person-circle"></i>
            </figure>
            <div class="container-botao-fechar-modal">
                <button class="botao-fechar-modal">
                    <i class="icone-fechar-modal bi bi-x"></i>
                </button>
            </div>    
        </section>
        <form class="secao-edicao-dados-do-usuario" method="POST" action="/tabelaUsuarios/editar" enctype="multipart/form-data">
            <input type="hidden" name="id" id="id-usuario-edicao">
            <section class="secao-instrucao-editar-foto-de-perfil">
                <div class="container-instrucao-editar-foto-de-perfil">
                    <div class="container-texto-instrucao-editar-foto-de-perfil">    
                        <h2>Foto de perfil</h2>
                        <p>Recomendamos uma imagem quadrada de pelo menos 500x500px</p>
                    </div>
                    <button type="button" class="botao-alterar-foto-de-perfil">
                        <i class="icone-alterar-foto-de-perfil bi bi-box-arrow-up"></i>
                        <span>Alterar foto</span>
                    </button>
                    <input type="file" name="foto-de-perfil" class="foto-de-perfil-escolhida" accept="image/*">
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
                    <button class="botao botao-cancelar" type="button">Cancelar</button>
                    <button class="botao botao-salvar" type="submit">Salvar</button>
                </div>
            </section>
        </form>
    </div>

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
        <form id="modal-excluir-user<?= $usuario->id ?>" class="des-modal-ex" onclick="event.stopPropagation()" action="tabelaUsuarios/excluir" method="POST">
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
                    
                <!-- hidden = nn aperece para o user
                ai manda o id para o submit da função de excluir -->
                <input type="hidden" name="id" value="<?= $usuario->id ?>">
                    
                    <button class="botao cancelar" onclick="fecharModal('#modal-excluir-user<?= $usuario->id?>', '#fundoE')">CANCELAR</button>
                    <button class="botao sim" type="submit">SIM</button>
                  
                </section>
            </div>
        </form>

  <?php endforeach; ?>
    </div>


    <script src="../../../public/js/tabela-de-usuarios.js"></script>

</body>


</html>