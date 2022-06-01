<?php
                include('../../conn/database.php');


for($i=0;$i<count($_POST['nom_categorie']);$i++){




   
                 $nom_cat=$_POST['nom_categorie'][$i];
                 $pl=$_POST['ploc'][$i];
                 $pdpp=$_POST['dollar'][$i];

                 
                $idv=0;
                if( $idv==0){
                $sql="INSERT INTO cotegorie (nom_categorie, price_local,prix_en_dolar) values(?,?,?)";
                $stmt=$db->prepare($sql);
                // 	 //echo $sql;    
                if($stmt->execute(Array($nom_cat,$pl,$pdpp))){
                echo 'bien enregistré';
                }else{
                echo 'Echec';   
                }
                }else{
                $sql="UPDATE cotegorie set  nom_categorie=?, price_local=?, prix_en_dolar=? where id=?";
                $stmt=$db->prepare($sql);
                // 	 //echo $sql;    
                if($stmt->execute(Array($nom_cat,$pl,$pdpp,$idv))){
                echo 'bien modifié';
                }else{
                echo 'Echec';   
                } 
                }
            }    