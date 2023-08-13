<?php
    namespace Controllers;

    use Classes\Reportes;

    use Model\Vehiculo;

    use MVC\Router;

    
    class VehiculoController{


        public static function vehiculos(Router $router){
            session_start();

            $consulta = "SELECT A.id, A.placa_vehiculo, A.marca_vehiculo, A.year_vehiculo, a.idPropietario, CONCAT(B.nombre_propietario, ' ', B.apellido_propietario) AS 'propietario' FROM vehiculos A INNER JOIN propietarios b  WHERE a.id = b.id;";
            $vehiculos = Vehiculo::SQL($consulta);
            $router -> render('servicios/vehiculos', [
                'propietarios' => $vehiculos
            ]);
        }

        public static function addVehiculo(Router $router){
            $router -> render('servicios/agregarVehiculo', [
    
            ]);
        }

        public static function crear(){
            $vehiculo = new Vehiculo($_POST);
    
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $vehiculo -> sincronizar($_POST);
                $resultado = $vehiculo -> guardar();
                if($resultado){
                    header('Location: /vehiculos');
                }
            }
        }

        public static function updateVehicle(Router $router)
    {
        session_start();
        if (!is_numeric($_GET['id']))
            return;

        $vehiculo = Vehiculo::find($_GET['id']);


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $vehiculo->sincronizar($_POST);
            $vehiculo->guardar();
            header('Location: /vehiculos');
            
        }
        $router->render('/servicios/actualizarVehiculo', [
            'vehiculo' => $vehiculo
  
        ]);
    }



        public static function generarReporte(){
            $pdf = new Reportes(PDF_PAGE_ORIENTATION, 'mm', 'Letter', true, 'UTF-8', 'false');
    
            $pdf -> SetMargins(20,35,25);
            $pdf->SetHeaderMargin(20);
            $pdf->setPrintFooter(false);
            $pdf->setPrintHeader(true); 
            $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
    
            $pdf -> SetCreator('Taller DBAKA');
            $pdf -> SetAuthor('Taller DBAKA');
            $pdf -> SetTitle('Reporte de Vehiculos');
    
            $pdf -> AddPage();
            $pdf->SetFont('Helvetica', 'B', 12);
            //Columna derecha
            $pdf->SetXY(150, 25);
            $pdf->Write(0, 'Fecha: '. date('d-n-y'));
            $pdf->SetXY(150, 30);
            $pdf->Write(0, 'Hora: '. date('h:i A'));
    
            //Columna Izquierda
            $taller = 'Taller DBAka';
            $pdf->SetFont('helvetica','B',10); //Tipo de fuente y tamaño de letra
            $pdf->SetXY(15, 20); //Margen en X y en Y
            $pdf->SetTextColor(204,0,0);
            $pdf->Write(0, 'Reportes');
            $pdf->SetTextColor(204,0,0);
            $pdf->SetXY(15, 25);
            $pdf->Write(0, 'Compañia: '. $taller);
    
            $pdf->Ln(35); //Salto de Linea
            $pdf->Cell(40,26,'',0,0,'C');
            $pdf->SetTextColor(34,68,136);
            $pdf->SetFont('helvetica','B', 15); 
            $pdf->Cell(85,6,'LISTA DE VEHICULOS',0,0,'C');
    
            $pdf->Ln(10); //Salto de Linea
            $pdf->SetTextColor(0, 0, 0); 
    
            $pdf->SetFillColor(232,232,232);
            $pdf->SetFont('helvetica','B',12); 
            $pdf->Cell(10,6,'#',1,0,'C',1);
            $pdf->Cell(60,6,'Placa',1,0,'C',1);
            $pdf->Cell(35,6,'Marca',1,0,'C',1);
            $pdf->Cell(35,6,'Modelo',1,0,'C',1);
            $pdf->Cell(35,6,'Propietario',1,1,'C',1); 
    
            $pdf->SetFont('helvetica','',10);
    
            $vehiculos = Vehiculo::all();
    
            foreach($vehiculos as $vehiculo){
                $pdf->Cell(10,6,$vehiculo->id,1,0,'C');
                $pdf->Cell(60,6,$vehiculo->placa_vehiculo,1,0,'C');
                $pdf->Cell(35,6,$vehiculo->marca_vehiculo,1,0,'C');
                $pdf->Cell(35,6,$vehiculo->year_vehiculo,1,0,'C');
                $pdf->Cell(35,6,$vehiculo->idPropietario,1,1,'C');
            }
    
            $pdf->Output('Reporte-Vehiculos'.date('d_m_y').'.pdf', 'I'); 
    
        }
    }

    