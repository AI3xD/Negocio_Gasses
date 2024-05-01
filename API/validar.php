<?php
require("../DB.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    // Preparar la sentencia SQL para evitar inyección SQL
    $sql = $conn->prepare("SELECT * FROM usuarios WHERE nombre_usuario = ?");
    $sql->bind_param("s", $username);
    $sql->execute();
    $result = $sql->get_result();

   
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    
        // Verificar la contraseña hasheada
        $passwordHash=trim($row['password']);
        if (sha1($password) == $passwordHash) {
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $row['id'];
            $_SESSION['tipo_usuario'] = $row['tipo_usuario'];
            echo json_encode(["success" => true, "message" => "Login exitoso"]);
        } else {
            echo json_encode(["success" => false, "message" => "Credenciales incorrectas"]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "Usuario no encontrado"]);
    }
    
    $sql->close();
}
?>