<?php
session_start();
include("../DB.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

// Verifica si el código del producto fue enviado y no está vacío
if (isset($_POST['codigo']) && !empty($_POST['codigo'])) {
    $codigo = $_POST['codigo'];

    // Preparar consulta para evitar inyecciones SQL
    $stmt = $conn->prepare("SELECT * FROM productos WHERE codigo = ?");
    if (!$stmt) {
        echo json_encode(['status' => 'error', 'message' => 'Error de preparación de consulta: ' . $conn->error]);
        exit;
    }

    // Vincula parámetros para marcadores
    $stmt->bind_param("s", $codigo);

    // Ejecuta la consulta
    $stmt->execute();
    $resultado = $stmt->get_result();
    $stmt->close();

    // Verifica si se encontró el producto
    if ($row = $resultado->fetch_assoc()) {
        // Inicializa el carrito si no existe
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }

        // Busca el producto en el carrito
        $productoEncontradoEnCarrito = false;
        foreach ($_SESSION['carrito'] as &$producto) {
            if ($producto['codigo'] === $codigo) {
                $producto['cantidad']++;
                $producto['precio_venta'] = $row['precio_venta'] * $producto['cantidad']; // Totaliza el precio_venta actual
                $productoEncontradoEnCarrito = true;
                break;
            }
        }

        // Si el producto no está en el carrito, añádelo
        if (!$productoEncontradoEnCarrito) {
            $row['cantidad'] = 1; // Añade clave 'cantidad' con valor inicial
            $_SESSION['carrito'][] = $row;
        }

        echo json_encode(['status' => 'success', 'message' => 'Producto agregado con éxito']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Producto no encontrado']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Código de producto no proporcionado o inválido']);
}
?>