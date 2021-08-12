<?php

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
//Importar clases de PHPMailer en el espacio de nombres global
//Deben estar en la parte superior de su secuencia de comandos, no dentro de una función.
class EmailController
{
    public $nombres ;
    public $correo;
    public  $celular;
    public  $psicologa;
    public  $fechaCita;
    public  $horaCita;
    public  $edad;
    public  $especialidad;
    public  $consulta;
    public  $tipdoc;
    public  $nrodoc;
    public  $tutor;

    public function __construct($dataSend)
    {
        $this->nombres = $dataSend['nombres'] . ' '. $dataSend['paterno'] . ' ' . $dataSend['materno'];
        $this->correo = $dataSend['correo'];
        $this->celular = $dataSend['celular'];
        $this->psicologa = $dataSend['psicologa'];
        $this->fechaCita = $dataSend['fechaCita'];
        $this->horaCita = $dataSend['horaCita'];
        $this->edad = $dataSend['edad'];
        $this->especialidad = $dataSend['especialidad'];
        $this->consulta = $dataSend['consulta'];
        $this->tipdoc = $dataSend['tipdoc'];
        $this->nrodoc = $dataSend['nrodoc'];
        $this->tutor = $dataSend['tutor'];
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
            $mail->setFrom($this->correo , $this->nombres);
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
            
            
            $mail->Body = "Ha recibido un mensaje de la página web de la empresa " . $_ENV['APP_NAME'] . ".<br>
            La persona: ". $this->nombres. " con " . $this->tipdoc . ": ". $this->nrodoc. " solicita una cita el dia " . $this->fechaCita . " a las " . $this->horaCita . " para la psicológa: " . $this->psicologa ."<br>
            Mas informacion: <br>
            <strong>Información de contacto:</strong><br>
                Nombre " . $this->nombres. ".<br>
                Documento " . $this->nrodoc. ".<br>
                Celular: " .  $this->celular . ".<br>
                Correo: " .  $this->correo . ".<br>
                Tutor: " .  $this->tutor . ".<br>
                Edad: " .  $this->edad. ".<br>
            <strong>Informacion de la cita</strong><br>
                Especialidad: " . $this->especialidad . ".<br>
                Consulta: " .  $this->consulta . ".<br>
                Psicológa: " .  $this->psicologa . ".<br>
                Fecha: " .  $this->fechaCita . ".<br>
                Hora: " .  $this->horaCita . ".<br><br>
                <strong>Responder la Consulta </strong>: <a href='mailto:". $this->correo ."'></a> ";            
        
    
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
