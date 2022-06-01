<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
   require_once('admin/vendor/phpmailer/phpmailer/src/Exception.php');
   require_once('admin/vendor/phpmailer/phpmailer/src/PHPMailer.php');
   require_once('admin/vendor/phpmailer/phpmailer/src/SMTP.php');
   require_once ('admin/vendor/autoload.php');

include('admin/conn/database.php');
    //  user - details
    $firstname =  $_POST['firstname'];
    $lastname =  $_POST['lastname'];
    $to =  $_POST['email'];
    $contactno =  $_POST['phone'];  
    $gender =  $_POST['gender'];
    $password =  $_POST['password'];
    $confirmPassword =  $_POST['conformPassword'];
    $code= rand(10000,100000);



    // profile image upload
    $profileImageName = $_FILES["profileImage"]["name"];
    $tempname = $_FILES["profileImage"]["tmp_name"];   
    $folder = "assets/picture/profiles/".$profileImageName;
         


    // $re_pass = base64_encode(mysqli_real_escape_string($conn, $_POST['reg_pass']));

    $User_details="SELECT * FROM users_details WHERE Firstname='$firstname' OR Email='$to'";
    $result=$db->query($User_details);;
    $num=$result->rowCount();

  

    if ($firstname == "admin") {
        echo "Invalid Username (You cannot use the username as admin!)";
       
    } else if ($num>0) {
        echo 'Username or email id is already taken!';
  
    } else {

        // $number = preg_match('@[0-9]@', $password);
        // $uppercase = preg_match('@[A-Z]@', $password);
        // $lowercase = preg_match('@[a-z]@', $password);
        // $specialChars = preg_match('@[^\w]@', $password);
       
        // if(strlen($password) < 3 || !$number || !$uppercase || !$lowercase || !$specialChars) {

         //password validation 

          if(strlen($password) < 3) {
                $error = "Password must be at least 3 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
                error("signup.php",$error);
          }else{

              if($password!=$confirmPassword){
                    $error = "Invalid password and confirm password !";
                    error("signup.php",$error);
              }else{

                    // query validation
                    $insert="insert into users_details (FirstName,LastName,Email,Password,ContactNo,Gender,ProfileImage,activecode) values('$firstname','$lastname','$to','$password','$contactno','$gender','$profileImageName','$code') " ;

                    if($db->query($insert))
                    {
                        if(!move_uploaded_file($tempname, $folder)){
                            echo "Error in Registration ...! Try after sometime";
                          
                        }else{
               //start mail validation send
               $subject='Activation Compte';
               $message='Cher utilisateur '.$firstname.' '.$lastname.' votre code de verification est :'.$code.' pour activer et creer votre mot de passe crique
               ici <a href=http://192.168.43.135/burundihotel/confirmation.php>continuer pour activer votre compte</a>';
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
               $mail->addAddress($to, $firstname.' '.$lastname);     //Add a recipient
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
               
               //End





                        }
                    }
                    else{
                          echo "Error in Registration ...! Try after sometime";
                          

                  }

              }
          }
        
   }


   ?>