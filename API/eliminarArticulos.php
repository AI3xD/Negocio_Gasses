<?php
include("../DB.php");
session_start();

header('Content-Type: application/json');

if (isset($_POST['codigo']) && !empty($_POST['codigo'])) {
    $codigo = $_POST['codigo'];

    // Verificar si el carrito existe y si el producto está en el carrito
    if (isset($_SESSION['carrito'])) {
        $totalActualizado = 0;
        foreach ($_SESSION['carrito'] as $key => $producto) {
            if ($producto['codigo'] === $codigo) {
                // Eliminar el producto del carrito
                unset($_SESSION['carrito'][$key]);
            } else {
                // Recalcular el total
                $totalActualizado += $producto['precio_venta'] * $producto['cantidad'];
            }
        }
        $_SESSION['carrito'] = array_values($_SESSION['carrito']); // Reindexa el array
        echo json_encode(['status' => 'success', 'message' => 'Producto eliminado con éxito', 'total' => number_format($totalActualizado, 2)]);
        exit;
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Carrito no inicializado']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Código de producto no proporcionado o inválido']);
}
?>