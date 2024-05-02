
document.getElementById('finalizarCompra').addEventListener('click', function() {
    Swal.fire({
        title: 'Finalizando compra...',
        timer: 1500, // El timer para auto-cerrar la alerta después de 1.5 segundos
        showConfirmButton: false, // No mostrar el botón de confirmación
        showCancelButton: false, // No mostrar el botón de cancelar
        didOpen: () => {
            Swal.showLoading();
        },
        willClose: () => {
            // Llamada AJAX al servidor para finalizar la compra
            $.ajax({
                url: 'api/ordenes.php', // Asegúrate de cambiar esta URL por la correcta en tu servidor
                type: 'POST',
                data: { /* Aquí puedes agregar datos necesarios como id del producto o cantidad */ },
                dataType: 'json', // Espera una respuesta en formato JSON
                success: function(response) {
                    if(response.status === 'success') {
                        Swal.fire('¡Compra Finalizada!', response.message, 'success');
                    } else {
                        Swal.fire('Error', response.message, 'error');
                    }
                },
                error: function() {
                    Swal.fire('Error', 'Hubo un problema con la petición al servidor.', 'error');
                }
            });
        }
    });
});
