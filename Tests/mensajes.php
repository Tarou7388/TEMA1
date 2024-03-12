<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth = true;                                   //Enable SMTP authentication
      $mail->Username = 'cuentapracticas51@gmail.com';                     //SMTP username
      $mail->Password = 'm k h j q p q u a i q q h t n q';                               //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
      //Recipients
      $mail->setFrom('cuentapracticas51@gmail.com', 'BETA');
      $mail->addAddress('jesusmattaramos@gmail.com', '');     //Add a recipient
      //$mail->addAddress('mialoyto1999@gmail.com');               //Name is optional
      //$mail->addReplyTo('info@example.com', 'Information');
      //$mail->addCC('cc@example.com');
      //$mail->addBCC('bcc@example.com');
      //Attachments
      //$mail->addAttachment('./meme.jpg');         //Add attachments
      //$mail->addAttachment('./meme.jpg', 'Informe.jpg');    //Optional name
      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Recuperacion';
      $mail->Body = 'Su token de recuperacion es: ';
      $mail->AltBody = '';
      $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}