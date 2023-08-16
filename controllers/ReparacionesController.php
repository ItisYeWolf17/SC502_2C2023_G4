<?php


namespace Controllers;


use Model\Fallas;
use Model\Vehiculo;
use MVC\Router;

use Classes\Reportes;

use Model\Reparacion;

class ReparacionesController
{
    public static function reparaciones(Router $router)
    {
        session_start();

        isAuth();
        $router->render('servicios/reparaciones', [

        ]);
    }

    public static function addreparacion(Router $router)
    {

        $router->render('servicios/agregarReparaciones', [
        ]);
    }

    public static function updateReparacion(Router $router)
    {
        session_start();
  
        if (!is_numeric($_GET['id']))
            return;

            $reparacion = Reparacion::find($_GET['id']);
            $vehiculo = Vehiculo::all();
            $falla = Fallas::all();

            //Ver vehiculos
            $selectedVehiculoId = $reparacion->idVehiculos;
            $marca_vehiculo = '';
            $vehiculoId = $reparacion->idVehiculos;

            foreach($vehiculo as $vehiculoReparacion){
                if($vehiculoReparacion->id == $vehiculoId){
                    break;
                }
            }

            //Ver Fallas
            $selecteFallaId = $reparacion->idFallas;
            $nombre_falla = '';
            $fallaId = $reparacion->idFallas;

            foreach($falla as $fallaReparacion){
                if($fallaReparacion->id == $fallaId){
                    break;
                }
            }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $reparacion->sincronizar($_POST);
            $reparacion->guardar();
            header('Location: /reparaciones');
        }

        $router->render('servicios/actualizarReparacion', [
            'reparacion' => $reparacion,
            'marcaVehiculo' => $marca_vehiculo,
            'selectedVehiculoId' => $selectedVehiculoId,
            'vehiculos' => $vehiculo,
            'nombreFalla' => $nombre_falla, 
            'selectedFallaId' => $selecteFallaId, 
            'fallas' => $falla
        ]);
    }

    public static function crear()
    {
        $reparacion = new Reparacion($_POST);
 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $reparacion->sincronizar($_POST);
            $resultado = $reparacion->guardar();
            if ($resultado) {
                header('Location: /reparaciones');
            }
            
        }
        
    }


    public static function generarReporte()
    {
        $pdf = new Reportes(PDF_PAGE_ORIENTATION, 'mm', 'Letter', true, 'UTF-8', 'false');

        $pdf->SetMargins(20, 35, 25);
        $pdf->SetHeaderMargin(20);
        $pdf->setPrintFooter(false);
        $pdf->setPrintHeader(true);
        $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

        $pdf->SetCreator('Taller DBAKA');
        $pdf->SetAuthor('Taller DBAKA');
        $pdf->SetTitle('Reporte de Reparaciones');

        $pdf->AddPage();
        $pdf->SetFont('Helvetica', 'B', 12);
        //Columna derecha
        $pdf->SetXY(150, 25);
        $pdf->Write(0, 'Fecha: ' . date('d-n-y'));
        $pdf->SetXY(150, 30);
        $pdf->Write(0, 'Hora: ' . date('h:i A'));

        //Columna Izquierda
        $taller = 'Taller DBAka';
        $pdf->SetFont('helvetica', 'B', 10); //Tipo de fuente y tamaño de letra
        $pdf->SetXY(15, 20); //Margen en X y en Y
        $pdf->SetTextColor(204, 0, 0);
        $pdf->Write(0, 'Reportes');
        $pdf->SetTextColor(204, 0, 0);
        $pdf->SetXY(15, 25);
        $pdf->Write(0, 'Compañia: ' . $taller);

        $pdf->Ln(35); //Salto de Linea
        $pdf->Cell(40, 26, '', 0, 0, 'C');
        $pdf->SetTextColor(34, 68, 136);
        $pdf->SetFont('helvetica', 'B', 15);
        $pdf->Cell(85, 6, 'LISTA DE REPARACIONES', 0, 0, 'C');

        $pdf->Ln(10); //Salto de Linea
        $pdf->SetTextColor(0, 0, 0);

        $pdf->SetFillColor(232, 232, 232);
        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->Cell(50, 6, '#', 1, 0, 'C', 1);
        $pdf->Cell(50, 6, 'Falla', 1, 0, 'C', 1);
        $pdf->Cell(50, 6, 'Vehiculo', 1, 1, 'C', 1);

        $pdf->SetFont('helvetica', '', 10);

        $reparaciones = Reparacion::all();

        foreach ($reparaciones as $reparacion) {
            $pdf->Cell(50, 6, $reparacion->id, 1, 0, 'C');
            $pdf->Cell(50, 6, $reparacion->idFallas, 1, 0, 'C');
            $pdf->Cell(50, 6, $reparacion->idVehiculos, 1, 1, 'C');
        }

        $pdf->Output('Reporte-Reparaciones' . date('d_m_y') . '.pdf', 'I');

    }
}