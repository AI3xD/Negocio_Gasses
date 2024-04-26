<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gases";

// Crear conexión con MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Paso 2: Consulta para obtener solo productos de la categoría 'equipos'
$sql = "SELECT codigo, nombre, precio_venta, imagen_producto FROM productos WHERE categoria = 'gases'";
$result = $conn->query($sql);
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
      rel="stylesheet"
    />
    <title>Document</title>
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
          <button id="botonInicio" >
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home-2" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
              <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
              <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
              <path d="M10 12h4v4h-4z" />
            </svg>
          </button>
          <button id="botonCesta">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-basket" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
              <path d="M10 14a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
              <path d="M5.001 8h13.999a2 2 0 0 1 1.977 2.304l-1.255 7.152a3 3 0 0 1 -2.966 2.544h-9.512a3 3 0 0 1 -2.965 -2.544l-1.255 -7.152a2 2 0 0 1 1.977 -2.304z" />
              <path d="M17 10l-2 -6" />
              <path d="M7 10l2 -6" />
            </svg>
          </button>
          <a href="">Ver más</a>
          <a class="active"  href="gases.php">Gases</a>
          <a  href="soldadura.php">Soldaduras</a>
          <a href="Seguridad.php">Equipos de seguridad</a>
          <a  href="catalogo.php">Equipos</a>
        </nav>
      </div>
    </header>
    <div class="imagen">
        <div class="overlay">
            <div class="contenido-imagen">
                <h2 class="texto-imagen" >Gases para soldar</h2>
                <p class="texto-imagen-parrafo">Descubre como obtener el mayor rendimiento en la soldadura.</p>
                <a id="botonInformacion"  class="boton-personalizado">información</a>
            </div>
        </div>
        <img  class="fondo-soldador" src="img/GasesBanner.jpg" alt="Imagen soldador">

        <div class="contenedor-texto__catalogo">
            <h5 class="texto-titulos__catalogo">GASES</h5>
            <br>
            <p class="texto-parrafo__catalogo">Gases industriales, especiales y mezclas para todo tipo de aplicaciones requeridas. </p>
        </div>
    
    <div class="contenedor-grid">
        <div class="filtro-usuario">
            <div class="caja-filtro">
                <ul>
                    <li class="texto-filtro">
                        <a href="">Por gas
                        </a>
                    </li>
                </ul>

                <ul>
                    <li class="texto-filtro">
                        <a href="">Por aplicación</a>
                    </li>
                </ul>

                <ul>
                    <li class="texto-filtro">
                        <a href="">Accesorios para manejo de gases</a>
                    </li>
                </ul>

            </div>


     
        </div>

        <div>
        <div class="productos">
      <div class="contenedor__grid-cajas">
        <?php
        // Paso 3: Generar HTML para productos de 'equipos'
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $nombre = $row["nombre"];
                $precio = $row["precio_venta"];
                $imagen = $row["imagen_producto"];

                echo '<a href="#">';
                echo '  <div class="caja-productos">';
                echo '    <img src="img/' . $imagen . '" alt="' . $nombre . '" class="producto-imagen" />';
                echo '    <div class="producto-info">';
                echo '      <p class="producto-nombre">' . $nombre . '</p>';
                echo '      <p class="producto-precio">$' . number_format($precio, 2) . '</p>';
                echo '    </div>';
                echo '  </div>';
                echo '</a>';
            }
        } else {
            echo "No se encontraron productos de la categoría 'equipos'.";
        }
        ?>

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
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-facebook" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                  <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                </svg>
              </a>
              <a href="#" class="icono-social">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-twitter" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                  <path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c0 -.249 1.51 -2.772 1.818 -4.013z" />
                </svg>
              </a>
              <a href="#" class="icono-social">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-instagram" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                  <path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" />
                  <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                  <path d="M16.5 7.5l0 .01" />
                </svg>
              </a>
              <a href="#" class="icono-social">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-linkedin" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
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

    <script src="js/botones.js"></script>
  </body>
</html>
