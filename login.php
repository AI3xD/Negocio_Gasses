<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/login.css">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
    rel="stylesheet">
    <link rel="icon" href="img/Linde-Logo.png">
  <title>Document</title>
</head>

<body class="fondo">
  <header>

    <div action="">
      <div class="wrapper fadeInDown">
        <div id="formContent">

          <h2 class="active"> Iniciar </h2>
          <a href="registrar.php">
            <h2 class="inactive underlineHover">Registrarse </h2>
          </a>


          <div class="fadeIn first">
            <a href="index.php">
              <img src="img/logoLinde.png" id="icon" alt="User Icon" />
            </a>
          </div>

          <form onsubmit="modalLoading_login(event)">
            <input type="text" id="usuario" class="fadeIn second" name="login" placeholder="Usuario">
            <input type="password" id="password" class="fadeIn third" name="login" placeholder="Contraseña">
            <input type="submit" class="fadeIn fourth" value="Entrar">
          </form>


          <div id="formFooter">
            <a class="underlineHover" href="#">¿Olvidaste contraseña?</a>
          </div>

        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/login.js"></script>

</body>

</html>