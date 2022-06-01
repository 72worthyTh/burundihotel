<?php
switch($page){
   case 'hotel':include('vues/hotel/index.php'); 
  break;
  case 'rooms':include('vues/rooms/index.php'); //echo "<script src='vues/lib/js/banque.js'></script>"; 
  break;
   case 'users':include('vues/users/index.php');// echo "<script src='vues/lib/js/cotisation.js'></script>";
  break;
  case 'sliders':include('vues/sliders/index.php'); //echo "<script src='vues/lib/js/credit.js'></script>";
  break;
  case 'res':include('vues/reservation/index.php'); //echo "<script src='vues/lib/js/credit.js'></script>";
  break;



  case 'dashboard':include('vues/home/index.php'); //echo "<script src='vues/lib/js/credit.js'></script>";
  break;
  case 'marches':include('vues/marches/index.php'); //echo "<script src='vues/lib/js/credit.js'></script>";
  break;
  case 'comptabilites':include('vues/comptabilites/index.php'); //echo "<script src='vues/lib/js/credit.js'></script>";
  break;
  case 'rh':include('vues/rh/index.php'); //echo "<script src='vues/lib/js/credit.js'></script>";
  break;
  case 'rap':include('vues/rapports/index.php'); //echo "<script src='vues/lib/js/credit.js'></script>";
  break;
  case 'garage':include('vues/garage/index.php'); //echo "<script src='vues/lib/js/credit.js'></script>";
  break;
  default:
  //include('vues/hotel/index.php');
}
?>