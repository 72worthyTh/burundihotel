<?php 
include('../../conn/database.php');
$sqlcat=$db->query("SELECT id, `nom_categorie`, `price_local`, `prix_en_dolar` FROM `cotegorie` order by id Desc");
while($rx=$sqlcat->fetch()){
?>
 <option value='<?php echo $rx['id'] ?>'><?php echo $rx['nom_categorie'] ?></option>
<?php }?>