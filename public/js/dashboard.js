// *Seleciona os textos das quantidades totais de usuários e de publicações e do botões de navegação para as páginas administrativas 

const textoTotalDeUsuarios = document.querySelector('.texto-dados-usuarios');
const textoTotalDePublicacoes = document.querySelector('.texto-dados-publicacoes');
const textoBotaoIrParaTabelaDeUsuarios = document.querySelector('.botao-navegar-para-tabela-de-usuarios');
const textoBotaoIrParaTabelaDePublicacoes = document.querySelector('.botao-navegar-para-tabela-de-publicacoes');

// *Função que troca os textos da seção do número de usuários e publicações da dashboard

function trocaTextoParaTelasDeTamanhoMenorQue1025px() {
    if (window.matchMedia('(max-width: 530px)').matches) {
        textoTotalDeUsuarios.childNodes[0].nodeValue = 'Usuários: ';
        textoTotalDePublicacoes.childNodes[0].nodeValue = 'Publicações: ';
        textoBotaoIrParaTabelaDeUsuarios.innerHTML = 'Ver <i class="icone-navegar bi bi-chevron-right"></i>';
        textoBotaoIrParaTabelaDePublicacoes.innerHTML = 'Ver <i class="icone-navegar bi bi-chevron-right"></i>';
    }
    else {
        textoTotalDeUsuarios.childNodes[0].nodeValue = 'Total de Usuários: ';
        textoTotalDePublicacoes.childNodes[0].nodeValue = 'Total de Posts: ';
        textoBotaoIrParaTabelaDeUsuarios.innerHTML = 'Tabela de Usuários <i class="icone-navegar bi bi-chevron-right"></i>';
        textoBotaoIrParaTabelaDePublicacoes.innerHTML = 'Tabela de Publicações <i class="icone-navegar bi bi-chevron-right"></i>';
    }
}

trocaTextoParaTelasDeTamanhoMenorQue1025px();

window.addEventListener('resize', trocaTextoParaTelasDeTamanhoMenorQue1025px);

// *Seleciona as atividades recentes, linha de divisão e os botões de ver mais e ver menos 
const botaoDeVerMaisAtividadesRecentes = document.querySelector(".botao-ver-mais-atividades-recentes");
const segundaAtividadeMaisRecente = document.querySelector(".informacao-atividades-recentes-2");
const segundaLinhaDividindoAtividadesRecentes = document.querySelector(".linha-dividindo-atividades-recentes-2");
const terceiraAtividadeMaisRecentes = document.querySelector(".informacao-atividades-recentes-3");
const terceiraLinhaDividindoAtividadesRecentes = document.querySelector(".linha-dividindo-atividades-recentes-3");
const botaoVerMenosAtividadesRecentes = document.querySelector(".botao-ver-menos-atividades-recentes");

// *Função que mostra mais atividades recentes ao clicar no botão
function verMaisAtividadesRecentes(){
    botaoDeVerMaisAtividadesRecentes.style.display = 'none';
    segundaAtividadeMaisRecente.style.display = 'flex';
    segundaLinhaDividindoAtividadesRecentes.style.display = 'flex';
    terceiraAtividadeMaisRecentes.style.display = 'flex';
    terceiraLinhaDividindoAtividadesRecentes.style.display = 'flex';
    botaoVerMenosAtividadesRecentes.style.display = 'flex';
}

function verMenosAtividadesRecentes() {
    botaoDeVerMaisAtividadesRecentes.style.display = 'flex';
    segundaAtividadeMaisRecente.style.display = 'none';
    segundaLinhaDividindoAtividadesRecentes.style.display = 'none';
    terceiraAtividadeMaisRecentes.style.display = 'none';
    terceiraLinhaDividindoAtividadesRecentes.style.display = 'none';
    botaoVerMenosAtividadesRecentes.style.display = 'none';
}

// *Seleciona as atividades recentes, linha de divisão e os botões de ver mais e ver menos 
const botaoDeVerMaisPublicacoesRecentes = document.querySelector(".botao-ver-mais-publicacoes-recentes");
const segundaPublicacaoMaisRecente = document.querySelector(".informacao-publicacoes-recentes-2");
const segundaLinhaDividindoPublicacoesRecentes = document.querySelector(".linha-dividindo-publicacoes-recentes-2");
const terceiraPublicacoesMaisRecentes = document.querySelector(".informacao-publicacoes-recentes-3");
const terceiraLinhaDividindoPublicacoesRecentes = document.querySelector(".linha-dividindo-publicacoes-recentes-3");
const botaoVerMenosPublicacoesRecentes = document.querySelector(".botao-ver-menos-publicacoes-recentes");

// *Função que mostra mais atividades recentes ao clicar no botão
function verMaisPublicacoesRecentes(){
    botaoDeVerMaisPublicacoesRecentes.style.display = 'none';
    segundaPublicacaoMaisRecente.style.display = 'flex';
    segundaLinhaDividindoPublicacoesRecentes.style.display = 'flex';
    terceiraPublicacoesMaisRecentes.style.display = 'flex';
    terceiraLinhaDividindoPublicacoesRecentes.style.display = 'flex';
    botaoVerMenosPublicacoesRecentes.style.display = 'flex';
}

function verMenosPublicacoesRecentes() {
    botaoDeVerMaisPublicacoesRecentes.style.display = 'flex';
    segundaPublicacaoMaisRecente.style.display = 'none';
    segundaLinhaDividindoPublicacoesRecentes.style.display = 'none';
    terceiraPublicacoesMaisRecentes.style.display = 'none';
    terceiraLinhaDividindoPublicacoesRecentes.style.display = 'none';
    botaoVerMenosPublicacoesRecentes.style.display = 'none';
}