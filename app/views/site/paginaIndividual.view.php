<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/paginaIndividual.css">
    <title>Álbum</title>

    <!-- fontes google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&display=swap"
        rel="stylesheet">

</head>

<body class="postindividual">
    <?php require "navbar.view.php"; ?>
    <main id="tudo-d">

            <a id="capa-d" href="/paginaIndividual?id=<?= $post->id ?>">
                
                    <div class="album-d">

                            <img class="capa-album-d" src="<?= $post->foto?>" alt="album">
                   

                        <img class="disco-d" src="../../../public/assets/disco.png" alt="Disco">

                    </div>

                    <div class="conteudo-capa">
                        <h1 class="nome-album"><?= $post->titulo?></h1>

                        <div class="nota-d">
                            <img src="../../../public/assets/img/Vector.svg" alt="Estrela" class="vetor-nota-d">
                            <div class="textinhos nota">3/5</div>
                        </div>

                        <div class="coisas-sobre-d">
                            <h3 class="h3-pagPost-d">ARTISTA</h3>
                            <p class="textinhos"><?= $post->artista?></p>
                        </div>

                        <div class="dados-capa-d">
                            <div class="coisas-sobre-d">
                                <h3 class="h3-pagPost-d">ANO</h3>
                                <p class="textinhos"><?= $post->ano?></p>
                            </div>

                            <div class="coisas-sobre-d">
                                <h3 class="h3-pagPost-d">GÊNERO</h3>
                                <p class="textinhos"><?= $post->genero?></p>
                            </div>

                            <div class="coisas-sobre-d">
                                <h3 class="h3-pagPost-d">DURAÇÃO</h3>
                                <p class="textinhos">
                                    <?php 
                                        $minutos = floor($post -> duracao / 60);
                                        $segundos = $post -> duracao % 60;
                                        echo $minutos . ':' . str_pad($segundos, 2, '0', STR_PAD_LEFT);
                                    ?>
                                </p>
                            </div>
                        </div>

                        <div class="containerEstrelas">
                            <img class="estrela" src="../../../public/assets/img/estrela.svg" alt="estrela">
                            <img class="estrela" src="../../../public/assets/img/estrela.svg" alt="estrela">
                            <img class="estrela" src="../../../public/assets/img/estrela.svg" alt="estrela">
                            <img class="estrela" src="../../../public/assets/img/estrela.svg" alt="estrela">
                            <img class="estrela" src="../../../public/assets/img/estrela.svg" alt="estrela">
                        </div>
                    </div>

            </a>

            <div class="linha-princ"></div>

            <section id="sobre-d">

                <div class="conceito">
                    <h2 class="h2-sobre-d">CONCEITO</h2>
                    <p class="textinhos-sobre"><?= $post->conceito?></p>
                </div>
            </section>



            <section id="faixas-d">
                <h2 id="titulo-faixas-d">FAIXAS</h2>

                <div class="agrupamento-faixas-d">

                    <div class="conteudo-faixas-d">

                       <?php foreach($faixas as $faixa) :?>

                         <div class="musica-d">

                            <div class="dados-faixa-d">
                                <i alt="play" id="playPause<?= $faixa -> id ?>" class="play bi bi-play-circle-fill" onclick="playPreview(<?= $faixa -> id ?>)"></i>
                                <img src="../../../public/assets/img/Capa.svg" alt="faixa" class="faixa">
                                <div class="nome-tempo">
                                    <h4 class="nome-faixa-d"><?= $faixa -> titulo ?></h4>
                                    <p class="textinhos">
                                        <?php 
                                            $minutos = floor($faixa -> duracao / 60);
                                            $segundos = $faixa -> duracao % 60;
                                            echo $minutos . ':' . str_pad($segundos, 2, '0', STR_PAD_LEFT);
                                        ?>
                                    </p>
                                </div>
                                
                            </div>
                        
                        </div>
                        
                        <?php endforeach; ?>


                    </div>
                    
                        <div class="linha-d"></div>

                 
                </div>

                </div>

            </section>


    </main>
    <?php require "footer.view.php"; ?>
</body>
<script src="../../../public/js/paginaIndividual.js"></script>

</html>