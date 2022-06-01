<?php
   require_once('../../conn/database.php');
    session_start();
	//require_once('connexiondb.php');
    $email=isset($_POST['email'])?$_POST['email']:"";
    $pwd=isset($_POST['pwd'])?$_POST['pwd']:"";

	$requete="SELECT * FROM admin WHERE email='$email' AND password=md5('$pwd')";
    $resultat=$db->query($requete);

    if($user=$resultat->fetch())
    {
       if($user['etat']==1)
       {
           $_SESSION['user']=$user;
       
		echo '1' ;
       }
       else
       {
           echo '2';
       }
    }
    else
    {
       echo '3';
    }
  
?>