// ! INÍCIO DO CÓDIGO DO MODAL DE EDIÇÃO DE USUÁRIOS DA TABELA DE USUÁRIOS
// *Seleciona icones de edicao de usuário da tabela de usuários, o modal de edição de usuários e o filtro ao abrir o modal da tabela de usuários

const filtroAoAbrirModalDaTabelaDeUsuarios = document.querySelector('.filtro-ao-abrir-modal-da-tabela-de-usuarios');
const iconesDeEdicaoDeUsuario = document.querySelectorAll('.tabela .bi-pencil-square');
const modalDeEdicaoDeUsuario = document.querySelector('#modal-edicao-usuarios');
let estadoAtualDoModalDeEdicaoDeUsuario = 'fechado';

// *Implementa função que ativa o modal de edição de usuários

iconesDeEdicaoDeUsuario.forEach((iconeDeEdicaoDeUsuario) => {
        iconeDeEdicaoDeUsuario.addEventListener('click', function () {
                modalDeEdicaoDeUsuario.style.display = 'grid';
                filtroAoAbrirModalDaTabelaDeUsuarios.style.display = 'flex';
                estadoAtualDoModalDeEdicaoDeUsuario = 'aberto';
        });
});

// *Seleciona o botão de cancelar do modal de edição de usuários 

const botaoCancelarEdicaoDeUsuario = document.querySelector('#modal-edicao-usuarios .botao-cancelar');

botaoCancelarEdicaoDeUsuario.addEventListener('click', function () {

// *Implementa função que fecha o modal de edição de usuários ao clicar no botão cancelar

        modalDeEdicaoDeUsuario.style.display = 'none';
        filtroAoAbrirModalDaTabelaDeUsuarios.style.display = 'none';
        estadoAtualDoModalDeEdicaoDeUsuario = 'fechado';
});
// ! FIM 

//! jsmodalvisu

function abrirModalVisu(idModalVisu) {
        //let - var q pode mudar dps
        //const - var constante nn muda dps
        const modalvisu = document.querySelector('#modal-visu-user');
        modalvisu.style.display = "flex";

        //o all pega tds q tenham essa classe, se nn tivesse pegaria so no primeiro
        const fundomodal = document.querySelector('.fundoV');
        fundomodal.style.display = "flex"
}

function fecharModalVisu(idModalVisu) {
        //let - var q pode mudar dps
        //const - var constante nn muda dps
        const modalvisu = document.querySelector('#modal-visu-user');
        modalvisu.style.display = "none";

        //o all pega tds q tenham essa classe, se nn tivesse pegaria so no primeiro
        const fundomodal = document.querySelector('.fundoV');
        fundomodal.style.display = "none"
}

//? O FUNDO NN PODE SER A MESMA CLASS PQ O JS PEGA A PRIMEIRA CLASS E SE FOR A MSM SEMPRE ESTARIA PEGANDO O DE VISU E ASSIM NN APARECE O RESTO

//! jsmodalexcluir

function abrirModalExcluir(idModalExcluir) {
        //let - var q pode mudar dps
        //const - var constante nn muda dps
        const modalexcluir = document.querySelector('#modal-excluir-user');
        modalexcluir.style.display = "flex";

        //o all pega tds q tenham essa classe, se nn tivesse pegaria so no primeiro
        const fundomodal = document.querySelector('.fundoE');
        fundomodal.style.display = "flex"
}

function fecharModalExcluir(idModalExcluir) {
        //let - var q pode mudar dps
        //const - var constante nn muda dps
        const modalexcluir = document.querySelector('#modal-excluir-user');
        modalexcluir.style.display = "none";

        //o all pega tds q tenham essa classe, se nn tivesse pegaria so no primeiro
        const fundomodal = document.querySelector('.fundoE');
        fundomodal.style.display = "none"
}