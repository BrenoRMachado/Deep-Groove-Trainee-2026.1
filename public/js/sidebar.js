// *Seleciona ícones das páginas administrativas da sidebar e botão de abrir e fechá-la
const nomeIconesPaginasAdministrativasSidebar = document.querySelectorAll('.sidebar-fechada');
const botaoAbrirFecharSidebar = document.querySelector('.botao-abrir-fechar-sidebar');
const logoSidebar = document.querySelector('.logo-principal-deep-groove');
const intensNavegacao = document.getElementById("icones-admin");
const sidebar = document.getElementById("sidebar");

let estadoBotaoAbrirFecharSidebar = 'fechado';

// *Evento de abrir e fechar a sidebar ao clicar no botão
botaoAbrirFecharSidebar.addEventListener('click', function(){
    if (estadoBotaoAbrirFecharSidebar === 'fechado'){
        nomeIconesPaginasAdministrativasSidebar.forEach((nomeIconesPaginasAdministrativasSidebar) => {
            nomeIconesPaginasAdministrativasSidebar.classList.remove('sidebar-fechada');
        });
        estadoBotaoAbrirFecharSidebar = 'aberto';

        sidebar.style.width = "fit-content";
        intensNavegacao.style.alignItems = "center";
        logoSidebar.src = "../../../public/assets/LogoTextoIcone2.png";

        botaoAbrirFecharSidebar.classList.remove('ativo');

    }
    else if (estadoBotaoAbrirFecharSidebar === 'aberto'){
        nomeIconesPaginasAdministrativasSidebar.forEach((nomeIconesPaginasAdministrativasSidebar) => {
            nomeIconesPaginasAdministrativasSidebar.classList.add('sidebar-fechada');
        });
        estadoBotaoAbrirFecharSidebar = 'fechado';

        sidebar.style.width = "fit-content";
        intensNavegacao.style.alignItems = "center";
        logoSidebar.src = "/public/assets/LogoIcone2.png";

        botaoAbrirFecharSidebar.classList.add('ativo');
    }
});