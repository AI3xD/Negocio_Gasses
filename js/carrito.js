let carrito = {
  total: 0,
  productos: [],
  agregarProducto: function (id) {
    this.productos.push(id);
  },
};
document.addEventListener("DOMContentLoaded", function () {
    cargarCarrito();
})

async function agregarAlCarrito(productoId) {
  // Aqui iría el código para agregar el producto al Carrito
  carrito.agregarProducto(productoId);
  const producto=await getProductoId(productoId);
  carrito.total += parseFloat(producto[0].precio_venta);
  guardarCarrito();

}
async function getProductoId(productoId) {
  const url = `http://localhost/API/getProductoId.php?productoId=${productoId}`;
  const resultado = await fetch(url);
  return await resultado.json();
}
function guardarCarrito() {
    // Convertir el carrito a formato JSON
    const carritoJSON = JSON.stringify(carrito);
    // Guardar en localStorage
    localStorage.setItem("carrito", carritoJSON);
  }
  function cargarCarrito() {
    const carritoGuardado = localStorage.getItem("carrito");
  
    if (carritoGuardado) {
      // Convertir el carrito guardado desde JSON a objeto JavaScript
      const datosCarrito = JSON.parse(carritoGuardado);
  
      // Asignar valores al objeto carrito
      carrito.total = datosCarrito.total;
      carrito.productos = datosCarrito.productos;
    } else {
      console.log("No hay carrito guardado");
    }
  }