<?php 

$server="localhost";
$username="root";
$password="";
$dbname="hotel_data1";
$con = mysqli_connect($server,$username,$password,$dbname);

if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}



?>
