<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email
{
    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion()
    {
        // Crear el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];

        $mail->setFrom("cuentas@appsalon.com");
        $mail->addAddress("cuentas@appsalon.com", "AppSalon.com");
        $mail->Subject = "Confirma tu cuenta";

        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $mail->Body = "
        <html>
        <head>
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap');
                body {
                    font-family: 'Poppins', sans-serif;
                    background-color: #ffffff;
                    max-width: 400px;
                    margin: 0 auto;
                    padding: 20px;
                }
                h1 {
                    font-size: 30px;
                    font-weight: 700;
                    margin-bottom: 20px;
                    text-align: center;
                }
                h2 {
                    font-size: 25px;
                    font-weight: 500;
                    line-height: 25px;
                }
                p {
                    line-height: 18px;
                    margin-bottom: 20px;
                }
                a.button {
                    display: inline-block;
                    padding: 0.7em 2em;
                    font-size: 16px !important;
                    font-weight: 500;
                    background: #000000;
                    color: #ffffff;
                    text-decoration: none;
                    text-transform: uppercase;
                    border-radius: 5px;
                    transition: background-color 0.3s;
                }
                a.button:hover {
                    background-color: #333333;
                }
                p.disclaimer {
                    font-size: 12px;
                    color: #666666;
                }
                div.separator {
                    border-bottom: 1px solid #000000;
                    margin-top: 40px;
                }
            </style>
        </head>
        <body>
            <h1>AppSalon</h1>
            <h2>¡Gracias por registrarte, {$this->nombre}!</h2>
            <p>Por favor, confirma tu correo electrónico para comenzar a disfrutar de todos los servicios de AppSalon.</p>
            <a class='button' href='" . $_ENV['APP_URL'] . "/confirmar-cuenta?token={$this->token}'>Verificar</a>
            <p>Si no te registraste en AppSalon, por favor ignora este correo electrónico.</p>
            <div class='separator'></div>
            <p class='disclaimer'>Este correo electrónico fue enviado desde una dirección de notificaciones y no puede recibir respuestas. Por favor, no respondas a este mensaje.</p>
        </body>
        </html>";

        $mail->send();
    }

    public function enviarInstrucciones()
    {
        // Crear el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];

        $mail->setFrom("cuentas@appsalon.com");
        $mail->addAddress("cuentas@appsalon.com", "AppSalon.com");
        $mail->Subject = "Restablecer contraseña";

        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $mail->Body = "
        <html>
        <head>
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap');
                body {
                    font-family: 'Poppins', sans-serif;
                    background-color: #ffffff;
                    max-width: 400px;
                    margin: 0 auto;
                    padding: 20px;
                }
                h1 {
                    font-size: 30px;
                    font-weight: 700;
                    margin-bottom: 20px;
                    text-align: center;
                }
                h2 {
                    font-size: 25px;
                    font-weight: 500;
                    line-height: 25px;
                }
                p {
                    line-height: 18px;
                    margin-bottom: 20px;
                }
                a.button {
                    display: inline-block;
                    padding: 0.7em 2em;
                    font-size: 16px !important;
                    font-weight: 500;
                    background: #000000;
                    color: #ffffff;
                    text-decoration: none;
                    text-transform: uppercase;
                    border-radius: 5px;
                    transition: background-color 0.3s;
                }
                a.button:hover {
                    background-color: #333333;
                }
                p.disclaimer {
                    font-size: 12px;
                    color: #666666;
                }
                div.separator {
                    border-bottom: 1px solid #000000;
                    margin-top: 40px;
                }
            </style>
        </head>
        <body>
            <h1>AppSalon</h1>
            <h2>¡Hola {$this->nombre}!</h2>
            <p>Hemos recibido una solicitud para restablecer tu contraseña en AppSalon.</p>
            <a class='button' href='" . $_ENV['APP_URL'] . " /recuperar?token={$this->token}'>Restablecer Contraseña</a>
            <p>Si no realizaste esta solicitud, puedes ignorar este correo electrónico.</p>
            <div class='separator'></div>
            <p class='disclaimer'>Este correo electrónico fue enviado desde una dirección de notificaciones y no puede recibir respuestas. Por favor, no respondas a este mensaje.</p>
        </body>
        </html>";

        $mail->send();
    }
}
