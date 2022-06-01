<?php
 include('../../conn/database.php');
$title=$_POST['bedding'];
$folder="../../vues/sliderImages/";
$desc=$_POST['description'];

    $file_loc = $_FILES['photoch']['tmp_name'];
    // $file_size = $_FILES['file']['size'][$i];
    // $file_type = $_FILES['file']['type'][$i];
    $file = rand(1000,100000)."-".$_FILES['photoch']['name'];
    if(move_uploaded_file($file_loc,$folder.$file)){
        $sql1=$db->query("INSERT INTO slide_images( image_name, desc_image,title) VALUES ('$file','$desc','$title')");
        $idroom=$db->lastInsertId();
        echo $idroom;
    };
 
                