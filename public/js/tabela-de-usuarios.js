//* Todos os campos com 'required' no input exibiram a seguinte mensagem: */
const fundomodal = document.getElementById("fundo");
const inputsObrigatoriosDosModais = document.querySelectorAll('input[required]');

inputsObrigatoriosDosModais.forEach(input => {
        input.addEventListener('invalid', function() {
                if (this.value === ''){
                        this.setCustomValidity('Este campo é obrigatório');
                }
        });
        input.addEventListener('input', function() {
                this.setCustomValidity('');
        });
});

// // ! INÍCIO DO CÓDIGO DO MODAL DE EDIÇÃO DE USUÁRIOS DA TABELA DE USUÁRIOS
// // *Seleciona icones de edicao de usuário da tabela de usuários, o modal de edição de usuários e o filtro ao abrir o modal da tabela de usuários

// const filtroAoAbrirModalDaTabelaDeUsuarios = document.querySelector('.filtro-ao-abrir-modal-da-tabela-de-usuarios');
// let estadoAtualDoModalDeEdicaoDeUsuario = 'fechado';

// // *Função ao abrir modal de edição de usuario 
// function abrirModalDeEdicaoDeUsuario(idModalEdicaoDeUsuario){
//         const modalDeEdicaoDeUsuario = document.querySelector(idModalEdicaoDeUsuario);
//         modalDeEdicaoDeUsuario.style.display = 'flex';
//         filtroAoAbrirModalDaTabelaDeUsuarios.style.display = 'flex';
//         estadoAtualDoModalDeEdicaoDeUsuario = 'aberto';
// }

// // *Aciona o input de escolher foto de perfil ao clicar no botão de adicionar foto de perfil do usuário:
function editarFotoDePerfil (idFotoDePerfilEscolhida) {
        const inputEscolherFotoDePerfilDoModalDeEditar = document.querySelector(idFotoDePerfilEscolhida);
        inputEscolherFotoDePerfilDoModalDeEditar.click();
};

// // *Implementa as funções que fecham o modal de edição de usuários ao clicar no botão cancelar, no botão de fechar e no botão de salvar
 
// function salvarEdicaoDeUsuario() {
//         estadoAtualDoModalDeEdicaoDeUsuario = 'fechado';
// };

// function cancelarEdicaoDeUsuario(idModalEdicaoDeUsuario){
//         const modalDeEdicaoDeUsuario = document.querySelector(idModalEdicaoDeUsuario);
//         modalDeEdicaoDeUsuario.style.display = 'none';
//         filtroAoAbrirModalDaTabelaDeUsuarios.style.display = 'none';
//         estadoAtualDoModalDeEdicaoDeUsuario = 'fechado';
// };

// function fecharEdicaoDeUsuario(idModalEdicaoDeUsuario){
//         const modalDeEdicaoDeUsuario = document.querySelector(idModalEdicaoDeUsuario);
//         modalDeEdicaoDeUsuario.style.display = 'none';
//         filtroAoAbrirModalDaTabelaDeUsuarios.style.display = 'none';
//         estadoAtualDoModalDeEdicaoDeUsuario = 'fechado';
// };

// ! FIM 

//! jsmodal

function fecharFundo (){
        const modais = document.querySelectorAll(".modalfundo");
        modais.forEach(modal => {
                 modal.style.display = "none";
        });
        fundomodal.style.display = "none";
}

function abrirModal(idModal) {
        //let - var q pode mudar dps
        //const - var constante nn muda dps
        const modal = document.querySelector(idModal);
        modal.style.display = "flex";

        //o all pega tds q tenham essa classe, se nn tivesse pegaria so no primeiro
        fundomodal.style.display = "flex";
}

function fecharModal(idModal) {
        //let - var q pode mudar dps
        //const - var constante nn muda dps
        const modal = document.querySelector(idModal);
        modal.style.display = "none";

        //o all pega tds q tenham essa classe, se nn tivesse pegaria so no primeiro
        fundomodal.style.display = "none";
}

// *CÓDIGO DO MODAL DE ADICIONAR USUÁRIO

// *Seleciona o input de adicionar a foto de perfil do usuário:
const inputEscolherFotoDePerfilDoModalDeCriar = document.querySelector('#modal-criar-usuarios .foto-de-perfil-escolhida');

// *Aciona o input de escolher foto de perfil ao clicar no botão de adicionar foto de perfil do usuário:
function adicionarFotoDePerfil() {
        inputEscolherFotoDePerfilDoModalDeCriar.click();
};

// const modalCriar = document.getElementById("modal-criar-usuarios")

// function abrirModalCriar(){
//         filtroAoAbrirModalDaTabelaDeUsuarios.style.display = "flex"
//         modalCriar.style.display = "flex"
// }

// function fecharModalCriar(){
//         filtroAoAbrirModalDaTabelaDeUsuarios.style.display = "none"
//         modalCriar.style.display = "none"
// }
