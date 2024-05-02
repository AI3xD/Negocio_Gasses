<?php

include ("DB.php");
$id = $_GET['id'];
$query = "SELECT * FROM productos WHERE codigo='$id'";
$consulta = mysqli_query($conn, $query);
$row = mysqli_fetch_array($consulta);



// Suponiendo que ya tienes el $id del producto actual
$categoria_actual = $row['categoria'];

// Consulta para obtener otros 4 productos de la misma categoría, excluyendo el actual
$query_relacionados = "SELECT * FROM productos WHERE categoria='$categoria_actual' AND codigo != '$id' LIMIT 4";
$consulta_relacionados = mysqli_query($conn, $query_relacionados);
$productos_relacionados = mysqli_fetch_all($consulta_relacionados, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/normalize.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
    rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet" />
  <title>Document</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
  <header>
    <div class="nav-catalogo">
      <div class="logo">
        <a class="logo-selector" href="index.php">
          <img class="logo2" src="img/logo-texto-derecha-removebg-preview.png" alt="" />
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
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-basket" width="44" height="44"
            viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round"
            stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M10 14a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
            <path
              d="M5.001 8h13.999a2 2 0 0 1 1.977 2.304l-1.255 7.152a3 3 0 0 1 -2.966 2.544h-9.512a3 3 0 0 1 -2.965 -2.544l-1.255 -7.152a2 2 0 0 1 1.977 -2.304z" />
            <path d="M17 10l-2 -6" />
            <path d="M7 10l2 -6" />
          </svg>
        </button>
        <a href="">Ver más</a>
        <a href="gases.html">Gases</a>
        <a href="soldadura.php">Soldaduras</a>
        <a href="Seguridad.php">Equipos de seguridad</a>
        <a href="catalogo.php">Equipos</a>
      </nav>
    </div>
  </header>
  <div class="contenedor__producto-info">
    <div class="contenedor-grid__info">
      <div class="producto__imagen-producto">
        <!-- Imagen del producto -->
        <div class="producto__imagen-producto">
          <img class="imagen__producto" src="img/<?php echo htmlspecialchars($row['imagen_producto']); ?>"
            alt="<?php echo htmlspecialchars($row['nombre']); ?>" />
        </div>
      </div>
      <div class="producto__info-producto">
        <!-- Título del producto -->
        <div class="contenedor__info-titulo">
          <h1 class="info__producto-titulo">
            <?php echo $codigo = $row['nombre'];
            ?>
          </h1>
        </div>
        <!-- Descripción del producto -->
        <p class="texto__descripcion-producto">
          <?php echo $codigo = $row['descripcion'];
          ?>
        </p>

        <!-- Información adicional de cantidad y unidades disponibles -->
        <div class="producto__cantidad-unidades">
          <span>Cantidad disponible: <?php echo $codigo = $row['cantidad_disponible'];
          ?></span>
          <span>Precio: <?php echo $codigo = $row['precio_venta'];
          ?></span>
          <span>Unidades: piezas</span>
          <div class="producto__elegir-cantidad">
            <label for="cantidad">Cantidad:<?php echo $codigo = $row['unidad'];
            ?></label>
            <input type="number" id="cantidad" name="cantidad" class="input-number" min="1" max="50" step="1"
              value="1" />
          

          </div>
        </div>

       <a href="#" id="btnAgregarCarrito" class="btn__agregar-producto" data-codigo="<?php echo $row['codigo']; ?>">Agregar al carrito</a>
      </div>

    </div>
    <div class="otros-productos">
      <h2 class="titulo-otros-productos">Otros Productos</h2>
      <div class="grid-productos">
        <?php foreach ($productos_relacionados as $producto) { ?>
          <div class="producto">
            <a href="producto.php?id=<?php echo htmlspecialchars($producto['codigo']); ?>">
              <img src="img/<?php echo htmlspecialchars($producto['imagen_producto']); ?>"
                alt="<?php echo htmlspecialchars($producto['nombre']); ?>">
            </a>
            <h3><?php echo htmlspecialchars($producto['nombre']); ?></h3>
            <p>Precio: $<?php echo number_format($producto['precio_venta'], 2); ?></p>
          </div>
        <?php } ?>
      </div>
    </div>

  </div>
  </div>


  <footer>
    <div class="contenedor-footer__catalogo">
      <!-- El contenedor del texto y los iconos de redes sociales -->
      <div class="contenedor-footer__catalogo-forma-de-pago">
        <p class="texto-footer-catalogo">Forma de pago</p>
        <!-- Los enlaces a las redes sociales se colocarán aquí -->
        <div class="iconos-sociales">
          <a href="#" class="icono-social">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-facebook" width="44"
              height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round"
              stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
            </svg>
          </a>
          <a href="#" class="icono-social">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-twitter" width="44"
              height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round"
              stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path
                d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c0 -.249 1.51 -2.772 1.818 -4.013z" />
            </svg>
          </a>
          <a href="#" class="icono-social">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-instagram" width="44"
              height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round"
              stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" />
              <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
              <path d="M16.5 7.5l0 .01" />
            </svg>
          </a>
          <a href="#" class="icono-social">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-linkedin" width="44"
              height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round"
              stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
              <path d="M8 11l0 5" />
              <path d="M8 8l0 .01" />
              <path d="M12 16l0 -5" />
              <path d="M16 16v-3a2 2 0 0 0 -4 0" />
            </svg>
          </a>
        </div>
      </div>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="js/carrito.js"></script>
  <script src="js/botones.js"></script>
</body>

</html>