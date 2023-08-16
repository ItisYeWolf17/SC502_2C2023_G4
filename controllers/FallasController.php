<?php


namespace Controllers;
use Model\Sistema;
use MVC\Router;
use Classes\Reportes;
use Model\Fallas;

class FallasController
{
    public static function fallas(Router $router)
    {
        session_start();

        isAuth();
        $router->render('servicios/fallas', [

        ]);
    }

    public static function addFalla(Router $router)
    {
        $router->render('servicios/agregarFallas', [
        ]);
    }

    public static function updateFalla(Router $router)
    {
        session_start();
        function redondeo($numero){
            return round($numero/5) *5;
        }
        
        if (!is_numeric($_GET['id']))
            return;

            $falla = Fallas::find($_GET['id']);
            $sistema = Sistema::all();

            $selectedSistemaId = $falla->idSistemas;
            $nombreSistema = '';
            $sistemaId = $falla->idSistemas;

            foreach ($sistema as $sistemaFalla) {
                if ($sistemaFalla->id == $sistemaId) { // Usar $selectedSistemaId en lugar de $sistemaId
                    $nombreSistema = $sistemaFalla->nombre_sistema;
                    break;
                }
            }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $falla->sincronizar($_POST);
            $falla->precio_reparacion_iva = $falla->precio_reparacion * ($falla->iva / 100 + 1);
            $falla->precio_reparacion_iva = round($falla->precio_reparacion_iva /5)*5;
            $falla->guardar();
            header('Location: /fallas');
        }

        $router->render('/servicios/actualizarFalla', [
            'falla' => $falla,
            'nombreSistema' => $nombreSistema, 
            'selectedSistemaId' => $selectedSistemaId, 
            'sistemas' => $sistema
        ]);
    }

    public static function crear()
    {
        $falla = new Fallas($_POST);

        $falla->precio_reparacion_iva = $falla->precio_reparacion * ($falla->iva / 100 + 1);
        $falla->costo_iva = round($falla->costo_iva / 5) * 5;
 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $falla->sincronizar($_POST);
            $resultado = $falla->guardar();
            if ($resultado) {
                header('Location: /fallas');
            }
        }
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
        $pdf -> SetTitle('Reporte de Fallas');

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
        $pdf->Cell(85,6,'LISTA DE FALLAS',0,0,'C');

        $pdf->Ln(10); //Salto de Linea
        $pdf->SetTextColor(0, 0, 0); 

        $pdf->SetFillColor(232,232,232);
        $pdf->SetFont('helvetica','B',12); 
        $pdf->Cell(30,6,'#',1,0,'C',1);
        $pdf->Cell(60,6,'Nombre',1,0,'C',1);
        $pdf->Cell(35,6,'Precio',1,0,'C',1);
        $pdf->Cell(50,6,'Sistema Relacionado',1,1,'C',1); 

        $pdf->SetFont('helvetica','',10);

        $fallas = Fallas::all();

        foreach($fallas as $falla){
            $pdf->Cell(30,6,$falla->id,1,0,'C');
            $pdf->Cell(60,6,$falla->nombre_falla,1,0,'C');
            $pdf->Cell(35,6,$falla->precio_reparacion_iva,1,0,'C');
            $pdf->Cell(50,6,$falla->idSistemas,1,1,'C');
        }

        $pdf->Output('Reporte-Fallas'.date('d_m_y').'.pdf', 'I'); 

    }
}