<?php 
include('../../conn/database.php');
$sqlcata=$db->query("SELECT id,  `price_local`, `prix_en_dolar` FROM `cotegorie` where id='".$_POST['prix']."'");
$rxa=$sqlcata->fetch();

echo  $rxa['price_local'].'&#'.$rxa['prix_en_dolar'];
?>
 