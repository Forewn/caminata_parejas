<?php
require("conn.php");

// Obtener los datos de la petición AJAX
$numeroPareja = $_POST['numeroPareja'];
$tiempo = $_POST['tiempo'];

// Formatear el tiempo adecuadamente para evitar problemas de formato
$tiempoFormateado = $conn->real_escape_string($tiempo);

$checkSql = "SELECT * FROM resultados WHERE id_pareja = $numeroPareja;";
$result = $conn->query($checkSql);
if($result->num_rows == 1){
    $sql = "UPDATE resultados SET tiempo = '$tiempoFormateado' WHERE id_pareja = $numeroPareja;";
}
else{
    // Insertar los datos en la base de datos
    $sql = "INSERT INTO `resultados` (`id_pareja`, `id_categoria`, `tiempo`, `status`) VALUES ('$numeroPareja', 1, '$tiempoFormateado', 1)";
}

if ($conn->query($sql)) {
    echo "Tiempo registrado con éxito";
} else {
    echo "Error al registrar el tiempo: " . $conn->error;
}

$lugarSQL = "UPDATE resultados AS r
INNER JOIN (
  SELECT r.id_resultado, r.id_pareja, r.tiempo, RANK() OVER (PARTITION BY c.categoria ORDER BY r.tiempo ASC) AS 'Posicion'
  FROM resultados AS r
  INNER JOIN parejas AS p ON r.id_pareja = p.id_pareja
  INNER JOIN categorias AS c ON p.id_categoria = c.id_categoria
) AS t ON r.id_resultado = t.id_resultado
SET r.lugar = t.Posicion;";
$conn->query($lugarSQL);



// Cerrar la conexión
$conn->close();
?>