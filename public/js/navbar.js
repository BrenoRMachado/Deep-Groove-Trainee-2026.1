const sidebar = document.getElementById('sidebar')

function toggleSidebar() {
    if (sidebar.style.display === 'flex') {
        sidebar.style.display = 'none'
    } else {
        sidebar.style.display = 'flex'
    }
}