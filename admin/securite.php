<?php
    session_start();
    
    if(!isset($_SESSION['user'])){
        echo '<script type="text/javascript">';
        echo 'window.location.href="login.php";';
        echo '</script>';
    } 
    $user=$_SESSION['user'];
?>