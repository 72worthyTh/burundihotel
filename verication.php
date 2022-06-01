<?php 
include('admin/conn/database.php');

$del = $db->prepare("SELECT * FROM users_details  where  activecode='".$_POST['code']."'");
$del->execute();
$count = $del->rowCount();
if($count==1){
    echo '1';
}
else{
    echo '0';
}

?>