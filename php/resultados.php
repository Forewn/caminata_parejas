<?php
    //session_start((;
    //(!isset($_SESSION['id']))? header('Location: index.html') : null;
    include "../assets/lib/fpdf/fpdf.php";

    class Pdf extends FPDF {
        private $interlineado = 10;

        public function header(){
            $this->SetFont("Arial", '', 12);
            $this->Cell(190, 10, "República Boliariana de Venezuela", 0, 0, 'C');
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
            $this->Cell(50, 10, "Miembro 1", 0, 0, 'C');
            $this->Cell(50, 10, "Miembro 2", 0, 0, 'C');
            $this->Cell(15, 10, utf8_decode("Pareja"), 0, 0, 'C');
            $this->Cell(30, 10, "Tiempo", 0, 0, 'C');
        }

        private function contenido($id){
            include './conn.php';
            $sql = "SELECT * FROM v_resultados_parejas WHERE categoria = $id;";
            $this->SetFont('Arial', '', 10);
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){
                if(floor($this->GetY()) == 10){
                    $this->table();
                }
                $this->Cell(15, 10, $row['lugar'], 0, 0, 'C');
                $this->Cell(25, 10, utf8_decode($row['universidad']), 0, 0, 'C');
                $sql1 = "SELECT a.cedula, b.nombre, b.apellido FROM miembros_parejas a JOIN participantes b ON a.cedula = b.cedula WHERE a.id_pareja =".$row['pareja'];
                $result1 = $conn->query($sql1);
                while($row1 = $result1->fetch_assoc()){
                    $this->Cell(50, 10, utf8_decode(strtoupper($row1['nombre']." ".$row1['apellido'])), 0, 0, 'C');
                }
                $this->Cell(15, 10, utf8_decode($row['pareja']), 0, 0, 'C');
                $this->Cell(30, 10, $row['tiempo'], 0, 0, 'C');
                $this->Ln($this->getInterlineado());
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