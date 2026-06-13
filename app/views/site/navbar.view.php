<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../public/css/navbar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="navbar-desktop">
        <a class="metade-navbar" href="/">
            <img class="logo" src="../../../public/assets/LogoTextoIcone (1).png">
</a>
        <div class="metade-navbar segunda-metade">
            <a href="/posts"><div class="botoes">
                <i class="bi bi-stack fs-3" style="color: white"></i>
                Publicações
            </div></a>
            <div class="botoes container-perfil">
                <a href="login">
                    <i class="bi bi-person-fill fs-4" style="color: white;"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="navbar-mobile">
        <div class="mobile-esquerda">
            <button onclick='toggleSidebar()'>
                <i class="bi bi-list fs-1"></i>
            </button>
        </div>
        <div class="mobile-centro">
            <img class="logo-mobile" src="../../../public/assets/LogoTextoIcone (1).png">
        </div>
        <div class="mobile-direita">
            
        </div>
    </div>
    <div class="sidebar" id="sidebar">
        <div class="container-perfil-mobile"><i class="bi bi-person-fill fs-5" style="color: #bd7746;"></i></div>
        <div class="container-posts-mobile"><i class="bi bi-stack fs-5" style="color: #fbe6b3"></i></div>
    </div>
    <script src="../../../public/js/navbar.js"></script>
</body> 
</html>