<?php
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
//Importar clases de PHPMailer en el espacio de nombres global
//Deben estar en la parte superior de su secuencia de comandos, no dentro de una función.
class EmailController
{

    public function enviarEmailValidando(){
            $Nombre  = $_POST['nombre'];
            $Email   = $_POST['email'];
            $Telefono= (int) $_POST['telefono'];
            $Mensaje = $_POST['mensaje'];
        
            if ($Nombre=='' 
            || $Email=='' || 
            $Telefono=='' || 
            !is_numeric($Telefono) ||
             strlen($Telefono)!=9  || 
             $Mensaje==''){ 
                echo "<script>
                    alert('Todos los campos no han sido rellenados o datos erroneos.');location.href ='javascript:history.back()';</script>";
        
            }else{
                $this->usarPhpMailer($Nombre, $Email, $Telefono, $Mensaje);
            }

    }


    public function usarPhpMailer($Nombre, $Email, $Telefono, $Mensaje)
    {
        // Cargar el cargador automático de Composer
        // require 'vendor/autoload.php';

        // Crea una instancia; pasar `true` habilita excepciones
        $mail = new PHPMailer(true);

        try {

            //Configuración del servidor
            if($_ENV['APP_DEBUG']){
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Habilitar la salida de depuración detallada
            }
            $mail->isSMTP();                                            //Enviar usando SMTP
            $mail->Host       = $_ENV['MAIL_HOST'];                     // Configurar el servidor SMTP para enviar
            $mail->CharSet = 'UTF-8';
            $mail->SMTPAuth   = true;                                   // Habilita la autenticación SMTP
            $mail->Username   = $_ENV['MAIL_USERNAME'];                     //SMTP username
            $mail->Password   = $_ENV['MAIL_PASSWORD'];                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Habilitar el cifrado TLS implícito
            $mail->Port       = $_ENV['MAIL_PORT'];                                    // Puerto TCP al que conectarse; use 587 si ha configurado `SMTPSecure = PHPMailer :: ENCRYPTION_STARTTLS`

            //Destinatario(a)
            $mail->setFrom($Email, $Nombre);
            $mail->addAddress($_ENV['MAIL_FROM_ADDRESS'], $_ENV['MAIL_FROM_NAME']);     //Add a recipient
            // $mail->addAddress('ellen@example.com');               //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Archivos adjuntos
            //$mail->addAttachment('/var/tmp/file.tar.gz');         //Agregar archivos adjuntoss
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Contenido
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Mensaje enviado desde la página';
            $mail->Body = "Nombre: " . $Nombre . ".<br>
    Telefono: " . $Telefono . ".<br>
    Correo: " . $Email . ".<br>
    Mensaje: " . $Mensaje . "<br><br>
    <strong>Responder la Consulta</strong>: Click al boton ''Responder'' para escribir un mensaje a " . $Email . ".";
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
