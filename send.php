<style>
    body{
        color: #ffffff !important;
    }
</style>

<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.titan.email';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'contact@amoretamakeup.com';                     //SMTP username
    $mail->Password   = 'N#B4KXR\MM^%pvI';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('contact@amoretamakeup.com', 'Amoreta Make Up');
    $mail->addAddress('info@amoretamakeup.com', '');     //Add a recipient
    //$mail->addAddress('');               //Name is optional
    //$mail->addReplyTo('', '');
    //$mail->addCC('jacqueline@emporiumtranslations.com ');
    //$mail->addBCC('');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    $name = $_POST['name'];
    // $phone = $_POST['tel'];
    $email = $_POST['email'];
    // $idiomade = $_POST['idiomade'];
    // $idiomaal = $_POST['idiomaal'];
    $message = $_POST['message'];

    $html =  "
        <h1>Formulario Contacto Amoreta Make Up</h1>

        Nombre: $name<br /> 
        Email: $email <br />
        Mensaje: $message <br />
        ";

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Contacto Amoreta Make Up';
    $mail->Body    = $html;
    // ------------------------- DATOS DEL FICHERO ----------------------------------

    // if ($_FILES['fichero']) {
    //     $mail->AddAttachment($_FILES['fichero']['tmp_name'], $_FILES['fichero']['name']);
    // }
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    // $mail->send();
    // echo 'Message has been sent';
    if ($mail->Send()) {
        
        //header("Location:https://emporiumtranslations.com/");
        echo "<script type='text/javascript'>
        (function(){
           setTimeout(function(){
             window.location='index.php';
           },1);
        })();
        </script>";
 
        //echo "Message Sent!";            
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
