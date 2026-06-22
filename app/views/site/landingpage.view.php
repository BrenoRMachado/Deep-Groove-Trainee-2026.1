<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deep Groove</title>
    <link rel="stylesheet" href="../../../public/css/landingpage.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Anton&family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Erica+One&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

</head>

<body class="tudolanding">
    <?php require "navbar.view.php"; ?>

    <!-- HERO SECTION -->
    <!--todo: hero section como um todo -->
    <section class="hero-section">

        <!--todo: somente os elementos da HS (como texto, imagens e botôes) -->
        <div class="elementos-hs">

            <!--todo: contem texto, slogan e botão -->
            <div class="metade-texto">

                <!-- todo: slogan (titulo) como um todo -->
                <div class="tdtitulo">

                    <!-- todo: primeira linha do slogan -->
                    <div class="titulo2">
                        <h1 class="h1lan">ENTRE</h1>
                        <h3 class="h3lan">NO</h3>
                    </div>

                    <!-- todo: segunda linha do slogan -->
                    <h1 class="h11lan">RITMO</h1>
                </div>

                <div class="espaco">
                    <p class="texto_hs">Mergulhar na essência da música e tornar-se o santuário digital respeitando acultura e identidade artística.</p>

                    <a class="botão" href="/instrucoes">Instruções de compra</a>
                </div>
                
            </div>

            <!--todo: contem a logo dos teltáculos saindo do instrumento -->
            <div class="metade-logo">
                <img id="logopolvo" src="../../../public/assets/deepgroove-logo.png">
            </div>

        </div>

    </section>

    <!-- CARROUSSEL -->
    <!--! corroussel como um todo -->
    <section class="carroussel">

        <!--! titulo do carroussel -->
        <div class="titulo-total1">
            <img class="titulo_carroussel_img" src="../../../public/assets/onda nova s-background.png">
            <h1 class="titulo_carroussel">MAIS VENDIDOS</h1>
            <img class="titulo_carroussel_img im2" src="../../../public/assets/onda nova s-background.png">
        </div>
        <!--! contem as imagems, setas e bolinhas do carroussel  -->
        <div class="slider">

            <!--! seta esquerda -->
            <div class="nav-arrow seta_esquerda" id="seta_esquerda">&#10094</div>

                <!--! imagens que vão estar passando no carroussel -->
                <div class="slider-conteudo">
                    <?php foreach ($posts as $post): ?>
                        <div class="slider-item">
                            <a href="/paginaIndividual?id=<?= $post->id ?>" class="slider-link">
                                <img src="<?= $post->foto ?>">

                                <div class="slider-informacoes">
                                    <h2 class="slider-titulo"><?= $post->titulo ?></h2>
                                    <p class="slider-texto"><?= $post->ano ?></p>
                                    <p class="slider-texto"><?= $post->artista ?></p>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <!--! bolinhas quantificadoras de "página" -->
            <div class="radio-auto"></div>

            <!--! seta direita -->
            <div class="nav-arrow seta_direita" id="seta_direita">&#10095</div>

        </div>

    </section>
    <!-- JAVA SCRIPT DO CARROUSSEL  -->
    <script src="../../../public/js/landingpage.js"></script>


    <!-- MOSAICO -->
    <!--? o mosaico como um todo -->
    <section class="mosaico">

        <!--? titulo do mosaico -->
        <div class="titulo-total2">
            <img class="titulo_mosaico_img" src="../../../public/assets/onda nova s-background.png">
            <h1 class="titulo-mosaico">ÚLTIMOS PUBLICADOS</h1>
            <img class="titulo_mosaico_img im2m" src="../../../public/assets/onda nova s-background.png">
        </div>

        <!--? contem os posts -->
        <div class="elementos-post">
            
            <!--? o poste quadrado grandão -->
            <div class="postGrande">
                <img src="<?= $publicacoesRecentes[0]->foto?>">

                <div class="mosaico-informacoes">
                    <h2 class="mosaico-titulo"><?= $post->titulo ?></h2>
                    <p class="mosaico-texto"><?= $post->ano ?></p>
                    <p class="mosaico-texto"><?= $post->artista ?></p>
                </div>
            </div>

            <!--? a lista de posts pequena -->
            <div class="postsPquenos">
                <?php for($i = 1; $i <= 3; $i++): ?>
                <div class="p1">
                    <div class="im"><img class="i1" src="<?= $publicacoesRecentes[$i]->foto?>"></div>
                    <p class="t1"><?= $publicacoesRecentes[$i]->conceito?></p>
                </div>
                <?php endfor; ?>         
            </div>

        </div>

    </section>

    <?php require "footer.view.php"; ?>

    
</body>

</html>