<?php
    $hostname = "localhost";
    $database = "caminata_parejasdb";
    $username = "root";
    $password = "";

    $conn = new mysqli($hostname, $username, $password, $database);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
      }
?>