<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">


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
        <h1 class="texto-h1">Gases Industriales</h1>
    </div>

    <div class="banner">
        <img class="img-banner" src="img/banner.jpg" alt="">
    </div>
    <div class="contenedor-principal">
        <h2 class="texto-h2">Gases industriales, gases especiales y gases para procesos</h2>
        <h3 class="texto-h3">El gas correcto logra mejores resultados</h3>
        <p class="parrafo">El gas adecuado mejora significativamente los resultados. Nosotros, creemos que seleccionar
            el gas correcto va más allá de una simple aplicación: es clave para aumentar la eficiencia, reducir costos a
            largo plazo, y mejorar la productividad y flexibilidad operativa, permitiéndole optimizar recursos. Por eso,
            es esencial para nosotros comprender sus objetivos empresariales antes de sugerir un gas, asegurando que
            aproveche al máximo su inversión. Descubra nuestra variedad de gases puros, mezclas y soluciones en manejo
            de equipos para comenzar a obtener mejores resultados desde hoy.</p>

        <h3 class="texto-h3 centrar-texto">Gases más comunes</h3>

        <div class="grid-container">
            <div class="grid-item">
                <div class="formula">C<sub>2</sub>H<sub>2</sub></div>
                <span class="nombre nombre-exterior">Acetileno</span> <!-- Clase adicional para alinear a la derecha -->
            </div>
            <div class="grid-item">
                <div class="formula">He</div>
                <span class="nombre">Helio</span>
            </div>
            <div class="grid-item">
                <div class="formula">Ar</div>
                <span class="nombre">Argón</span>
            </div>
            <div class="grid-item">
                <div class="formula">O<sub>2</sub></div>
                <span class="nombre">Oxígeno</span>
            </div>
            <div class="grid-item">
                <div class="formula">N<sub>2</sub></div>
                <span class="nombre">Nitrógeno</span>
            </div>
            <div class="grid-item">
                <div class="formula">CO<sub>2</sub></div>
                <span class="nombre">Dióxido de Carbono</span>
            </div>
        </div>


        <h2 class="texto-h4">Mezclas de gases</h2>
        <p class="parrafo">Entendemos que las necesidades de su aplicación pueden ir más allá de un simple gas puro. Por
            ello, nuestros químicos e ingenieros se esfuerzan en formular y certificar nuestra gama de mezclas de gases
            especiales. Esta labor nos ha permitido perfeccionar técnicas avanzadas de purificación, con el objetivo de
            eliminar impurezas críticas y garantizar la máxima eficacia y estabilidad de nuestras mezclas.</p>
        <div class="linea"></div>

        <h4 class="texto-h4">Equipos para manejo de gas</h4>
        <p class="parrafo">Estamos dedicados a suministrar a nuestros clientes equipos de manejo de gas que sean
            confiables, seguros y eficientes, con el fin de optimizar su productividad. Nuestra gama incluye soluciones
            integrales para satisfacer incluso las aplicaciones más complejas y precisas, abarcando desde dispositivos
            de control de flujo y sistemas de distribución de gases hasta reguladores, purificadores y filtros.</p>
        <div class="background"></div>
    </div>



    <script src="js/menu.js"></script>

</body>

</html>