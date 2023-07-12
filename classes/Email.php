<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email
{

    public $correo;
    public $nombre;
    public $token;
    public function __construct($correo, $nombre, $token)
    {
        $this->correo = $correo;
        $this->nombre = $nombre;
        $this->token = $token;

    }
    public function enviarConfirmacion()
    {
        //Crear el objeto de email 
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '1337662b196016';
        $mail->Password = '80a88182cfe522';
        $mail->setFrom('cuentas@talleraka.com');
        $mail->addAddress('cuentas@talleraka.com', 'talleraka.com');
        $mail->Subject = "Confirmar cuenta";

        //HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= "<p><strong>Hola, cuenta de " . $this->correo .  "</strong> Cuenta creada correctamente</p>";      
        $contenido .= "<p>Si no solicito una cuenta, haga caso omiso</p>";
        $contenido .= '</html>';
        $mail->Body = $contenido;


        //Enviar el correo
        $mail -> send();
        
    }
}