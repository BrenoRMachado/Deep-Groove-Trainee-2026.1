// // ! INÍCIO DO CÓDIGO DO MODAL DE EDIÇÃO DE USUÁRIOS DA TABELA DE USUÁRIOS
// // *Seleciona icones de edicao de posts da tabela de posts, o modal de edição de usuários e o filtro ao abrir o modal da tabela de posts

const filtroAoAbrirModalDaTabelaDePosts = document.querySelector('.filtro-ao-abrir-modal-da-tabelaPosts');
// const iconesDeEdicaoDePost = document.querySelectorAll('.tabela .bi-pencil-square');
// const modalDeEdicaoDePosts = document.querySelector('#modal-edicao-posts');
// let estadoAtualDoModalDeEdicaoDePosts = 'fechado';

// // *Implementa função que ativa o modal de edição de posts

// iconesDeEdicaoDePost.forEach((iconeDeEdicaoDePost) => {
//         iconeDeEdicaoDePost.addEventListener('click', function () {
//                 modalDeEdicaoDePosts.style.display = 'flex';
//                 filtroAoAbrirModalDaTabelaDePosts.style.display = 'flex';
//                 estadoAtualDoModalDeEdicaoDePosts = 'aberto';
//         });
// });

// // *Seleciona o botão de cancelar do modal de edição de posts

// const botaoCancelarEdicaoDePosts = document.querySelector('#modal-edicao-posts .botao-cancelar');
// const botaoFecharEdicaoDePosts = document.querySelector('#modal-edicao-posts .botao-fechar-modal');

// // *Implementa função que fecha o modal de edição de posts ao clicar no botão cancelar

// botaoCancelarEdicaoDePosts.addEventListener('click', function () {
//         modalDeEdicaoDePosts.style.display = 'none';
//         filtroAoAbrirModalDaTabelaDePosts.style.display = 'none';
//         estadoAtualDoModalDeEdicaoDePosts = 'fechado';
// });

// botaoFecharEdicaoDePosts.addEventListener('click', function () {
//         modalDeEdicaoDePosts.style.display = 'none';
//         filtroAoAbrirModalDaTabelaDePosts.style.display = 'none';
//         estadoAtualDoModalDeEdicaoDePosts = 'fechado';
// });

// // ! FIM 

// //! jsmodalvisu

// function abrirModalVisu(idModalVisu) {
//         //let - var q pode mudar dps
//         //const - var constante nn muda dps
//         const modalvisu = document.querySelector('#modal-visu-user');
//         modalvisu.style.display = "flex";

//         //o all pega tds q tenham essa classe, se nn tivesse pegaria so no primeiro
//         const fundomodal = document.querySelector('.fundoV');
//         fundomodal.style.display = "flex"
// }

// function fecharModalVisu(idModalVisu) {
//         //let - var q pode mudar dps
//         //const - var constante nn muda dps
//         const modalvisu = document.querySelector('#modal-visu-user');
//         modalvisu.style.display = "none";

//         //o all pega tds q tenham essa classe, se nn tivesse pegaria so no primeiro
//         const fundomodal = document.querySelector('.fundoV');
//         fundomodal.style.display = "none"
// }

// //? O FUNDO NN PODE SER A MESMA CLASS PQ O JS PEGA A PRIMEIRA CLASS E SE FOR A MSM SEMPRE ESTARIA PEGANDO O DE VISU E ASSIM NN APARECE O RESTO

// //! jsmodalexcluir

// function abrirModalExcluir(idModalExcluir) {
//         //let - var q pode mudar dps
//         //const - var constante nn muda dps
//         const modalexcluir = document.querySelector('#modal-excluir-user');
//         modalexcluir.style.display = "flex";

//         //o all pega tds q tenham essa classe, se nn tivesse pegaria so no primeiro
//         const fundomodal = document.querySelector('.fundoE');
//         fundomodal.style.display = "flex"
// }

// function fecharModalExcluir(idModalExcluir) {
//         //let - var q pode mudar dps
//         //const - var constante nn muda dps
//         const modalexcluir = document.querySelector('#modal-excluir-user');
//         modalexcluir.style.display = "none";

//         //o all pega tds q tenham essa classe, se nn tivesse pegaria so no primeiro
//         const fundomodal = document.querySelector('.fundoE');
//         fundomodal.style.display = "none"
// }

// // Código do modal de criar posts

// const modalCriar = document.getElementById('modal-criar-posts')

// function abrirModalCriar(){
//         filtroAoAbrirModalDaTabelaDePosts.style.display = "flex"
//         modalCriar.style.display = "flex"
// }

// function fecharModalCriar(){
//         filtroAoAbrirModalDaTabelaDePosts.style.display = "none"
//         modalCriar.style.display = "none"     
// }

// Funções de abrir e fechar modal simplificadas

function abrirModal(id){
        const modal = document.getElementById(id)
        filtroAoAbrirModalDaTabelaDePosts.style.display = "flex"
        modal.style.display = "flex"
}
function fecharModal(id){
        filtroAoAbrirModalDaTabelaDePosts.style.display = "none"
        const modal = document.getElementById(id)
        modal.style.display = "none"
}