const imagem = document.getElementById('imagem-login-cadastro')

document.querySelector('#cadastro-form').addEventListener('submit', async function(event) {
    event.preventDefault();

    const inputEmail = this.querySelector('input[name="email"]');
    inputEmail.setCustomValidity('');

    const formData = new FormData();
    formData.append('email', inputEmail.value);

    const resposta = await fetch('/tabelaUsuarios/verificarEmail', { method: 'POST', body: formData });
    const dados = await resposta.json();

    if (dados.jaExiste) {
        inputEmail.setCustomValidity('Este email já está em uso');
        inputEmail.reportValidity();
    } else {
        this.submit();
    }
});

document.querySelector('#cadastro-form-mobile').addEventListener('submit', async function(event) {
    event.preventDefault();

    const inputEmail = this.querySelector('input[name="email"]');
    inputEmail.setCustomValidity('');

    const formData = new FormData();
    formData.append('email', inputEmail.value);

    const resposta = await fetch('/tabelaUsuarios/verificarEmail', { method: 'POST', body: formData });
    const dados = await resposta.json();

    if (dados.jaExiste) {
        inputEmail.setCustomValidity('Este email já está em uso');
        inputEmail.reportValidity();
    } else {
        this.submit();
    }
});

function moverImagem(){
    imagem.classList.toggle("mover")
}

function mostraElemento(idmostrar, idesconder){
    const elementoAMostrar = document.getElementById(idmostrar)
    const elementoAEsconder = document.getElementById(idesconder)
    elementoAMostrar.style.display = 'flex'
    elementoAEsconder.style.display = 'none'
}

