<?php
    //session_start((;
    //(!isset($_SESSION['id']))? header('Location: index.html') : null;
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
        </ul>            
    </nav>
    <a class="btn" href="./php/resultados.php"><button>PDF</button></a>
</div>