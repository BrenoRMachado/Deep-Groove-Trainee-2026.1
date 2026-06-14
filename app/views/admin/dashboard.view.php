<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Deep Groove</title>

    <!-- *CSS -->
    <link rel="stylesheet" href="../../../public/css/dashboard.css">

    <!-- *FONTES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- *ICONES -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"> 

</head>
<body>
    <main id="dashboard">
        <header id="cabecalho">
            <h1 class="titulo-cabecalho">Dashboard</h1>
            <div class="container-perfil">
                <div class="container-dados-do-admin">
                    <span class="dados-do-admin nome-admin">Nome do administrador</span>
                    <span class="dados-do-admin cargo-admin">Administrador</span>
                </div>
                <button class="icone-perfil">
                    <i class="bi bi-person-check"></i>
                </button>
            </div>
        </header>
        <nav id="area-navegacao-e-estatisticas">
            <ul class="lista-area-navegacao-e-estatisticas">
                <li class="container-usuarios-publicacoes-recentes container-usuarios">
                    <div class="numero-de-usuarios-publicacoes-e-recente numero-de-usuarios">
                        <i class="icone-usuarios-tabelas-e-recentes icone-usuarios bi bi-people-fill"></i>
                        <span class="texto-dados-totais texto-dados-usuarios">
                            Total de Usuários: 
                            <span class="quantidade-total-de-usuarios"><?= $totalDeUsuarios ?></span>
                        </span>
                    </div>
                    <a class="botao-navegar-para-paginas-administrativas botao-navegar-para-tabela-de-usuarios" href="/tabelaUsuarios">
                        Tabela de Usuários
                        <i class="icone-navegar bi bi-chevron-right"></i>
                    </a>
                </li>
                <li class="container-usuarios-publicacoes-recentes container-ultima-atividade">
                    <div class="numero-de-usuarios-publicacoes-e-recente ultima-atividade">
                        <i class="icone-usuarios-tabelas-e-recentes icone-ultima-atividade bi bi-activity"></i>
                        <span class="texto-dados-totais texto-dados-ultima-atividade">
                            Último Cadastro: 
                        </span>
                    </div>
                    <div class="informacao-ultima-atividade informacao-recente">
                        <span>Novo usuário cadastrado</span>
                    </div>
                </li>
                <li class="container-usuarios-publicacoes-recentes container-ultima-publicacao">
                    <div class="numero-de-usuarios-publicacoes-e-recente ultima-publicacao">
                        <i class="icone-usuarios-tabelas-e-recentes icone-ultima-publicacao bi bi-images"></i>
                        <span class="texto-dados-totais texto-dados-ultima-publicacao">
                            Último Post: 
                        </span>
                    </div>
                    <div class="informacao-ultima-publicacao informacao-recente">
                        <span>Publicação mais recente</span>
                    </div>
                </li>
                <li class="container-usuarios-publicacoes-recentes container-publicacoes">
                    <div class="numero-de-usuarios-publicacoes-e-recente numero-de-publicacoes">
                        <i class="icone-usuarios-tabelas-e-recentes icone-publicacoes bi bi-disc"></i>
                        <span class="texto-dados-totais texto-dados-publicacoes">
                            Total de Posts:
                            <span class="quantidade-total-de-publicacoes"><?= $totalDePosts ?></span>
                        </span>
                    </div>
                    <a class="botao-navegar-para-paginas-administrativas botao-navegar-para-tabela-de-publicacoes" href="/tabelaPosts">
                        Tabela de Publicações
                        <i class="icone-navegar bi bi-chevron-right"></i>
                    </a>
                </li>
            </ul>
        </nav>  
        <div id="container-titulo-de-fundo">
            <h1 class="titulo-de-fundo">DEEPGROOVE</h1>
        </div>
        <footer id="rodape">
            <a class="botao botao-home" href="/">
                <i class="icone-home bi bi-house-door-fill"></i>
            </a>
            <a class="botao botao-sign-out" href="/logout">
                <i class="icone-sign-out bi bi-box-arrow-right"></i>
            </a>
        </footer>
        <div class="container-imagem-disco-de-vinil-fundo">
            <img class="imagem-disco-de-vinil-fundo" src="../../../public/assets/disco-de-vinil-cortado-ao-meio.png" alt="Disco de vinil no fundo">
        </div>
    </main>
    <script src="../../../public/js/dashboard.js"></script>
</body>
</html>