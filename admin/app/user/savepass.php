<?php
require_once('../../conn/database.php');
$code=$_POST['code'];
$pass=md5($_POST['pass1']);
$etat= 1;
$sql1=$db->query("UPDATE  admin set password='$pass',etat='$etat' where verificationcode='$code'");
$count = $sql1->rowCount();
if($count==1){

  echo'  <div class="alert alert-success alert-dismissible fade show">
        <strong>Success!</strong> Votre compte est bien enregistré.
       <a href="login.php"> <button type="button" class="btn-close" data-bs-dismiss="alert">Login</button></a>
    </div>';
}
else{
 echo '<div class="alert alert-danger alert-dismissible fade show">
 <strong>Error!</strong> A problem has been occurred while submitting your data.
 <a href="confirmuser.php"> <button type="button" class="btn-close" data-bs-dismiss="alert">Retour</button></a>
</div>';
}
?>