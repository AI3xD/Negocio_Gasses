$('.boton-eliminar').click(function() {
    var codigoProducto = $(this).data('codigo');
    
    // Alerta de confirmación usando SweetAlert2
    Swal.fire({
        title: '¿Estás seguro?',
        text: "No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Llamada AJAX al servidor para eliminar el producto del carrito
            $.ajax({
                url: 'api/eliminarArticulos.php', // Asegúrate de tener este endpoint
                type: 'POST',
                data: { codigo: codigoProducto },
                success: function(response) {
                    if (response.status === 'success') {
                        // Eliminar visualmente el producto del carrito
                        $('button[data-codigo="' + codigoProducto + '"]').closest('.item-carrito').remove();
                        // Actualizar el total
                        $('.total-precio').text('$' + response.total);
                        Swal.fire({
                            title: 'Eliminado!',
                            text: 'El producto ha sido eliminado del carrito.',
                            icon: 'success',
                            showConfirmButton: false, // No mostrar el botón de confirmación
                            timer: 1500, // Cierra la alerta automáticamente después de 1.5 segundos
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
                        text: 'No se pudo conectar al servidor.',
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