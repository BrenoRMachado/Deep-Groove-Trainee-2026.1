// *Seleciona ícones das páginas administrativas da sidebar e botão de abrir e fechá-la
const nomeIconesPaginasAdministrativasSidebar = document.querySelectorAll('.sidebar-fechada');
const botaoAbrirFecharSidebar = document.querySelector('.botao-abrir-fechar-sidebar');
let estadoBotaoAbrirFecharSidebar = 'fechado';

// *Evento de abrir e fechar a sidebar ao clicar no botão
botaoAbrirFecharSidebar.addEventListener('click', function(){
    if (estadoBotaoAbrirFecharSidebar === 'fechado'){
        nomeIconesPaginasAdministrativasSidebar.forEach((nomeIconesPaginasAdministrativasSidebar) => {
            nomeIconesPaginasAdministrativasSidebar.classList.remove('sidebar-fechada');
        });
        estadoBotaoAbrirFecharSidebar = 'aberto';

        document.getElementById("icones-admin").style.alignItems="flex-start";
    }
    else if (estadoBotaoAbrirFecharSidebar === 'aberto'){
        nomeIconesPaginasAdministrativasSidebar.forEach((nomeIconesPaginasAdministrativasSidebar) => {
            nomeIconesPaginasAdministrativasSidebar.classList.add('sidebar-fechada');
        });
        estadoBotaoAbrirFecharSidebar = 'fechado';

        document.getElementById("icones-admin").style.alignItems="center";
    }
});