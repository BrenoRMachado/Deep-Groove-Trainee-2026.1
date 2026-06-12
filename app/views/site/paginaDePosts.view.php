<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Posts da Deep Grove</title>

    <!-- *FONTES -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- *CSS -->
    <link rel="stylesheet" href="../../../public/css/pagina-de-posts.css">

    <!-- *ÍCONES -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>
    <main id="pagina-de-posts">
        <h1 class="titulo">Publicações</h1>
        <form id="container-de-pesquisa-filtro-e-selecao" action="/posts" method="GET">
            <div class="container-pesquisa-e-filtro">
                <div class="barra-de-pesquisa">
                    <input type="text" name="pesquisar" placeholder="Nome do álbum..." class="pesquisar" value="<?= $textoDeBusca ?>">
                    <button class="botao-de-pesquisa" type="submit">
                        <i class="icone de pesquisa bi bi-search"></i>
                    </button>
                </div>
                <select name="filtro" class="botao-filtro-de-pesquisa" onchange="this.form.submit()">
                    <option class="titulo-do-filtro" value="" hidden>Filtrar</option>
                    <option class="opcao
                    -do-filtro" value="">Remover filtro</option>
                    <option class="opcao-do-filtro" value="pop" <?= $filtro == 'pop' ? 'selected' : ''?>>Pop</option>
                    <option class="opcao-do-filtro" value="rock" <?= $filtro == 'rock' ? 'selected' : ''?>>Rock</option>
                    <option class="opcao-do-filtro" value="rap" <?= $filtro == 'rap' ? 'selected' : ''?>>Rap</option>
                    <option class="opcao-do-filtro" value="eletronica" <?= $filtro == 'eletronica' ? 'selected' : ''?>>Eletrônica</option>
                    <option class="opcao-do-filtro" value="jazz" <?= $filtro == 'jazz' ? 'selected' : ''?>>Jazz</option>
                    <option class="opcao-do-filtro" value="classica" <?= $filtro == 'classica' ? 'selected' : ''?>>Clássica</option>
                    <option class="opcao-do-filtro" value="metal" <?= $filtro == 'metal' ? 'selected' : ''?>>Metal</option>
                </select>
            </div>
        </form>

        <!-- !INÍCIO DA ÁREA DE POSTS PARA DESKTOP -->

        <section id="container-posts-desktop">
            <?php foreach ($posts as $post): ?>
            <div class="album-container">
                <div class="album">
                    <img src="<?= $post -> foto ?>" class="capa-album" alt="Capa do álbum de id <?= $post -> id ?>">
                    <div class="informacoes-do-album">
                        <h2 class="titulo-do-album"><?= $post -> titulo ?></h2>
                        <p class="descricao-autor-do-album descricao-do-album"><?= $post -> ano ?></p>
                        <p class="descricao-autor-do-album autor-da-musica"><?= $post -> autor_nome?></p>
                    </div>
                </div>
                <img src="../../../public/assets/disco-de-vinil-pagina-de-posts.png" class="disco-de-vinil">    
            </div>
            <?php endforeach; ?>
        </section>

        <!-- !FIM DA ÁREA DE POSTS PARA DESKTOP -->

        <!-- !INÍCIO ÁREA DE POSTS PARA TABLET / MOBILE -->

        <section id="container-posts-mobile">
            <?php foreach ($posts as $post): ?>
            <div class="album-container">
                <div class="capa-texto-album-container">
                    <div class="album">
                        <img src="<?= $post -> foto ?>" class="capa-album" alt="Capa do álbum de id <?= $post -> id ?>">
                    </div>
                    <div class="informacoes-do-album">
                        <h2 class="titulo-do-album"><?= $post -> titulo ?></h2>
                        <p class="descricao-autor-do-album descricao-do-album"><?= $post -> ano ?></p>
                        <p class="descricao-autor-do-album autor-da-musica"><?= $post -> autor_nome ?></p>
                    </div>
                </div>
                <img src="../../../public/assets/disco-de-vinil-pagina-de-posts.png" class="disco-de-vinil">    
            </div>
            <?php endforeach; ?>
        </section>

        <!-- !FIM DA ÁREA DE POSTS PARA TABLET / MOBILE -->
        
        <section id="container-de-mudanca-de-pagina">
            <?php
                $comeco = max(2, $paginaAtual - 1);
                $final = min($totalDePaginas - 1, $paginaAtual + 1);
                $parametrosDeBuscaEfiltro = '';
                if ($textoDeBusca) $parametrosDeBuscaEfiltro .= 'pesquisar=' . $textoDeBusca . '&';
                if ($filtro)       $parametrosDeBuscaEfiltro .= 'filtro=' . $filtro . '&';
            ?>
            <ul class="container-botoes">
                <li>
                    <a href="?<?= $parametrosDeBuscaEfiltro ?>&pagina=<?=  max(1, $paginaAtual - 1) ?>" class="<?= $paginaAtual <= 1 ? 'desabilitado' : ''?> botao seta-esquerda-mudar-para-pagina-anterior">
                        <i class="bi bi-chevron-left"></i>
                    </a>
                </li>
                <li>
                    <a href="?<?= $parametrosDeBuscaEfiltro ?>pagina=1" class="<?= $paginaAtual == 1 ? 'ativo' : ''?> botao botao-numerado">1</a>
                </li>
                <?php if ($comeco > 2): ?>
                    <li>
                        <span class="existe-mais-paginas">...</span>
                    </li>
                <?php endif; ?>    
                <?php for ($i = $comeco; $i <= $final; $i++): ?>
                    <li>
                        <a href="?<?= $parametrosDeBuscaEfiltro ?>pagina=<?= $i ?>" class="<?= $paginaAtual == $i ? 'ativo' : ''?> botao botao-numerado"><?= $i ?></a>
                    </li>
                <?php endfor; ?>    
                <?php if ($final < $totalDePaginas - 1): ?>
                    <li>
                        <span class="existe-mais-paginas">...</span>
                    </li>
                <?php endif; ?> 
                <?php if ($totalDePaginas > 1): ?>
                <li>
                    <a href="?<?= $parametrosDeBuscaEfiltro ?>pagina=<?= $totalDePaginas ?>" class="<?= $paginaAtual == $totalDePaginas ? 'ativo' : ''?> botao botao-numerado"><?= $totalDePaginas ?></a>
                </li>
                <?php endif; ?>
                <li>
                    <a href="?<?= $parametrosDeBuscaEfiltro ?>pagina=<?=  min($totalDePaginas, $paginaAtual + 1) ?>" class="<?= $paginaAtual >= $totalDePaginas ? 'desabilitado' : ''?> botao seta-direita-mudar-para-proxima-pagina">
                        <i class="bi bi-chevron-right"></i>
                    </a>
                </li>
            </ul>
        </section>
    </main>
</body>
</html>