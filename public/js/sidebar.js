// *Seleciona ícones das páginas administrativas da sidebar e botão de abrir e fechá-la
const nomeIconesPaginasAdministrativasSidebar = document.querySelectorAll('.nome-pg-adm');
// const botaoAbrirFecharSidebar = document.querySelector('.botao-abrir-fechar-sidebar');
// const logoSidebar = document.querySelector('.logo-principal-deep-groove');
const intensNavegacao = document.getElementById("icones-admin");
const sidebar = document.getElementById("sidebarjs");

let sidebar = 'fechado';

// *Evento de abrir e fechar a sidebar ao clicar no botão
botaoAbrirFecharSidebar.addEventListener('click', function(){
    if (sidebar === 'fechado'){
        nomeIconesPaginasAdministrativasSidebar.forEach((nomeIconesPaginasAdministrativasSidebar) => {
            nomeIconesPaginasAdministrativasSidebar.classList.remove('nome-pg-adm');
        });
        sidebar = 'aberto';

        // sidebar.style.width = "fit-content";
        // intensNavegacao.style.alignItems = "center";

        // botaoAbrirFecharSidebar.classList.remove('ativo');

    }
    else if (sidebar === 'aberto'){
        nomeIconesPaginasAdministrativasSidebar.forEach((nomeIconesPaginasAdministrativasSidebar) => {
            nomeIconesPaginasAdministrativasSidebar.classList.add('nome-pg-adm');
        });
        sidebar = 'fechado';

        // sidebar.style.width = "fit-content";
        // intensNavegacao.style.alignItems = "center";

        // botaoAbrirFecharSidebar.classList.add('ativo');
    }
});