<?php

$sql = "SELECT falta FROM parejas WHERE id_pareja = ".$contenido['pareja'];
$result = $conn->query($sql);
if($result->fetch_assoc()['falta'] >= 3){
    $sql = "UPDATE resultados
        SET status = 0, lugar = 0 WHERE id_pareja = ".$contenido['pareja'];
    $conn->query($sql);
}

$lugarSQL = "UPDATE resultados AS r
INNER JOIN (
  SELECT r.id_resultado, r.id_pareja, r.tiempo, RANK() OVER (PARTITION BY c.categoria, r.status ORDER BY r.tiempo ASC) AS 'Posicion'
  FROM resultados AS r
  INNER JOIN parejas AS p ON r.id_pareja = p.id_pareja
  INNER JOIN categorias AS c ON p.id_categoria = c.id_categoria
) AS t ON r.id_resultado = t.id_resultado
SET r.lugar = t.Posicion;";
$conn->query($lugarSQL);