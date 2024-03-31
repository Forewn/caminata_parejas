<?php
    session_start();
    if(!isset($_SESSION['id'])){
        session_destroy();
        header('Location: index.html');
    }
    include "../assets/lib/fpdf/fpdf.php";

    class Pdf extends FPDF {
        private $interlineado = 10;

        public function header(){
            $this->SetFont("Times", 'B', 12);
            $this->image('../assets/img/unefa.png', 17, 7, 20);
            $this->image('../assets/img/25aniversario.jpg', 172, 10, 20);
            $this->Cell(190, 10, utf8_decode("República Boliariana de Venezuela"), 0, 0, 'C');
            $this->Ln($this->interlineado/2);
            $this->Cell(190, 10, utf8_decode("Universidad Nacional Experimental Politécnica de la Fuerza Armada"), 0, 0, 'C');
            $this->Ln($this->interlineado/2);
            $this->Cell(190, 10, utf8_decode("Caminata de la Confraternidad Universitaria"), 0, 0, 'C');
            $this->Ln($this->interlineado);
        }
    
        public function body() {
            $categorias = $this->getCategories();
            $i = 1;
            foreach ($categorias as $categoria) {
                $this->SetFont("Arial", '', 12);
                $this->Ln($this->getInterlineado());
                $this->titulo($categoria['categoria']);
                $this->Ln($this->getInterlineado());
                $this->Ln($this->getInterlineado());
                $this->table();
                $this->Ln($this->getInterlineado());
                $this->contenido($categoria['id_categoria']);
                if($i != 3){
                    $this->AddPage();
                }
                $i++;
            }
        }
    
        private function getInterlineado() {
            return $this->interlineado;
        }

        private function titulo($titulo){
            $this->SetFont('Arial', 'B', 14);
            $this->Cell(190, 20, utf8_decode($titulo), 0, 0, 'C');
            $this->SetFont("Arial", '', 12);
        }

        private function table(){
            $this->SetFont('Arial', 'B', 12);
            $this->Cell(15, 10, "Lugar", 0, 0, 'C');
            $this->Cell(25, 10, utf8_decode("Institución"), 0, 0, 'C');
            $this->Cell(50, 10, "Caballero", 0, 0, 'C');
            $this->Cell(50, 10, "Dama", 0, 0, 'C');
            $this->Cell(15, 10, utf8_decode("Pareja"), 0, 0, 'C');
            $this->Cell(30, 10, "Tiempo", 0, 0, 'C');
        }

        private function contenido($id){
            include './conn.php';
            $sql = "SELECT * FROM v_resultados_parejas WHERE categoria = $id ORDER BY lugar ASC;";
            $this->SetFont('Arial', '', 10);
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){
                $sql55 = "SELECT * FROM resultados WHERE status = 1 AND id_pareja = ".$row['pareja'];
                $result55 = $conn->query($sql55);
                if($result55->num_rows == 1){
                    if(floor($this->GetY()) == 10){
                        $this->table();
                    }
                    $this->Cell(15, 10, $row['lugar'], 0, 0, 'C');
                    $this->Cell(25, 10, utf8_decode($row['universidad']), 0, 0, 'C');
                    $sql1 = "SELECT a.cedula, b.nombre, b.apellido FROM miembros_parejas a JOIN participantes b ON a.cedula = b.cedula WHERE a.id_pareja =".$row['pareja']." ORDER BY sexo DESC;";
                    $result1 = $conn->query($sql1);
                    while($row1 = $result1->fetch_assoc()){
                        $this->Cell(50, 10, utf8_decode(strtoupper($row1['nombre']." ".$row1['apellido'])), 0, 0, 'C');
                    }
                    $this->Cell(15, 10, utf8_decode($row['pareja']), 0, 0, 'C');
                    $this->Cell(30, 10, $row['tiempo'], 0, 0, 'C');
                    $this->Ln($this->getInterlineado());
                }
            }
        }

        private function getCategories(){
            include "./conn.php";
            $categorias = array();
            $sql =  "SELECT * FROM categorias";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){
                array_push($categorias, $row);
            }
    
            return $categorias;
        }
    }
    

    $pdf = new Pdf();
    $pdf->AddPage();
    $pdf->body();
    $pdf->Output();