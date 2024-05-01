document.addEventListener('DOMContentLoaded', (event) => {
    

    try {
        document.getElementById('botonInicio').addEventListener('click', function() {
            window.location.href = 'index.php';
        });
    
        document.getElementById('botonCesta').addEventListener('click', function() {
            window.location.href = 'carrito.php';
        });
        document.getElementById('botonInformacion').addEventListener('click', function() {
            window.location.href = 'servicios.php';  
        })
    } catch (error) {
        
    }
});