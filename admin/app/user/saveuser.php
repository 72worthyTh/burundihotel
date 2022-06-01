<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
   require_once('../../vendor/phpmailer/phpmailer/src/Exception.php');
   require_once('../../vendor/phpmailer/phpmailer/src/PHPMailer.php');
   require_once('../../vendor/phpmailer/phpmailer/src/SMTP.php');
   require_once ('../../vendor/autoload.php');
require_once('../../conn/database.php');
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$phone=$_POST['phone'];
$to=$_POST['mail'];
$code= rand(1000,100000);
$sql1=$db->query("INSERT INTO admin( nom, prenom,tel,email,verificationcode) VALUES ('$nom','$prenom','$phone','$to','$code')");
$idroom=$db->lastInsertId();
if(isset($idroom)){
  
    $subject='Activation Compte';
    $message='Cher utilisateur '.$nom.' '.$prenom.' votre code de verification est :'.$code.' pour activer et creer votre mot de passe crique
    ici <a href=http://192.168.43.135/burundihotel/admin/confirmuser.php>continuer pour activer votre compte</a>';
    // More headers
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'lionelirankunda080@gmail.com';                     //SMTP username
    $mail->Password   = 'ndayinginga';                               //SMTP password
    //$mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->SMTPAutoTLS = true; 
    $mail->Port = 587;                                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('lionelirankunda080@gmail.com', 'Hotel');
    $mail->addAddress($to, $nom.' '.$prenom);     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject =$subject;
    $mail->Body    = $message;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

   if($mail->send()){
    echo '<div style="text-align:center;color:green;font-size:30px">votre Compte est bien créé</div></div>
    <div class="panel-body">le code de confirmation de 5 chiffre à été envoyé sur le mail:'.$to.'</div></div>';
   }
   else{
    echo   '<div style="text-align:center;color:green;font-size:30px">Echec de création</div></div>
    <div class="panel-body">le code de confirmation de 5 chiffre à été envoyé sur le mail:'.$to.'</div></div>'; 
}
} 
catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}  
}




                