// *Seleciona ícones das páginas administrativas da sidebar e botão de abrir e fechá-la
    const hamburger = document.getElementById("btn-hamburger");
    const sidebar = document.getElementById("sidebarjs");

    // Abre o menu 
    hamburger.addEventListener("click", () => {
        sidebar.classList.toggle("active");
    });
