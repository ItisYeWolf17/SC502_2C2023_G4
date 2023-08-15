<?php


namespace Controllers;

use MVC\Router;

use Classes\Reportes;

use Model\Inventario;

class InventarioController
{
    public static function inventario(Router $router)
    {
        session_start();

        isAuth();
        $router->render('servicios/inventario', [

        ]);
    }

    public static function addProducto(Router $router)
    {
        $router->render('servicios/agregarProducto', [
        ]);
    }

    public static function updateInventory(Router $router)
    {

        function redondeo($numero){
            return round($numero/5) *5;
        }
        session_start();
        if (!is_numeric($_GET['id']))
            return;

        $producto = Inventario::find($_GET['id']);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $producto->sincronizar($_POST);
            $producto->costo_iva = $producto->costo_bruto * ($producto->iva_producto / 100 + 1);
            $producto->precio_cliente = $producto->costo_iva * ($producto->margen_utilidad/100+1) ;
            $producto->costo_iva = round($producto->costo_iva / 5) * 5;
            $producto->precio_cliente = round($producto->precio_cliente / 5) * 5;
            $producto->guardar();
            header('Location: /inventario');
        }
        $router->render('/servicios/editarProducto', [
            'producto' => $producto
  
        ]);
    }

    public static function crear()
    {
        $producto = new Inventario($_POST);

        $producto->costo_iva = $producto->costo_bruto * ($producto->iva_producto / 100 + 1);
        $producto->precio_cliente = $producto->costo_iva * ($producto->margen_utilidad/100+1) ;
        $producto->costo_iva = round($producto->costo_iva / 5) * 5;
        $producto->precio_cliente = round($producto->precio_cliente / 5) * 5;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $producto->sincronizar($_POST);
            $resultado = $producto->guardar();
            if ($resultado) {
                header('Location: /inventario');
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
        $pdf->SetTitle('Reporte de Inventario');

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
        $pdf->Cell(85, 6, 'LISTA DE PRODUCTOS', 0, 0, 'C');

        $pdf->Ln(10); //Salto de Linea
        $pdf->SetTextColor(0, 0, 0);

        $pdf->SetFillColor(232, 232, 232);
        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->Cell(10, 6, '#', 1, 0, 'C', 1);
        $pdf->Cell(20, 6, 'IVA', 1, 0, 'C', 1);
        $pdf->Cell(20, 6, 'Bruto', 1, 0, 'C', 1);
        $pdf->Cell(25, 6, 'Costos IVA', 1, 0, 'C', 1);
        $pdf->Cell(35, 6, 'Margen Utilidad', 1, 0, 'C', 1);
        $pdf->Cell(30, 6, 'Precio Cliente', 1, 0, 'C', 1);
        $pdf->Cell(20, 6, 'Stock', 1, 1, 'C', 1);

        $pdf->SetFont('helvetica', '', 10);

        $productos = Inventario::all();

        foreach ($productos as $producto) {
            $pdf->Cell(10, 6, $producto->id, 1, 0, 'C');
            $pdf->Cell(20, 6, $producto->iva_producto, 1, 0, 'C');
            $pdf->Cell(20, 6, $producto->costo_bruto, 1, 0, 'C');
            $pdf->Cell(25, 6, $producto->costo_iva, 1, 0, 'C');
            $pdf->Cell(35, 6, $producto->margen_utilidad, 1, 0, 'C');
            $pdf->Cell(30, 6, $producto->precio_cliente, 1, 0, 'C');
            $pdf->Cell(20, 6, $producto->cantidad, 1, 1, 'C');
        }

        $pdf->Output('Reporte-productos' . date('d_m_y') . '.pdf', 'I');

    }
}