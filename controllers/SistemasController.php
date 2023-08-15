<?php


namespace Controllers;

use Model\Sistema;
use MVC\Router;
use Classes\Reportes;

class SistemasController
{
    public static function sistemas(Router $router)
    {
        session_start();

        isAuth();
        $router->render('servicios/sistemas', [

        ]);
    }

    public static function addSistema(Router $router)
    {
        $router->render('servicios/agregarSistema', [

        ]);
    }

    public static function crear()
    {
        $sistema = new Sistema($_POST);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $sistema->sincronizar($_POST);
            $resultado = $sistema->guardar();
            if ($resultado) {
                header('Location: /sistemas');
            }
        }
    }

    public static function updateSistema(Router $router)
    {
        session_start();
        if (!is_numeric($_GET['id']))
            return;

        $sistema = Sistema::find($_GET['id']);


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $sistema->sincronizar($_POST);
            $sistema->guardar();
            header('Location: /sistemas');

        }
        $router->render('/servicios/actualizarSistema', [
            'sistema' => $sistema

        ]);
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
        $pdf->SetTitle('Reporte de Clientes');

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
        $pdf->Cell(85, 6, 'LISTA DE CLIENTES', 0, 0, 'C');

        $pdf->Ln(10); //Salto de Linea
        $pdf->SetTextColor(0, 0, 0);

        $pdf->SetFillColor(232, 232, 232);
        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->Cell(40, 6, '#', 1, 0, 'C', 1);
        $pdf->Cell(60, 6, 'Nombre', 1, 0, 'C', 1);
        $pdf->Cell(35, 6, 'Apellidos', 1, 0, 'C', 1);
        $pdf->Cell(35, 6, 'Cedula', 1, 1, 'C', 1);

        $pdf->SetFont('helvetica', '', 10);

        $clientes = Cliente::all();

        foreach ($clientes as $cliente) {
            $pdf->Cell(40, 6, $cliente->id, 1, 0, 'C');
            $pdf->Cell(60, 6, $cliente->nombre_propietario, 1, 0, 'C');
            $pdf->Cell(35, 6, $cliente->apellido_propietario, 1, 0, 'C');
            $pdf->Cell(35, 6, $cliente->cedula_propietario, 1, 1, 'C');
        }

        $pdf->Output('Reporte-Clientes' . date('d_m_y') . '.pdf', 'I');

    }
}