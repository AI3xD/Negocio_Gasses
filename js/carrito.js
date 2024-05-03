$(document).ready(function() {
  $('#btnAgregarCarrito').click(function(event) {
      event.preventDefault();
      var codigoProducto = $(this).data('codigo');
      
      // Iniciar la animación de carga
      Swal.fire({
          title: 'Agregando al carrito...',
          timer: 1500, // El timer para auto-cerrar la alerta después de 1.5 segundos
          showConfirmButton: false, // No mostrar el botón de confirmación
          showCancelButton: false, // No mostrar el botón de cancelar
          didOpen: () => {
              Swal.showLoading();
          },
          willClose: () => {
              // Acciones a realizar cuando la alerta se cierra automáticamente
          }
      });
      

      // Llamada AJAX al servidor para agregar al carrito
      $.ajax({
        url: 'api/agregar_carrito.php',
        type: 'POST',
        data: { codigo: codigoProducto },
        dataType: 'json', // Espera una respuesta en formato JSON
        success: function(response) {
            if(response.status === 'success') {
                // Actualiza el carrito
                agregarProductoAlCarrito(codigoProducto);
                // Actualiza la interfaz del usuario
                // ...
                Swal.fire({
                    title: '¡Agregado!',
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
    
    // Cargar carrito de localStorage cuando la página se carga
    cargarCarrito();
    });
// Objeto carrito
let carrito = {
  total: 0,
  productos: [],
  
  agregarProducto: function (producto) {
      this.productos.push(producto);
      this.actualizarTotal();
  },
  actualizarTotal: function() {
      this.total = this.productos.reduce((sum, producto) => sum + parseFloat(producto.precio_venta), 0);
  }
};

function agregarProductoAlCarrito(codigoProducto) {
  // Aquí puedes hacer una llamada a la API para obtener los detalles del producto
  // basándote en el codigoProducto o si ya tienes los datos del producto, los puedes añadir directamente
  // Por ejemplo:
  getProductoPorCodigo(codigoProducto).then(function(producto) {
      carrito.agregarProducto(producto);
      guardarCarrito();
      // Actualiza la interfaz del carrito aquí si es necesario
  }).catch(function(error) {
      console.error('Error al obtener los detalles del producto:', error);
  });
}

async function getProductoPorCodigo(codigoProducto) {
  const url = `http://localhost/API/getProductoId.php?codigo=${codigoProducto}`;
  try {
    const respuesta = await fetch(url);
    const contentType = respuesta.headers.get('content-type');
    
    if (!respuesta.ok) {
      throw new Error('Error al obtener el producto: ' + respuesta.status);
    }

    if (contentType && contentType.includes('application/json')) {
      return await respuesta.json();
    } else {
      throw new Error('La respuesta no es JSON: ' + contentType);
    }
  } catch (error) {
    console.error('Error durante la solicitud fetch:', error.message);
    throw error; // Re-throw the error for further handling if necessary
  }
}

function guardarCarrito() {
  const carritoJSON = JSON.stringify(carrito);
  localStorage.setItem("carrito", carritoJSON);
}

function cargarCarrito() {
  const carritoGuardado = localStorage.getItem("carrito");
  if (carritoGuardado) {
      carrito = JSON.parse(carritoGuardado);
  } else {
      console.log("No hay carrito guardado");
  }
  
}

})
