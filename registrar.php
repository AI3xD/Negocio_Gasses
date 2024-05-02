
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
  <title>Document</title>
</head>

<body class="fondo">
  <header>
    <form id='form_register'onsubmit="modalLoading_register(event)">
      <div class="wrapper fadeInDown">
        <div id="formContent">
          <!-- Tabs Titles -->
          <a href="login.php">
            <h2 class="inactive inactive underlineHover"> Iniciar </h2>
          </a>
          <h2 class=" active ">Registrarse </h2>

          <!-- Icon -->
          <div class="fadeIn first">
            <a href="index.php">
              <img src="img/logoLinde.png" id="icon" alt="User Icon" />
            </a>
          </div>

          <!-- Login Form -->
          <div>
            <input required type="text" id="usuario" name="login2" placeholder="Usuario">
            <input required type="password" id="password" name="login3" placeholder="Contraseña">
            <input required type="password" id="password_confirm" name="login" placeholder="Confirmar Contraseña">
            <input type="submit" value="Registrar">
          </div>

          <!-- Remind Passowrd -->
          <div id="formFooter">
            <a class="underlineHover" href="#">Forgot Password?</a>
          </div>

        </div>
      </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/registro/registro.js"></script>

   
</body>

</html>