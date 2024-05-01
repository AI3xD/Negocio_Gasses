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
//Valida que el server method sea un post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if(isset($_POST['usuario']) && isset($_POST['password']) && isset($_POST['password_confirm'])){
        $username = $_POST['usuario'];
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];
        // Comprueba si las contraseñas coinciden
        if ($password === $password_confirm) {
            $hash=sha1($password);
            $query = "INSERT INTO usuarios (nombre_usuario, password, tipo_usuario) VALUES ('" . $username . "', '" . $hash . "',1)";
            $consulta= mysqli_query( $conn, $query);
            if ($consulta){
                $response = array("success" => true , "message" => "Datos Correctos");
                echo json_encode($response); 
            }else{
                $response = array("success" => false , "message" => "Datos incorrectos");
                echo json_encode($response);
            }
            exit();
        } else {
           $response = array("success" => false, "message" => "Las contraseñas no coinciden");
           echo json_encode($response);
           exit();
        }
    }else{
        $response = array("success" => false, "message" => "Todos los campos son obligatorios");
        echo json_encode($response);
        exit();
    }

    
   
}


//Que recibamos todos los datos necesarios para el insert del usuario $_post['usuario'] y el password


?>