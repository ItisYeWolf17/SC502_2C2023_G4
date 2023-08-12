<?php

namespace Controllers;


use Classes\Email;
use Classes\Reportes;
use MVC\Router;
use Model\Usuario;

class LoginController
{


    public static function usuarios(Router $router){
        $router->render('servicios/usuarios',[

        ]);
    }
    public static function principal(Router $router){
        $router->render('dashboard/principal');
    }

    public static function indexIni(Router $router){
        $router->render('dashboard/indexIni');
    }
    public static function login(Router $router){
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $auth = new Usuario($_POST);
            $alertas = $auth->validarLogin();

            if(empty($alertas)){
                //Comprobar que el usuario exista
                $usuario = Usuario::where('correo', $auth->correo);
                
                if($usuario){
                    //Comprobar si la clave es correcta
                    if($usuario->comprobarPassword($auth->password)){
                    //Autenticar el usuario 
                    session_start();
                    $_SESSION['idRol'] = $usuario->idRol;
                    $_SESSION['id'] = $usuario->id;
                    $_SESSION['nombre'] = $usuario->nombre_usuario. " ". $usuario->apellido_usuario;
                    $_SESSION['correo'] = $usuario->correo;
                    $_SESSION['login'] = true;
 
                    //Redireccionamiento
                    if($usuario->idRol === "1"){
                        
                        header('Location:/principal');
                    }else{
                        header('Location:/principal');
                    }
    
                }

                }else {
                    Usuario::setAlerta('error', 'Usuario no encontrado');
                }

            }

        }
        
        $alertas = Usuario::getAlertas();


        $router->render('auth/login', [
            'auth' => $auth, 
            'alertas' => $alertas
        ]);

    }
    public static function logout()
    {
        echo "Desde logout";
    }
    public static function olvide(Router $router)
    {
        $router->render('auth/olvide');
    }

    public static function crear(Router $router)
    {
        $usuario = new Usuario($_POST);

        //Alertas vacias 
        $alertas = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();

            //Revisar si ya existe
            if (empty($alertas)) {
                //Verificar que el usuario no este registrado
                $resultado = $usuario->existeUsuario();

                if ($resultado->num_rows) {
                    $alertas = Usuario::getAlertas();
                } else {
                    //Hashear los password 
                    $usuario->hashPassword();
                    //Crea tokens
                    $usuario->crearToken();
                    //Envia un email 
                    $email = new Email($usuario->nombre_usuario, $usuario->correo, $usuario->token);
                    $email -> enviarConfirmacion();

                    //Crear un usuario 
                    $resultado = $usuario->guardar();
                    if($resultado){
                        header('Location: /usuarios');
                    }

                }
            }
        }

        $router->render('auth/crear', [
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }

    public static function mensaje(Router $router){
        $router->render('auth/mensaje');
    }


    public static function updateUser(Router $router)
    {
        session_start();
        if (!is_numeric($_GET['id']))
            return;

        $usuario = Usuario::find($_GET['id']);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);
            $usuario->hashPassword();
            $usuario->guardar();
            header('Location: /usuarios');
        }
        $router->render('/auth/actualizarUsuario', [
            'usuario' => $usuario
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
        $pdf -> SetTitle('Reporte de Clientes');

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
        $pdf->Cell(85,6,'LISTA DE CLIENTES',0,0,'C');

        $pdf->Ln(10); //Salto de Linea
        $pdf->SetTextColor(0, 0, 0); 

        $pdf->SetFillColor(232,232,232);
        $pdf->SetFont('helvetica','B',12); 
        $pdf->Cell(40,6,'#',1,0,'C',1);
        $pdf->Cell(60,6,'Nombre',1,0,'C',1);
        $pdf->Cell(35,6,'Apellidos',1,0,'C',1);
        $pdf->Cell(35,6,'Cedula',1,1,'C',1); 

        $pdf->SetFont('helvetica','',10);

        $clientes = Cliente::all();

        foreach($clientes as $cliente){
            $pdf->Cell(40,6,$cliente->id,1,0,'C');
            $pdf->Cell(60,6,$cliente->nombre_propietario,1,0,'C');
            $pdf->Cell(35,6,$cliente->apellido_propietario,1,0,'C');
            $pdf->Cell(35,6,$cliente->cedula_propietario,1,1,'C');
        }

        $pdf->Output('Reporte-Clientes'.date('d_m_y').'.pdf', 'I'); 

    }
}