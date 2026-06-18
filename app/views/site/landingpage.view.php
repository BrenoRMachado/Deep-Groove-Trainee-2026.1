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

                <p class="texto_hs">Mergulhar na essência da música e tornar-se o santuário digital respeitando acultura e identidade artística.</p>

                <a class="botão" href="/instrucoes">Informações de compra</a>
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
            <img class="titulo_carroussel_img" src="../../../public/assets/soudwaves.png">
            <h1 class="titulo_carroussel">MAIS VENDIDOS</h1>
            <img class="titulo_carroussel_img" src="../../../public/assets/soudwaves.png">
        </div>
        <!--! contem as imagems, setas e bolinhas do carroussel  -->
        <div class="slider">

            <!--! seta esquerda -->
            <div class="nav-arrow seta_esquerda" id="seta_esquerda">&#10094</div>

            <!--! imagens que vão estar passando no carroussel -->
            <div class="slider-conteudo">
                <div class="slider-item"><img src="../../../public/assets/1989 (Taylors Version).jpg"></div>
                <div class="slider-item"><img src="../../../public/assets/HIT ME HARD AND SOFT- billy.jpg"></div>
                <div class="slider-item"><img src="../../../public/assets/Short n Sweet-sabrina.jpg"></div>
                <div class="slider-item"><img
                        src="../../../public/assets/Taylor-Swift-The-Tortured-Poets-Department-2.jpg"></div>
                <div class="slider-item"><img
                        src="../../../public/assets/The Rise and Fall of a Midwest Princess-chappel.jpg"></div>
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
            <img class="titulo_mosaico_img" src="../../../public/assets/soudwaves.png">
            <h1 class="titulo-mosaico">ÚLTIMOS PUBLICADOS</h1>
            <img class="titulo_mosaico_img" src="../../../public/assets/soudwaves.png">
        </div>

        <!--? contem os posts -->
        <div class="elementos-post">

            <!--? o poste quadrado grandão -->
            <div class="postGrande"><img src="../../../public/assets/routezero-the ora-xikers.jpg"></div>

            <!--? a lista de posts pequena -->
            <div class="postsPquenos">

                <div class="p1">
                    <img class="i1" src="../../../public/assets/IOI- Loop.jpg">
                    <p class="t1">It is a long established fact that a reader when looking at its layout.</p>
                </div>

                <div class="p2">
                    <img class="i2" src="../../../public/assets/Wyld.jpg">
                    <p class="t2">It is a long established fact that a reader when looking at its layout.</p>
                </div>

                <div class="p3">
                    <img class="i3" src="../../../public/assets/Gongbu.jpg">
                    <p class="t3">It is a long established fact that a reader when looking at its layout.</p>
                </div>

            </div>

        </div>

    </section>

    <?php require "footerLanding.view.php"; ?>

</body>

</html>