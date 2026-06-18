const imagem = document.getElementById('imagem-login-cadastro')

function moverImagem(){
    imagem.classList.toggle("mover")
}

function mostraElemento(idmostrar, idesconder){
    const elementoAMostrar = document.getElementById(idmostrar)
    const elementoAEsconder = document.getElementById(idesconder)
    elementoAMostrar.style.display = 'flex'
    elementoAEsconder.style.display = 'none'
}

