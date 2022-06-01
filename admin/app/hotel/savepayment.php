<?php
                include('../../conn/database.php');
                $id_room=htmlentities($_POST['id_room']);
                $email=htmlentities($_POST['email']);
                $numeropay=htmlentities($_POST['numeropay']);
                $date1=htmlentities($_POST['date1']);
                $date2=htmlentities($_POST['date2']);
                $jour=htmlentities($_POST['jour']);
                $cost=$_POST['cost'];
                $cost2=$_POST['costd'];
                $payment_mode=$_POST['payment_mode'];
                $codeconf=$_POST['codeconf'];
                $etat=0;
                $messa="";
                
               
                $sql="INSERT INTO `booking_details`(`id_room`, `email_user`, `date_arrive`, `date_dep`,`mode_payement`, `montant`, `telephone_payement`, `code_transaction`, `etat`, `message`, `njour`, `montant2`)
                  values(?,?,?,?,?,?,?,?,?,?,?,?)";
                $stmt=$db->prepare($sql);
                // 	 //echo $sql;    
                if($stmt->execute(Array($id_room,$email,$date1,$date2,$payment_mode,$cost,$numeropay,$codeconf,$etat,$messa,$jour,$cost2))){
                echo 'bien enregistré';
                }