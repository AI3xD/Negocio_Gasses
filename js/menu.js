document.addEventListener('DOMContentLoaded', (event) => {
    const menuBtn = document.querySelector('.menu-btn'); // Selector del botón del menú
    const nav = document.querySelector('nav'); // Selector de la barra de navegación

    menuBtn.addEventListener('click', () => {
        nav.classList.toggle('active'); // Alterna la clase 'active' en <nav>
    });
});