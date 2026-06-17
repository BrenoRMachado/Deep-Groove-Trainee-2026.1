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
                <li class="container-usuarios-publicacoes-recentes container-atividades-recentes">
                    <div class="numero-de-usuarios-publicacoes-e-recente atividades-recentes">
                        <i class="icone-usuarios-tabelas-e-recentes icone-atividades-recentes bi bi-activity"></i>
                        <span class="texto-dados-totais texto-dados-atividades-recentes">
                            Atividades Recentes: 
                        </span>
                    </div>
                    <div class="informacao-atividades-recentes-1 informacao-recente">
                        <img src="../../../public/assets/michael-jackson-thriller.png" class="foto-do-usuario-da-atividade-recente">
                        <div class="texto-da-informacao-recente">
                            <span class="atividade-no-site">
                                Fulano se cadastrou
                            </span>
                            <span class="data-e-hora">
                                Data e Hora
                            </span>
                        </div>
                    </div>
                    <hr class="linha-dividindo-informacoes-recentes">
                    <button class="botao-ver-mais-atividades-recentes botao-ver-mais-informacoes-recentes" type="button" onclick="verMaisAtividadesRecentes()">
                        <span>
                            Ver mais atividades
                        </span>
                        <i class="icone-ver-mais-publicacoes-recentes icone-ver-mais-informacoes-recentes bi bi-chevron-down"></i>
                    </button>
                    <?php for($i = 2; $i <= 3; $i++): ?>
                        <div class="informacao-atividades-recentes-<?= $i ?> informacao-recente">
                            <img src="../../../public/assets/michael-jackson-thriller.png" class="foto-do-usuario-da-atividade-recente">
                            <div class="texto-da-informacao-recente">
                                <span class="atividade-no-site">
                                    Fulano se cadastrou
                                </span>
                                <span class="data-e-hora">
                                    Data e Hora
                                </span>
                            </div>
                        </div>
                        <hr class="linha-dividindo-informacoes-recentes linha-dividindo-atividades-recentes-<?= $i ?>">
                    <?php endfor; ?>
                    <button class="botao-ver-menos-atividades-recentes botao-ver-menos-informacoes-recentes" type="button" onclick="verMenosAtividadesRecentes()">
                        <span>
                            Ver menos atividades
                        </span>
                        <i class="icone-ver-menos-atividades-recentes icone-ver-menos-informacoes-recentes bi bi-chevron-up"></i>
                    </button>
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
                <li class="container-usuarios-publicacoes-recentes container-publicacoes-recentes">
                    <div class="numero-de-usuarios-publicacoes-e-recente publicacoes-recentes">
                        <i class="icone-usuarios-tabelas-e-recentes icone-publicacoes-recentes bi bi-images"></i>
                        <span class="texto-dados-totais texto-dados-publicacoes-recentes">
                            Publicações recentes: 
                        </span>
                    </div>
                    <div class="informacao-publicacoes-recentes-1 informacao-recente">
                        <img src="<?= $publicacoesRecentes[0] -> foto ?>" class="foto-da-publicacao-recente">
                        <div class="texto-da-informacao-recente">
                            <span class="titulo">
                                <?= $publicacoesRecentes[0] -> titulo ?>
                            </span>
                            <span class="artista">
                                <?= $publicacoesRecentes[0] -> artista ?>
                            </span>
                            <span class="data-e-hora">
                                <?= $publicacoesRecentes[0] -> data_da_publicacao ?>
                            </span>
                        </div>
                    </div>
                    <hr class="linha-dividindo-informacoes-recentes linha-dividindo-informacoes-recentes-1">
                    <button class="botao-ver-mais-publicacoes-recentes botao-ver-mais-informacoes-recentes" type="button" onclick="verMaisPublicacoesRecentes()">
                        <span>
                            Ver mais publicações
                        </span>
                        <i class="icone-ver-mais-publicacoes-recentes icone-ver-mais-informacoes-recentes bi bi-chevron-down"></i>
                    </button>
                    <?php for($i = 2; $i <= 3; $i++): ?>
                    <div class="informacao-publicacoes-recentes-<?= $i ?> informacao-recente">
                        <img src="<?= $publicacoesRecentes[$i - 1] -> foto ?>" class="foto-da-publicacao-recente">
                        <div class="texto-da-informacao-recente">
                            <span class="titulo">
                                <?= $publicacoesRecentes[$i - 1] -> titulo ?>
                            </span>
                            <span class="artista">
                                <?= $publicacoesRecentes[$i - 1] -> artista ?>
                            </span>
                            <span class="data-e-hora">
                                <?= $publicacoesRecentes[$i - 1] -> data_da_publicacao ?>
                            </span>
                        </div>
                    </div>
                    <hr class="linha-dividindo-informacoes-recentes linha-dividindo-publicacoes-recentes-<?= $i ?>">
                    <?php endfor; ?>
                    <button class="botao-ver-menos-publicacoes-recentes botao-ver-menos-informacoes-recentes" type="button" onclick="verMenosPublicacoesRecentes()">
                        <span>
                            Ver menos publicações
                        </span>
                        <i class="icone-ver-menos-publicacoes-recentes icone-ver-menos-informacoes-recentes bi bi-chevron-up"></i>
                    </button>
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