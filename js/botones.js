document.addEventListener('DOMContentLoaded', (event) => {
    document.getElementById('botonInicio').addEventListener('click', function() {
        window.location.href = 'index.html';
    });

    document.getElementById('botonCesta').addEventListener('click', function() {
        window.location.href = 'tu_url_de_cesta.html';
    });
});