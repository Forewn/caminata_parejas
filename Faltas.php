<?php
require("./php/conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FALTAS</title>
    <link rel="stylesheet" type="text/css" href="./css/participantes.css">
</head>

<body>
    <header>
        <?php include "./modulos/navbar.php"; ?>
    </header>
    <div class="contenedor">
        <main class="table" id="customers_table">
            <section class="table__header">
                <h1>FALTAS</h1>
                <div class="input-group">
                    <input type="search" placeholder="DATOS DE BUSQUEDA">
                    <img src="./assets/img/search.png" alt="search">
                </div>
                <div class="export__file">
                    <label for="export-file" class="export__file-btn" title="Export File"></label>
                    <input type="checkbox" id="export-file">
                    <div class="export__file-options">
                        <label>Opciones &nbsp; &#10140;</label>
                        <label for="export-file" id="a"><a href="./nueva_falta.php" style="text-decoration: none; color:black;">Nueva Falta</a><img src="./assets/img/settings.png" alt="pdf"></label>                    
                    </div>
                </div>
            </section>
            <section class="table__body">
                <table>
                    <thead>
                        <tr>
                            <th> Pareja no. <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Dama <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Caballero <span class="icon-arrow">&UpArrow;</span></th>                        
                            <th> Instituto <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Falta no. <span class="icon-arrow">&UpArrow;</span></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $sql="SELECT * FROM parejas where falta >= 1";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) 
                        {
                            while($fila = mysqli_fetch_assoc($result)) 
                            {
                                $idpareja=$fila['id_pareja'];
                                $instituto=$fila['id_universidad'];
                                $faltas=$fila['falta'];
                                echo"
                                    <tr>                        
                                        <td> " . $idpareja . "</td>";  
                                        $sql1="SELECT * FROM `miembros_parejas` where id_pareja=". $idpareja;
                                        $resultt = mysqli_query($conn, $sql1);
                                        if (mysqli_num_rows($resultt) > 0) 
                                        {  
                                            while($row = mysqli_fetch_assoc($resultt)) 
                                            { 
                                                
                                                $cedula=$row['cedula'];
                                                $sql2=" SELECT * FROM `participantes` WHERE cedula=". $cedula;
                                                $resulttt = mysqli_query($conn, $sql2);
                                                if (mysqli_num_rows($resulttt) > 0) 
                                                {
                                                    $row = mysqli_fetch_assoc($resulttt);
                                                    if ($row['sexo'] == 0) 
                                                    {
                                                        $damaNombre = $row["nombre"] ." ". $row["nombre2"] . " " . $row["apellido"] . " " . $row["apellido2"];
                                                    } 
                                                    elseif ($row['sexo'] == 1) 
                                                    {
                                                        $caballeroNombre = $row["nombre"] ." ". $row["nombre2"] . " " . $row["apellido"] . " " . $row["apellido2"];
                                                    }                                   
                                                }                                           
                                            }     
                                        }
                                        
                                        echo "<td>" . $damaNombre . "</td>";
                                        echo "<td>" . $caballeroNombre . "</td>";        
                                        $sql3="SELECT * FROM `universidades` WHERE id_universidad=".$instituto;
                                        $resultt = mysqli_query($conn, $sql3);
                                        $row = mysqli_fetch_assoc($resultt);
                                        echo"<td>".$row["siglas"]."</td>";
                                        echo"<td>".$faltas."</td>";                                  
                                    echo"</tr>";
                            }
                        }

                        ?>
                                            
                    </tbody>
                </table>
            </section>
        </main>
    </div>
    <script src="./js/participantes.js"></script>

</body>

</html>
