//! jsmodaledit
// *Seleciona icones de edicao de usuário da tabela de usuários, o modal de edição de usuários e o filtro ao abrir o modal da tabela de usuários
const filtroAoAbrirModalDaTabelaDeUsuarios = document.querySelector('.filtro-ao-abrir-modal-da-tabela-de-usuarios');
const iconesDeEdicaoDeUsuario = document.querySelectorAll('.tabela .bi-pencil-square');
const modalDeEdicaoDeUsuario = document.querySelector('#modal-edicao-usuarios');
let estadoAtualDoModalDeEdicaoDeUsuario = 'fechado';

// *Implementa função que ativa o modal de edição de usuários
iconesDeEdicaoDeUsuario.forEach((iconeDeEdicaoDeUsuario) => {
    iconeDeEdicaoDeUsuario.addEventListener('click', function() {
            modalDeEdicaoDeUsuario.style.display = 'grid';
            filtroAoAbrirModalDaTabelaDeUsuarios.style.display = 'flex';
            estadoAtualDoModalDeEdicaoDeUsuario = 'aberto';
    });
});

// *Seleciona o botão de cancelar do modal de edição de usuários 
const botaoCancelarEdicaoDeUsuario = document.querySelector('#modal-edicao-usuarios .botao-cancelar');

botaoCancelarEdicaoDeUsuario.addEventListener('click', function(){
        modalDeEdicaoDeUsuario.style.display = 'none';
        filtroAoAbrirModalDaTabelaDeUsuarios.style.display = 'none';
        estadoAtualDoModalDeEdicaoDeUsuario = 'fechado';
});
// *Implementa função que fecha o modal de edição de usuários ao clicar no botão cancelar

//! jsmodalvisu

function abrirModalVisu(idModalVisu) {
        //let - var q pode mudar dps
        //const - var constante nn muda dps
        const modalvisu = document.querySelector('#modal-visu-user');
        modalvisu.style.display = "flex"; 
        
         //o all pega tds q tenham essa classe, se nn tivesse pegaria so no primeiro
        const fundomodal = document.querySelector('.fundo');
        fundomodal.style.display = "flex"
}

function fecharModalVisu(idModalVisu) {
        //let - var q pode mudar dps
        //const - var constante nn muda dps
        const modalvisu = document.querySelector('#modal-visu-user');
        modalvisu.style.display = "none";  
        
        //o all pega tds q tenham essa classe, se nn tivesse pegaria so no primeiro
        const fundomodal = document.querySelector('.fundo');
        fundomodal.style.display = "none"
}