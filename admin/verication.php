<?php 
include('conn/database.php');

$del = $db->prepare("SELECT * FROM admin  where  verificationcode='".$_POST['code']."'");
$del->execute();
$count = $del->rowCount();
if($count==1){
    echo '1';
}
else{
    echo '0';
}

?>