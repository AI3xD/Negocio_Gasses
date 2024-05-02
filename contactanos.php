<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
      rel="stylesheet"
    />
    <title>Document</title>
</head>
<body>
   
    <header>
        <div class="fondo-1">
            <div class="contenedor-1">
            <?php
                session_start(); // Asegúrate de que la sesión está iniciada
                
                // Condición para verificar si el usuario está logueado
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                    // Botón de cerrar sesión
                    echo '  <a class="texto-iniciar animacion" href="api/logout.php">Cerrar sesión</a>';
                } else {
                    // Botón de iniciar sesión
                    echo '  <a class="texto-iniciar animacion" href="login.php">Iniciar sesión</a>';
                }
                ?>

            </div>
        </div>

        <div class="fondo-2">
            <div class="contenedor-2">
                <button class="menu-btn">☰ Menu</button>
                <nav>
                    <a href="catalogo.php">Catálogo</a>
                    <a href="servicios.php">Servicios</a>
                    <a href="contactanos.php">Contactanos</a>
                </nav>
                <div class="logo">
                    <a href="index.php">
                        <img src="img/logoLinde.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </header>

    <div class="titulo">
        <h1 class="texto-h1">Contactanos</h1>
    </div>

    <div class="banner">
        <img class="img-banner" src="img/banner-nosotros.png" alt="">
    </div>
    <div class="contenedor-principal">
        <h2 class="texto-h2">Gases industriales, gases especiales y gases para procesos</h2>
        <h3 class="texto-h3">Sobre nosotros</h3>
        <p class="parrafo">Somos más que un proveedor de gases industriales. Somos expertos en la entrega de gas, suministro y uso, y trabajaremos con usted en cada paso del proceso para que obtenga el máximo provecho de nuestros gases. Linde ofrece una extensa cartera de servicios que comienza con la optimización de la eficiencia de sus procesos y termina Haciendo nuestro mundo más productivo.</p>

        <h2 class="texto-h2 font-size">Suministro y Administración de Gas</h2>
        <p class="parrafo">Linde puede ofrecerle un suministro confiable de los gases industriales que necesita para hacer que su empresa prospere. Nuestras más de 50 plantas de producción, estratégicamente localizadas en todo el país, nuestra amplia variedad de gases y programas de gestión de procesos así como nuestros sistemas de entrega están diseñados para proporcionarle el gas que necesita, en el tiempo y forma que necesita.</p>


        <div class="contenedor-aside">
            <aside class="sidebar">
              <div>
                <h3 class="texto-h3 ">Correo Electronico</h3>
              </div>
              <div>
                <p class="texto-grid">Pintygases_altamira@hotmail.com</p>
              </div>
            <div>
                <h3 class="texto-h3 ">
                    Telefono
                </h3>
            </div>
            <div>
                <p class="texto-grid">833-123-4567</p>
            </div>
            <div>
                <h3 class="texto-h3 ">Facebook</h3>
            </div>
            <div>
                <p class="texto-grid">Pinturas y gases industriales de Altamira</p>
            </div>
            <div class="background"></div>
            </aside>
        </div>
    </div>
      
            

            </footer>
                
<script src="js/botones.js"></script>    
<script src="js/menu.js"></script>         
</body>
</html>