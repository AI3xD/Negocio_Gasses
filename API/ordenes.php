<?php
session_start();
include("../DB.php");  // Asegúrate de que este es el script correcto para conectar a la base de datos
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

if (!isset($_SESSION['id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Usuario no autenticado']);
    exit;
}

if (!isset($_SESSION['carrito']) || count($_SESSION['carrito']) == 0) {
    echo json_encode(['status' => 'error', 'message' => 'El carrito está vacío']);
    exit;
}

$usuario_id = $_SESSION['id'];  // Asumiendo que el ID del usuario está almacenado en la sesión
$fecha = date('Y-m-d');

$conn->autocommit(FALSE);  // Inicia una transacción

try {
    foreach ($_SESSION['carrito'] as $item) {
        $codigo_producto = $item['codigo'];
        $cantidad = $item['cantidad'];  // Cambiar si manejas cantidad en el carrito
        $total = $item['precio_venta'];  // Asumiendo que cada producto tiene su precio individual

        $stmt = $conn->prepare("INSERT INTO ordenes (codigo_producto, cantidad, total, fecha, id_usuario) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("siisi", $codigo_producto, $cantidad, $total, $fecha, $usuario_id);
        if (!$stmt->execute()) {
            throw new Exception('Error al insertar la orden: ' . $stmt->error);
        }
        $stmt->close();
    }

    $conn->commit();  // Commit de la transacción
    $_SESSION['carrito'] = [];  // Limpia el carrito
    echo json_encode(['status' => 'success', 'message' => 'Compra finalizada exitosamente']);
} catch (Exception $e) {
    $conn->rollback();  // Revierte la transacción en caso de error
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
$conn->autocommit(TRUE);  // Termina la transacción
?>