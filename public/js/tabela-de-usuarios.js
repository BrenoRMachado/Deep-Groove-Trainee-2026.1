// ! INÍCIO DO CÓDIGO DO MODAL DE EDIÇÃO DE USUÁRIOS DA TABELA DE USUÁRIOS
// *Seleciona icones de edicao de usuário da tabela de usuários, o modal de edição de usuários e o filtro ao abrir o modal da tabela de usuários

const filtroAoAbrirModalDaTabelaDeUsuarios = document.querySelector('.filtro-ao-abrir-modal-da-tabela-de-usuarios');
const modalDeEdicaoDeUsuario = document.querySelector('#modal-edicao-usuarios');
let estadoAtualDoModalDeEdicaoDeUsuario = 'fechado';

document.querySelectorAll('.tabela .bi-pencil-square').forEach((icone) => {
    icone.addEventListener('click', function () {
        document.getElementById('id-usuario-edicao').value = this.dataset.id;
        document.querySelector('#modal-edicao-usuarios input[name="nome"]').value = this.dataset.nome;
        document.querySelector('#modal-edicao-usuarios input[name="email"]').value = this.dataset.email;
        modalDeEdicaoDeUsuario.style.display = 'flex';
        filtroAoAbrirModalDaTabelaDeUsuarios.style.display = 'flex';
        estadoAtualDoModalDeEdicaoDeUsuario = 'aberto';
    });
});

// *Seleciona o botão de editar e o input de escolher a foto de perfil do usuário:
const botaoEditaFotoDePerfil = document.querySelector('.botao-alterar-foto-de-perfil');
const inputsEscolherFotoDePerfil = document.querySelectorAll('.foto-de-perfil-escolhida');
const inputEscolherFotoDePerfilDoModalDeEditar = inputsEscolherFotoDePerfil[1];

// *Aciona o input de escolher foto de perfil ao clicar no botão de adicionar foto de perfil do usuário:
botaoEditaFotoDePerfil.addEventListener('click', function() {
        inputEscolherFotoDePerfilDoModalDeEditar.click();
});

// *Seleciona o botão de cancelar e de fechar do modal de edição de usuários 

const botaoCancelarEdicaoDeUsuario = document.querySelector('#modal-edicao-usuarios .botao-cancelar');
const botaoFecharEdicaoDeUsuario = document.querySelector('#modal-edicao-usuarios .botao-fechar-modal');

// *Implementa as funções que fecham o modal de edição de usuários ao clicar no botão cancelar ou no botão de fechar

botaoCancelarEdicaoDeUsuario.addEventListener('click', function () {
        modalDeEdicaoDeUsuario.style.display = 'none';
        filtroAoAbrirModalDaTabelaDeUsuarios.style.display = 'none';
        estadoAtualDoModalDeEdicaoDeUsuario = 'fechado';
});

botaoFecharEdicaoDeUsuario.addEventListener('click', function () {
        modalDeEdicaoDeUsuario.style.display = 'none';
        filtroAoAbrirModalDaTabelaDeUsuarios.style.display = 'none';
        estadoAtualDoModalDeEdicaoDeUsuario = 'fechado';
});

// ! FIM 

//! jsmodal

function abrirModal(idModal, fundo) {
        //let - var q pode mudar dps
        //const - var constante nn muda dps
        const modal = document.querySelector(idModal);
        modal.style.display = "flex";

        //o all pega tds q tenham essa classe, se nn tivesse pegaria so no primeiro
        const fundomodal = document.querySelector(fundo);
        fundomodal.style.display = "flex"
}

function fecharModal(idModal, fundo) {
        //let - var q pode mudar dps
        //const - var constante nn muda dps
        const modal = document.querySelector(idModal);
        modal.style.display = "none";

        //o all pega tds q tenham essa classe, se nn tivesse pegaria so no primeiro
        const fundomodal = document.querySelector(fundo);
        fundomodal.style.display = "none"
}

// CÓDIGO DO MODAL DE ADICIONAR USUÁRIO

// *Seleciona o botão de adicionar a foto de perfil do usuário:
const botaoAdicionaFotoDePerfil = document.querySelector('.botao-lapis-modal-criar');
const inputEscolherFotoDePerfilDoModalDeCriar = inputsEscolherFotoDePerfil[0];

// *Aciona o input de escolher foto de perfil ao clicar no botão de adicionar foto de perfil do usuário:
botaoAdicionaFotoDePerfil.addEventListener('click', function() {
        inputEscolherFotoDePerfilDoModalDeCriar.click();
});

const modalCriar = document.getElementById('modal-criar-usuarios')

function abrirModalCriar(){
        filtroAoAbrirModalDaTabelaDeUsuarios.style.display = "flex"
        modalCriar.style.display = "flex"
}

function fecharModalCriar(){
        filtroAoAbrirModalDaTabelaDeUsuarios.style.display = "none"
        modalCriar.style.display = "none"
}
