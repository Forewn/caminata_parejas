<?php
    session_start();
    if(!isset($_SESSION['id'])){
        session_destroy();
        header('Location: index.html');
    }
    include "../assets/lib/fpdf/fpdf.php";

    class pdf extends FPDF{
        private $interlineado = 5;

        public function header(){
            $this->SetFont("Times", 'B', 12);
            $this->image('../assets/img/unefa.png', 17, 7, 20);
            $this->image('../assets/img/25aniversario.jpg', 172, 10, 20);
            $this->Cell(190, 10, utf8_decode("República Boliariana de Venezuela"), 0, 0, 'C');
            $this->Ln($this->interlineado);
            $this->Cell(190, 10, utf8_decode("Universidad Nacional Experimental Politécnica de la Fuerza Armada"), 0, 0, 'C');
            $this->Ln($this->interlineado);
            $this->Cell(190, 10, utf8_decode("Caminata de la Confraternidad Universitaria"), 0, 0, 'C');
            $this->Ln($this->interlineado*4);
        }

        public function body(){
            $i = 0;
            require "conn.php";
            $sql = "SELECT * FROM universidades;";
            $result = $conn->query($sql);
            while($uni = $result->fetch_assoc()){
                $i++;
                $sql = "SELECT * FROM parejas WHERE id_universidad = '".$uni['id_universidad']."';";
                if($conn->query($sql)->num_rows > 0){
                    $this->table($uni['siglas'], $uni['id_universidad']);
                    ($i < $result->num_rows)? $this->AddPage(): null;
                }
            }
        }

        public function table($nombre, $id){
            require "conn.php";
            $this->titulo($nombre);
            $this->SetFont("Arial", 'B', 12);
            $this->Write(5, "#");
            $this->SetX(20);
            $this->Write(5, "Dama");
            $this->SetX(76);
            $this->Write(5, "Cedula");
            $this->SetX(100);
            $this->Write(5, "Caballero");
            $this->SetX(157);
            $this->Write(5, "Cedula");
            $this->SetX(178);
            $this->Write(5, "Categoria");
            $this->SetFont("Arial", '', 12);
            $sql = "SELECT * FROM parejas WHERE id_universidad = '$id';";
            $result = $conn->query($sql);
            while($pareja = $result->fetch_assoc()){
                $sql1 = "SELECT * FROM v_participantes WHERE pareja = ".$pareja['id_pareja']." ORDER BY sexo;";
                $result1 = $conn->query($sql1);
                while($miembro = $result1->fetch_assoc()){
                    if($miembro['sexo'] == 0){
                        $this->Ln($this->interlineado*2);
                        $this->Write(5, $miembro['pareja']);
                        $this->SetX(20);
                        $this->Write(5, utf8_decode($miembro['nombre']." ".$miembro['apellido']));
                        $this->SetX(76);
                        $this->Write(5, $miembro['cedula']);
                    }
                    else{
                        $this->SetX(100);
                        $this->Write(5, utf8_decode($miembro['nombre']." ".$miembro['apellido']));
                        $this->SetX(157);
                        $this->Write(5, $miembro['cedula']);
                        $this->SetX(178);
                        $sql2 = "SELECT * FROM categorias WHERE id_categoria = ".$pareja['id_categoria'];
                        $result2 = $conn->query($sql2);
                        $categoria = $result2->fetch_assoc();
                        $this->Write(5, $categoria['siglas']);
                    }
                }
            }
            $this->Ln($this->interlineado);
        }

        private function titulo($titulo){
            $this->SetFont('Arial', 'B', 14);
            $this->Cell(190, 20, utf8_decode($titulo), 0, 0, 'C');
            $this->SetFont("Arial", '', 12);
            $this->Ln($this->interlineado*4);
        }
    }

    $pdf =  new pdf();
    $pdf->AddPage();
    $pdf->body();
    $pdf->Output();
