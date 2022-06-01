<?php
                include('../../conn/database.php');
$fkcategorie=$_POST['fkcategorie'];
$bedding=$_POST['bedding'];
$folder="../../vues/roomImages/";
$desc=$_POST['description'];
$sql1=$db->query("INSERT INTO rooms( fkcategorie, bedding,resume) VALUES ('$fkcategorie','$bedding','$desc')");
$idroom=$db->lastInsertId();

for($i=0;$i<count($_FILES['photoch']['name']);$i++){
    $file_loc = $_FILES['photoch']['tmp_name'][$i];
    // $file_size = $_FILES['file']['size'][$i];
    // $file_type = $_FILES['file']['type'][$i];
    $file = rand(1000,100000)."-".$_FILES['photoch']['name'][$i];
    if(move_uploaded_file($file_loc,$folder.$file)){
        $sql=$db->query("INSERT INTO images_room(idroom,images) VALUES ($idroom,'$file')");

    };
 }
                