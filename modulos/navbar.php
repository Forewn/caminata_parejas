<?php
    session_start();
    if(!isset($_SESSION['id'])){
        session_destroy();
        header('Location: index.html');
    }
?>
<link rel="stylesheet" href="./css/navbar.css">
<div class="header">
    <div class="logo">
        <img src="./assets/img/unefa.png"  alt="Logo de la marca">
        <img class="aniversario" src="./assets/img/25aniversario.jpg"  alt="Logo de la marca">
    </div>
    <nav>
        <ul class="nav-links">
            <li><a href="./cronometro.php">Cronometro</a></li>
            <li><a href="./registro.php">Registro</a></li>
            <li><a href="./participantes.php">Listado</a></li>
            <li><a href="./Faltas.php">Faltas</a></li>
            <li><a href="./php/logout.php">Cerrar Sesión</a></li>
            
        </ul>            
    </nav>
    <a class="btn" href="./php/resultados.php" target="_blank"><button>Resultados</button></a>
</div>