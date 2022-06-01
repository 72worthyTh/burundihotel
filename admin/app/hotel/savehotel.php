<?php
                include('../../conn/database.php');
                $nomhot=htmlentities($_POST['nomhot']);
                $lieu=htmlentities($_POST['lieu']);
                $telephone=htmlentities($_POST['telephone']);
                $email=htmlentities($_POST['email']);
                $telephonelum=htmlentities($_POST['telephonelum']);
                $telephoneco=htmlentities($_POST['telephoneeco']);
                $description=$_POST['description'];
                $b = getimagesize($_FILES["photo"]["tmp_name"]);
                //Check if the user has selected an image
                if($b !== false){
                    //Get the contents of the image
                    $Fr_Type= $_FILES['photo']['type'];
                    $file = $_FILES['photo']['tmp_name'];
                    $image = file_get_contents($file);
                } 

                $idv=0;
                //echo 'good';
                $idv=0;
                if( $idv==0){
                $sql="INSERT INTO hotel(nom_hotel, lieu_hotel, tel_hotel, email_hotel,photo_hotel,typephoto,desc_hotel,tel_lum,tel_eco) values(?,?,?,?,?,?,?,?,?)";
                $stmt=$db->prepare($sql);
                // 	 //echo $sql;    
                if($stmt->execute(Array($nomhot,$lieu,$telephone,$email,$image,$Fr_Type,$description,$telephonelum,$telephoneco))){
                echo 'bien enregistré';
                }else{
                echo 'Echec';   
                }
                }else{
                $sql="UPDATE hotel set  nom_hotel=?, lieu_hotel=?, tel_hotel=?, email_hotel=?,typephoto=?,desc_hotel=? where id=?";
                $stmt=$db->prepare($sql);
                // 	 //echo $sql;    
                if($stmt->execute(Array($nomhot,$lieu,$telephone,$email,$Fr_Type,$description,$idv))){
                echo 'bien modifié';
                }else{
                echo 'Echec';   
                } 
                }