<?php

    class Usuario{
        private $password, $username;

        public function __construct($password, $username)
        {
            $this->password = htmlspecialchars($password);
            $this->username = strtolower(htmlspecialchars($username));

            $this->checkDB();
        }

        private function checkDB(){
            include "conn.php";
            $sql = "SELECT * FROM USUARIOS WHERE usuario = '". $this->username."';";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                $usuario = $result->fetch_assoc();
                if($this->password == $usuario['contrasena']){
                    //acceso habilitado
                    echo 200;
                    session_start();
                    $_SESSION['id'] = $usuario['id_usuario'];
                    $_SESSION['username'] = $usuario['usuario'];
                }
                else{
                    //contrasena incorrecta
                    echo 102;
                }
            }
            else{
                //usuario no existe
                echo 101;
            }
        }
    }

    $usuario = new Usuario($_GET['password'], $_GET['username']);