<?php
require ("../DB.php");
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $productoId = $_GET["productoId"];
    $sql = "SELECT codigo, nombre, precio_venta, imagen_producto FROM productos WHERE codigo='$productoId'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $productos = []; // Arreglo para almacenar resultados

        while ($row = mysqli_fetch_assoc($result)) {
            $productos[] = $row; // Añadir cada fila al arreglo
        }

        echo json_encode($productos); // Devolver los resultados como JSON
    } else {
        echo json_encode(["error" => "Error en la consulta: " . mysqli_error($conn)]); // Devolver error como JSON
    }
}

?>