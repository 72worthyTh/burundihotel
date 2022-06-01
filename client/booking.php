<?php 
session_start();
if(!isset($_SESSION['loggedUserId'])) {
    include('../login.php');
}
else{
    include('eventBooking.php');   
}
   
?>