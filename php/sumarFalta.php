<?php
    session_start();
    if(!isset($_SESSION['id'])){
        session_destroy();
        header('Location: index.html');
    }
    require "./conn.php";

    $contenido = array(
        'pareja' => $_POST['numPareja'],
        'faltas' => $_POST['numFaltas']
    );

    $sql = "UPDATE parejas
    SET falta = falta + ".$contenido['faltas']."
    WHERE id_pareja = ".$contenido['pareja'].";";

    $conn->query($sql);

    echo "Faltas anexadas exitosamente!";
    require "./descalificacion.php";