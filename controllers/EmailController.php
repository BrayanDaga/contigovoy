<?php

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
//Importar clases de PHPMailer en el espacio de nombres global
//Deben estar en la parte superior de su secuencia de comandos, no dentro de una función.
class EmailController
{
    public $Nombre ;
    public $Email;
    public int $Telefono;
    public $Mensaje;
    
    public function __construct($Nombre = null, $Email, $Telefono, $Mensaje = null)
    {
        $this->Nombre  = $Nombre;
        $this->Email   = $Email;
        $this->Telefono = $Telefono;
        $this->Mensaje = $Mensaje;
    }


    public function enviarEmailValidando()
    {
        if ($_SERVER['REQUEST_URI']==='/') {
            if ($this->Email == '' || $this->Telefono == '' ||  !is_numeric($this->Telefono) ||  strlen($this->Telefono) != 9    ) {
                echo "<script>
                alert('Todos los campos no han sido rellenados o datos erroneos.');location.href ='javascript:history.back()';</script>";
            }
            else {
                $this->usarPhpMailer();
            }
        }
        elseif($_SERVER['REQUEST_URI']==='/contactanos'){
            if (
                $this->Nombre == ''
                || $this->Email == '' ||
                $this->Telefono == '' ||
                !is_numeric($this->Telefono) ||
                strlen($this->Telefono) != 9  ||
                $this->Mensaje == ''
            ) {
                echo "<script>
                        alert('Todos los campos no han sido rellenados o datos erroneos.');location.href ='javascript:history.back()';</script>";
            } else {
                $this->usarPhpMailer();
            }
        }
       
    }


    public function usarPhpMailer()
    {
        // Cargar el cargador automático de Composer
        // require 'vendor/autoload.php';

        // Crea una instancia; pasar `true` habilita excepciones
        $mail = new PHPMailer(true);

        try {

            //Configuración del servidor
            if ($_ENV['APP_ENV'] == 'local') {
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
            $mail->setFrom($this->Email, $this->Nombre);
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
            
            if ($this->Nombre != null || $this->Mensaje != null) {
                $mail->Body = "Nombre: " . $this->Nombre . ".<br>
                Telefono: " . $this->Telefono . ".<br>
                Correo: " . $this->Email . ".<br>
                Mensaje: " . $this->Mensaje . "<br><br>
                <strong>Responder la Consulta</strong>: Click al boton ''Responder'' para escribir un mensaje a " . $this->Email . ".";            
            }else {
                $mail->Body = "Ha recibido un mensaje de la página web de la empresa " . $_ENV['APP_NAME'] . ".<br>
                Numero de telefono: " . $this->Telefono . ".<br>
                <strong>Responder la Consulta</strong>: Click al boton ''Responder'' para escribir un mensaje a " . $this->Email . ".";            
            }
    
    $mail->AltBody = 'Mensaje desde la web';

            $mail->send();
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Mensaje Enviado!</strong> Formulario enviado exitosamente,le responderemos lo mas pronto posible
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
          </div>";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
