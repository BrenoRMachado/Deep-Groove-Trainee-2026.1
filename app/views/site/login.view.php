<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deep Groove - Login</title>
    <link rel="stylesheet" href="../../../public/css/login-e-cadastro.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>
<body>
    <div class="container-login">
        <div class="metade-tela-login formulario">
            <div class="mensagem-erro">
                <?php 
                    // session_start();

                    if(isset($_SESSION['mensagem-erro'])){
                        echo $_SESSION['mensagem-erro'];

                    unset($_SESSION['mensagem-erro']);
                    }
                 ?>
            </div>
            <div class="container-titulo">
                <button class="container-seta" onclick="history.back()">
                    <i class="bi bi-arrow-left-circle-fill seta"></i>
                </button>
                <div>
                     <h1 class="titulo-login">Entrar</h1>           
                </div>
            </div>
            <form class="container-form" action="/login" method="POST">
                <div class="container-inputs"></div>
                    <div class="container-elemento-input">
                        <h2>Email:</h2>
                        <input placeholder="Digite seu email" name="email" id="email">
                    </div>
                    <div class="container-elemento-input">
                        <h2>Senha:</h2>
                        <input placeholder="Digite sua senha" type="password" name="senha" id="senha">
                    </div>
                    <div class="container-botao">
                        <button class="botao-login">Entrar</button>
                        <h3>Não possui uma conta? <button class="texto-sublinhado" type="button" style="color: #F09859; text-decoration: underline;" onclick="moverImagem()">Cadastre-se</button></h3>  
                    </div>
            </form>
            <div class="container-logo">
                <img class="logo-login" src="../../../public/assets/LogoTextoIcone (1).png">
            </div>
        </div>

        <div class="metade-tela-login formulario">
            <div class="container-titulo">
                <button class="container-seta" onclick="history.back()">
                    <i class="bi bi-arrow-left-circle-fill seta"></i>
                </button>
                <div>
                    <h1 class="titulo-login">Cadastrar</h1>
                </div>
            </div>
            <form class="container-form">
                <div class="container-inputs"></div>
                    <div class="container-elemento-input">
                        <h2>Nome:</h2>
                        <input placeholder="Digite seu nome">
                    </div>
                    <div class="container-elemento-input">
                        <h2>Email:</h2>
                        <input placeholder="Digite seu email">
                    </div>
                    <div class="container-elemento-input">
                        <h2>Senha:</h2>
                        <input placeholder="Digite sua senha">
                    </div>
                    <div class="container-botao">
                        <button class="botao-login">Cadastre-se</button>
                        <h3>Já possui uma conta? <button class="texto-sublinhado" type="button" style="color: #F09859; text-decoration: underline;" onclick="moverImagem()">Faça login</button></h3>  
                    </div>
            </form>
            <div class="container-logo">
                <img class="logo-login" src="../../../public/assets/LogoTextoIcone (1).png">
            </div>
        </div>
        <div class="imagem-cadastro" id="imagem-login-cadastro">
        </div>        
    </div>

    <div class="login-mobile" id="login-mobile">
        <button class="container-seta-mobile" onclick="history.back()">
            <i class="bi bi-arrow-left-circle-fill seta" style="color: white"></i>
        </button>
        <div class="imagem-mobile"></div>
        <div class="inputs-mobile">
            <div class="titulo-mobile">
                <h1 class="titulo-login-mobile">Entrar</h1>
            </div>
            <form class="container-form-mobile">
                <div class="container-inputs-mobile">
                    <div class="container-elemento-input-mobile">
                        <h2>Email:</h2>
                        <input placeholder="Digite seu email">
                    </div>
                    <div class="container-elemento-input-mobile">
                        <h2>Senha:</h2>
                        <input placeholder="Digite sua senha">
                    </div>
                    <div class="container-botao-mobile">
                        <button class="botao-login">Entre</button>
                        <h3>Não possui uma conta? <button class="texto-sublinhado" type="button" style="color: #F09859; text-decoration: underline;" onclick="mostraElemento('cadastro-mobile', 'login-mobile')">Cadastre-se</button></h3>            
                    </div>
                </div>
                <img class="logo-login-mobile" src="../../../public/assets/LogoTextoIcone (1).png">
            </form>
        </div>
    </div> 

    <div class="cadastro-mobile" id="cadastro-mobile">
        <button class="container-seta-mobile" onclick="history.back()">
            <i class="bi bi-arrow-left-circle-fill seta" style="color: white"></i>
        </button>
        <div class="imagem-mobile"></div>
        <div class="inputs-mobile">
            <div class="titulo-mobile">
                <h1 class="titulo-login-mobile">Cadastrar</h1>
            </div>
            <form class="container-form-mobile">
                <div class="container-inputs-mobile">
                    <div class="container-elemento-input-mobile">
                        <h2>Nome:</h2>
                        <input placeholder="Digite seu nome">
                    </div>
                    <div class="container-elemento-input-mobile">
                        <h2>Email:</h2>
                        <input placeholder="Digite seu email">
                    </div>
                    <div class="container-elemento-input-mobile">
                        <h2>Senha:</h2>
                        <input placeholder="Digite sua senha">
                    </div>
                    <div class="container-botao-mobile">
                        <button class="botao-login">Cadastre-se</button>
                        <h3>Já possui uma conta? <button class="texto-sublinhado" type="button" style="color: #F09859; text-decoration: underline;" onclick="mostraElemento('login-mobile', 'cadastro-mobile')">Faça login</button></h3>            
                    </div>
                </div>
                <img class="logo-login-mobile" src="../../../public/assets/LogoTextoIcone (1).png">
            </form>
        </div>
    </div>  
    <script src="../../../public/js/login-e-cadastro.js"></script>
</body>
</html>