// *Seleciona icones de edicao de usuário da tabela de usuários, o modal de edição de usuários e o filtro ao abrir o modal da tabela de usuários
const filtroAoAbrirModalDaTabelaDeUsuarios = document.querySelector('.filtro-ao-abrir-modal-da-tabela-de-usuarios');
const iconesDeEdicaoDeUsuario = document.querySelectorAll('.tabela .bi-pencil-square');
const modalDeEdicaoDeUsuario = document.querySelector('#modal-edicao-usuarios');
let estadoAtualDoModalDeEdicaoDeUsuario = 'fechado';

// *Implementa função que ativa o modal de edição de usuários
iconesDeEdicaoDeUsuario.forEach((iconeDeEdicaoDeUsuario) => {
    iconeDeEdicaoDeUsuario.addEventListener('click', function() {
        if (estadoAtualDoModalDeEdicaoDeUsuario === 'fechado'){
            modalDeEdicaoDeUsuario.style.display = 'grid';
            filtroAoAbrirModalDaTabelaDeUsuarios.style.display = 'flex';
            estadoAtualDoModalDeEdicaoDeUsuario = 'aberto';
        }
    });
});

// *Seleciona o botão de cancelar do modal de edição de usuários 
const botaoCancelarEdicaoDeUsuario = document.querySelector('#modal-edicao-usuarios .botao-cancelar');

botaoCancelarEdicaoDeUsuario.addEventListener('click', function(){
    if (estadoAtualDoModalDeEdicaoDeUsuario === 'aberto'){
        modalDeEdicaoDeUsuario.style.display = 'none';
        filtroAoAbrirModalDaTabelaDeUsuarios.style.display = 'none';
        estadoAtualDoModalDeEdicaoDeUsuario = 'fechado';
    }
});
// *Implementa função que fecha o modal de edição de usuários ao clicar no botão cancelar