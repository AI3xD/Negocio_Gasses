$(document).ready(function() {
    $('#finalizarCompra').click(function(event) {
        event.preventDefault();
        
        // Muestra una alerta de SweetAlert2 indicando que la compra se está finalizando
        Swal.fire({
            title: 'Finalizando compra...',
            timer: 1500, // El timer para auto-cerrar la alerta después de 1.5 segundos
            showConfirmButton: false, // No mostrar el botón de confirmación
            showCancelButton: false, // No mostrar el botón de cancelar
            didOpen: () => {
                Swal.showLoading(); // Muestra la animación de carga
            },
            willClose: () => {
            $.ajax({
                url: 'api/ordenes.php', // Asegúrate de cambiar esta URL por la correcta en tu servidor
                type: 'POST',
                data: { /* Aquí puedes agregar datos necesarios como id del producto o cantidad */ },
                dataType: 'json', // Espera una respuesta en formato JSON
                success: function(response) {
                    if(response.status === 'success') {
                        Swal.fire({
                            title: '¡Compra Finalizada!',
                            text: response.message,
                            icon: 'success',
                            showConfirmButton: false, // No mostrar el botón de confirmación
                            timer: 1500, // El timer para auto-cerrar la alerta después de 1.5 segundos
                            timerProgressBar: true // Muestra una barra de progreso que indica el tiempo restante
                        });
                    } else {
                        Swal.fire({
                            title: 'Error',
                            text: response.message,
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 1500,
                            timerProgressBar: true
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        title: 'Error',
                        text: 'Hubo un problema con la petición al servidor.',
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 1500,
                        timerProgressBar: true
                    });
                }
            });
        }
        });
        });
    });