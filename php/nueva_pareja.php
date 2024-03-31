<?php
    session_start();
    if(!isset($_SESSION['id'])){
        session_destroy();
        header('Location: index.html');
    }
    class Pareja{
        private $miembro1;
        private $miembro2;
        private $institucion;
        private $categoria;
        private $id_pareja;

        function __construct()
        {
            $this->miembro1 = array(
                'cedula' => htmlspecialchars($_POST['cedula1']),
                'nombre' => htmlspecialchars($_POST['nombre1']),
                'nombre2' => htmlspecialchars($_POST['2donombre1']),
                'apellido' => htmlspecialchars($_POST['apellido1']),
                'apellido2' => htmlspecialchars($_POST['2doapellido1']),
                'cargo' => htmlspecialchars($_POST['cargo1']),
                'genero' => 1
            );

            $this->miembro2 = array(
                'cedula' => htmlspecialchars($_POST['cedula2']),
                'nombre' => htmlspecialchars($_POST['nombre2']),
                'nombre2' => htmlspecialchars($_POST['2donombre2']),
                'apellido' => htmlspecialchars($_POST['apellido2']),
                'apellido2' => htmlspecialchars($_POST['2doapellido2']),
                'cargo' => htmlspecialchars($_POST['cargo2']),
                'genero' => 0
            );

            $this->institucion = htmlspecialchars($_POST['institucion']);
            $this->categoria = $this->setCategoria($this->miembro1['cargo'], $this->miembro2['cargo']);
            $this->id_pareja = $this->getIdPareja();
        }

        private function getIdPareja(){
            require "./conn.php";
            $sql = "SELECT * FROM parejas;";
            $result = $conn->query($sql);
            return $result->num_rows+1;
        }
        
        private function setCategoria($cat1, $cat2){
            if($cat1 == "1" && $cat2 == "1"){
                return 1;
            }
            else if($cat1 != "1" && $cat2 != "1"){
                return 2;
            }
            else{
                return 3;
            }
        }

        private function checkIfExists($conn){
            $sql = "SELECT * FROM miembros_parejas WHERE cedula = ".$this->miembro1['cedula'];
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                return 0;
            }
            else{
                $sql = "SELECT * FROM miembros_parejas WHERE cedula = ".$this->miembro2['cedula'];
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    return 2;
                }
                else{
                    return 1;
                }
            }
        }

        public function create(){
            require "./conn.php";
            switch($this->checkIfExists($conn)){
                case 1:
                    if($this->insertMembers($conn)){
                        $sql = "INSERT INTO parejas(id_pareja, id_categoria, id_universidad) 
                        VALUES(".$this->id_pareja.", ".$this->categoria.", ".$this->institucion.");";
                        $result = $conn->query($sql);
                        if($result){
                            $sql = "INSERT INTO miembros_parejas(id_pareja, cedula) 
                            VALUES (".$this->id_pareja.", ". $this->miembro1['cedula'] ."), 
                            (".$this->id_pareja.", ". $this->miembro2['cedula'] .");";
                            $result = $conn->query($sql);
                            // echo $conn->error;
                            if($result){
                                echo "Pareja Registrada Exitosamente!";
                                header('Location: ../registro.php');
                            }
                        }
                    }
                    break;
                case 0:
                    echo "El candidato ". $this->miembro1['cedula']. " ya esta participando";
                    break;
                case 2:
                    echo "El candidato ". $this->miembro2['cedula']. " ya esta participando";
                    break;
            };
        }

        private function insertMembers($conn){
            $sql = "INSERT INTO participantes(cedula, nombre, nombre2, apellido, apellido2, id_rol, sexo)
            VALUES('".$this->miembro1['cedula']."', '".$this->miembro1['nombre']."', '".$this->miembro1['nombre2']."',
            '".$this->miembro1['apellido']."', '".$this->miembro1['apellido2']."', ".$this->miembro1['cargo'].", ".$this->miembro1['genero'].");";
            $result = $conn->query($sql);
            if($result){
                    $sql = "INSERT INTO participantes(cedula, nombre, nombre2, apellido, apellido2, id_rol, sexo)
                VALUES('".$this->miembro2['cedula']."', '".$this->miembro2['nombre']."', '".$this->miembro2['nombre2']."',
                '".$this->miembro2['apellido']."', '".$this->miembro2['apellido2']."', '".$this->miembro2['cargo']."', ".$this->miembro2['genero'].");";
                $result = $conn->query($sql);
                if($result){
                    return 1;
                }
                else{
                    return 0;
                }
            }
            else{
                return 0;
            }
        }
    }

    $pareja = new Pareja();
    $pareja->create();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="../index.php">Volver</a>
</body>
</html>