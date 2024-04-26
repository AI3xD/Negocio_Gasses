document.addEventListener('DOMContentLoaded', (event) => {
    

    try {
        document.getElementById('botonInicio').addEventListener('click', function() {
            window.location.href = 'index.html';
        });
    
        document.getElementById('botonCesta').addEventListener('click', function() {
            window.location.href = 'carrito.html';
        });
        document.getElementById('botonInformacion').addEventListener('click', function() {
            window.location.href = 'servicios.html';  
        })
    } catch (error) {
        
    }
});