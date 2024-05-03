<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
      rel="stylesheet"
    />
  <title>Document</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
  <header>
    <div class="nav-catalogo">

      <div class="logo">
        <a class="logo-selector" href="index.html">
          <img class="logo2" src="img/logoLinde.png" alt="" />
        </a>
      </div>
      <nav class="catalogo-nav">
        <button id="botonInicio">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home-2" width="44" height="44"
            viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round"
            stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
            <path d="M10 12h4v4h-4z" />
          </svg>
        </button>
        <button id="botonCesta">
          <svg class="active-carrito" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-basket"
            width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none"
            stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M10 14a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
            <path
              d="M5.001 8h13.999a2 2 0 0 1 1.977 2.304l-1.255 7.152a3 3 0 0 1 -2.966 2.544h-9.512a3 3 0 0 1 -2.965 -2.544l-1.255 -7.152a2 2 0 0 1 1.977 -2.304z" />
            <path d="M17 10l-2 -6" />
            <path d="M7 10l2 -6" />
          </svg>
        </button>
        <a href="">Ver más</a>
        <a href="gases.php">Gases</a>
        <a href="soldadura.php">Soldaduras</a>
        <a href="Seguridad.php">Equipos de seguridad</a>
        <a class="" href="catalogo.php">Equipos</a>
      </nav>
    </div>
  </header>

  <div class="contenedor carrito">
        <h2 class="titulo__carrito">Carrito</h2>

        <?php
        if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) {
            $total = 0;
            foreach ($_SESSION['carrito'] as $item) {
                // Asegúrate de que 'cantidad' y 'precio_venta' están establecidos en el array del producto.
                $cantidad = isset($item['cantidad']) ? $item['cantidad'] : 1; // Si no está establecido, por defecto es 1
                $total += $item['precio_venta'] * $cantidad; // Multiplica por cantidad para obtener el total

                echo '<div class="item-carrito">
                        <input type="checkbox" id="checkbox-producto' . htmlspecialchars($item['codigo']) . '" class="checkbox-producto" name="producto_seleccionado" value="' . htmlspecialchars($item['codigo']) . '">
                        <label for="producto' . htmlspecialchars($item['codigo']) . '" class="label-checkbox-producto"></label>
                        <img src="img/' . htmlspecialchars($item['imagen_producto']) . '" alt="' . htmlspecialchars($item['nombre']) . '" class="imagen-producto-carrito">
                        <div class="detalle-item-carrito">
                            <h3 class="nombre-item-carrito">' . htmlspecialchars($item['nombre']) . '</h3>
                            <p class="descripcion-item-carrito">' . htmlspecialchars($item['descripcion']) . '</p>
                            <div class="acciones-item-carrito">
                                <input type="number" value="' . htmlspecialchars($cantidad) . '" class="input-cantidad" data-codigo="' . htmlspecialchars($item['codigo']) . '">
                                <button class="boton-personalizado boton-eliminar" data-codigo="' . htmlspecialchars($item['codigo']) . '">Eliminar</button>
                            </div>
                        </div>
                        <p class="precio-item-carrito">$' . number_format($item['precio_venta'], 2) . '</p>
                    </div>';
            }
            echo '<div class="checkout-area">
                    <div class="total-carrito">
                        <span>Total: ‎ </span>
                        <span class="total-precio">$' . number_format($total, 2) . '</span>
                    </div>
                    <button class="boton-personalizado boton-comprar" id="finalizarCompra">Comprar</button>
                </div>';
        } else {
            echo '<p>El carrito está vacío.</p>';
        }
        ?>
    </div>
  
  <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
  <script src="js/botones.js"></script>
  <script src="js/ordenes.js"></script>
  <script src="js/eliminarArticulos.js"></script>
  <script src="js/carrito.js"></script>

</body>

</html>