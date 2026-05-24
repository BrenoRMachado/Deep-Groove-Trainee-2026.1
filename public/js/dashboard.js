// *Seleciona os textos das quantidades totais de usuários e de publicações e do botões de navegação para as páginas administrativas 

const textoTotalDeUsuarios = document.querySelector('.texto-dados-usuarios');
const textoTotalDePublicacoes = document.querySelector('.texto-dados-publicacoes');
const textoBotaoIrParaTabelaDeUsuarios = document.querySelector('.botao-navegar-para-tabela-de-usuarios');
const textoBotaoIrParaTabelaDePublicacoes = document.querySelector('.botao-navegar-para-tabela-de-publicacoes');

// *Função que troca os textos da seção do número de usuários e publicações da dashboard

function trocaTextoParaTelasDeTamanhoMenorQue1025px() {
    if (window.matchMedia('(max-width: 769px)').matches) {
        textoTotalDeUsuarios.childNodes[0].nodeValue = 'Usuários: ';
        textoTotalDePublicacoes.childNodes[0].nodeValue = 'Posts: ';
        textoBotaoIrParaTabelaDeUsuarios.innerHTML = 'Ver <i class="icone-navegar bi bi-chevron-right"></i>';
        textoBotaoIrParaTabelaDePublicacoes.innerHTML = 'Ver <i class="icone-navegar bi bi-chevron-right"></i>';
    }
    else if (window.matchMedia('(max-width: 1025px)').matches) {
        textoTotalDeUsuarios.childNodes[0].nodeValue = 'Nº Usuários: ';
        textoTotalDePublicacoes.childNodes[0].nodeValue = 'Nº Publicações: ';
        textoBotaoIrParaTabelaDeUsuarios.innerHTML = 'Conferir <i class="icone-navegar bi bi-chevron-right"></i>';
        textoBotaoIrParaTabelaDePublicacoes.innerHTML = 'Conferir <i class="icone-navegar bi bi-chevron-right"></i>';
    }
    else {
        textoTotalDeUsuarios.childNodes[0].nodeValue = 'Total de Usuários: ';
        textoTotalDePublicacoes.childNodes[0].nodeValue = 'Total de Publicações: ';
        textoBotaoIrParaTabelaDeUsuarios.innerHTML = 'Tabela de Usuários <i class="icone-navegar bi bi-chevron-right"></i>';
        textoBotaoIrParaTabelaDePublicacoes.innerHTML = 'Tabela de Publicações <i class="icone-navegar bi bi-chevron-right"></i>';
    }
}

trocaTextoParaTelasDeTamanhoMenorQue1025px();

window.addEventListener('resize', trocaTextoParaTelasDeTamanhoMenorQue1025px);