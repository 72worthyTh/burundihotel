<?php
//session_start();
	// DB credentials.

global $db;
       try{
	$db = new PDO ('mysql:host=localhost;dbname=burundihotel','root','');
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$db->exec("SET CHARACTER SET utf8 ");
     }catch(PDOEXCEPTION  $c){
	
	 echo "Error ".$c->getMessage();
	 exit();
	 
	}



 
?>