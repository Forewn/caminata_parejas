
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cronometro de Carrera</title>
    <link rel="stylesheet" href="./css/cronometro.css">
    <link rel="icon" href="./assets/img/unefa.png">
</head>
<body>

    <header>
        <?php include "./modulos/navbar.php"; ?>
    </header>
    
    <div class="wrapper">
        <div>
            
            <h1>SISTEMA AUTOMATIZADO DE REGISTRO Y CONTROL CAMINATA UNIVERSITARIA</h1>
           
        </div>
        
        <div class="time">            
            <span class="hour">00</span>
            <span class="colon">:</span>
            <span class="minute">00</span>
            <span class="colon">:</span>
            <span class="second">00</span>
            <span class="colon ms-colon">:</span>
            <span class="millisecond">00</span>
        </div>

        <div class="buttons">
            <button class="start"> Iniciar</button>
            <button class="stop"> Detener</button>
            <button class="reset"> Reiniciar</button>
            <input type="number">
            <button class="Registrar" onclick="registrarTiempo()">Registrar</button>
            <button class="eliminar" onclick="descalificarTiempo()">Descalificar</button>            
        </div>
    <script src="./js/cronometro.js"></script>
</body>
</html>