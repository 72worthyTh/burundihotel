<?php
session_start();
//include('include/functions.php');
include('admin/conn/database.php');
//if(isset($_POST['user_login'])){

    $email=$_POST['email'];
    $password=$_POST['password'];
    $select_user="select * from  users_details where Email='$email' && PassWord ='$password'";
    $result=$db->query($select_user);
    $row=$result->fetch();
    
    if(($row['Email']==$email) && ($row['PassWord']==$password))
    {
        

        $_SESSION['loggedUserName']=$row['FirstName'];
        $_SESSION['email']=$row['Email'];
        $_SESSION['telephone']=$row['ContactNo'];
        $_SESSION['loggedUserId']=$row['UserId'];
       if($_SESSION['loggedUserId']){
           echo $_SESSION['loggedUserId'];
       }
        
            
    }

?>