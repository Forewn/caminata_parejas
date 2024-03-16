<?php
require("conn.php");

// Obtener los datos de la petición AJAX
$numeroPareja = $_POST['numeroPareja'];
$tiempo = $_POST['tiempo'];

// Formatear el tiempo adecuadamente para evitar problemas de formato
$tiempoFormateado = $conn->real_escape_string($tiempo);

// Insertar los datos en la base de datos
$sql = "INSERT INTO `resultados` (`id_pareja`, `tiempo`, `status`) VALUES ('$numeroPareja', '$tiempoFormateado', 0)";

if ($conn->query($sql)) {
    echo "persona descalificada con éxito";
} else {
    echo "Error al registrar el tiempo: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>