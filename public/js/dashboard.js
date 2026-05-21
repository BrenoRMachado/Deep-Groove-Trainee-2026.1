// *Seleciona os textos das quantidades totais de usuários e de publicações e do botões de navegação para as páginas administrativas 

const textoTotalDeUsuarios = document.querySelector('.texto-dados-usuarios');
const textoTotalDePublicacoes = document.querySelector('.texto-dados-publicacoes');
const textoBotaoIrParaTabelaDeUsuarios = document.querySelector('.botao-navegar-para-tabela-de-usuarios');
const textoBotaoIrParaTabelaDePublicacoes = document.querySelector('.botao-navegar-para-tabela-de-publicacoes');

function trocaTextoParaTelasDeTamanhoMenorQue1025px() {
    if (window.matchMedia('(max-width: 769px)').matches) {
        textoTotalDeUsuarios.childNodes[0].nodeValue = 'Usuários: ';
        textoTotalDePublicacoes.childNodes[0].nodeValue = 'Posts: ';
        textoBotaoIrParaTabelaDeUsuarios.textContent = 'Ir';
        textoBotaoIrParaTabelaDePublicacoes.textContent = 'Ir';
    }
    else if (window.matchMedia('(max-width: 1025px)').matches) {
        textoTotalDeUsuarios.childNodes[0].nodeValue = 'Nº Usuários: ';
        textoTotalDePublicacoes.childNodes[0].nodeValue = 'Nº Publicações: ';
        textoBotaoIrParaTabelaDeUsuarios.textContent = 'Conferir';
        textoBotaoIrParaTabelaDePublicacoes.textContent = 'Conferir';
    }
    else {
        textoTotalDeUsuarios.childNodes[0].nodeValue = 'Total de Usuários: ';
        textoTotalDePublicacoes.childNodes[0].nodeValue = 'Total de Publicações: ';
        textoBotaoIrParaTabelaDeUsuarios.textContent = 'Tabela de Usuários';
        textoBotaoIrParaTabelaDePublicacoes.textContent = 'Tabela de Publicações';
    }
}

trocaTextoParaTelasDeTamanhoMenorQue1025px();

window.addEventListener('resize', trocaTextoParaTelasDeTamanhoMenorQue1025px);