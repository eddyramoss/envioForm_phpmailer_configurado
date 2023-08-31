<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPmailer/Exception.php';
require 'PHPmailer/PHPMailer.php';
require 'PHPmailer/SMTP.php';

//Create an instance; passing `true` enables exceptions
try {
    $mail = new PHPMailer(true);
    $mail->IsSMTP(); // habilita SMTP
    $mail->SMTPDebug = 1; // debugging: 1 = errores y mensajes, 2 = sólo mensajes
    $mail->SMTPAuth = true; // auth habilitada
    $mail->SMTPSecure = 'ssl'; // transferencia segura REQUERIDA para Gmail
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        );
    $mail->Port = 465; // or 587
    $mail->IsHTML(true);
    $mail->Username = "eddyinf6057@gmail.com";
    $mail->Password = "erjdovlizndpzvcu";
    $mail->SetFrom("eddyinf605@gmail.com");
    $mail->Subject = "Test";
    $mail->Body = "saludo";
    $mail->AddAddress("eddyinf6057@gmail.com");


    //content
    $mail->Subject = 'mensaje de prueba desde form_valido';
    $mail->Body = 'This body the html <b>in bold</b>';



    $mail->send();
    echo 'Mensaje enviado solo con phpmailer con exito';
    echo 'este formulario de envio se configuro correctamente';
    echo 'Si desea implementar a un formulario de envio debe configurar los inputs';
    echo 'aca mismo con los nombres del formulario';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

//eddyinf6057@gmail.com  erjdovlizndpzvcu
//cuando se suba a producción cambiar
//$mail->SMTPDebug = 0;
//si prefieres utilizar TLS, cambia SSL a tls y utiliza el puerto 587.
