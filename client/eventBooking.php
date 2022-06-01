<?php
 
 include('../admin/conn/database.php');
 
 ?>
<!-- Navbar-->
<?php

if(!isset($_SESSION['loggedUserId'])) {
    header('Location:../login.php');
}

$eventTypeId = $_POST['element'];
$query_selectEvent  = "SELECT * ,rooms.id as id_room FROM rooms inner join cotegorie on rooms.fkcategorie=cotegorie.id where rooms.id = '$eventTypeId'";
$result =$db-> query($query_selectEvent);
while($row = $result->fetch()){


?>

        <!-- Booking Form -->

            <form id="savepayment" method="POST" enctype="multipart/form-data" autocomplete="off">
                <div class="row">
                    <div class="container mb-4">
                        <h2 class="text-center">Faite ta réservation</h2>
                        <?php
                        if (isset($_GET["error"])) {
                        echo '<div class="text-danger text-center">' . $_GET["error"] . '</div>';
                        }
                        ?>

                    </div>

                    <input type = "hidden" name = "id_room" value ="<?php echo $eventTypeId ?>" />
            

                    <!--eventType-->
                    <div class="form-group col-lg-6 mb-4">
                     
                     <div class="ml-2">
                         <label for="eventType">Categorie chambre</label>
                     </div>
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                            <i class='fas fa-door-open'></i>
                            </span>
                        </div>
                        <input id="eventType" type="text" name="eventType" value="<?php echo $row['nom_categorie'] ?>" class="form-control bg-white border-left-0 border-md" required readonly>
                    </div>
                    </div>

                    <!-- eventCost -->
                    <div class="form-group col-lg-3 mb-4">
                     
                     <div class="ml-2">
                         <label for="eventCost">prix par jour/fbu </label>
                     </div>
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                            <i class="fa fa-inr"></i>
                            </span>
                        </div>
                        <input id="eventCost" type="text" readonly value="<?php echo $row['price_local'] ?>" name="eventCost" class="form-control bg-white border-left-0 border-md" required readonly>
                    </div>
                    </div>


                    <div class="form-group col-lg-3 mb-4">
                     
                     <div class="ml-2">
                         <label for="eventCost">prix par jour/dollar </label>
                     </div>
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                            <i class="fa fa-inr"></i>
                            </span>
                        </div>
                        <input id="eventCostd" readonly type="text" value="<?php echo $row['prix_en_dolar'] ?>" name="eventCostd" class="form-control bg-white border-left-0 border-md" required readonly>
                    </div>
                    </div>

                    <!-- Email Address -->
                    <div class="form-group col-lg-12 mb-4">
                     
                     <div class="ml-2">
                         <label for="email">Email</label>
                     </div>
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0" >
                                <i class="fa fa-envelope text-muted"></i>
                            </span>
                        </div>
                        <input id="email" value="<?php echo $_SESSION['email'] ?>" type="email" name="email" placeholder="Email Address" class="form-control bg-white border-left-0 border-md" required>
                    </div>
                    </div>
                   
                    <!-- Phone Number -->
                    <div class="form-group col-lg-12 mb-4">
                     
                     <div class="ml-2">
                         <label for="phoneNumber">Enter Phone Number</label>
                     </div>
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-phone-square text-muted"></i>
                            </span>
                        </div>
                      
                        <input id="contactno" type="tel" name="contactno" value="<?php echo $_SESSION['telephone'] ?>" placeholder="Phone Number" class="form-control bg-white border-md border-left-0 pl-3" required>
                    </div>
                    </div>


                    <!-- number of guest -->
                    
                  
                       <!--checkin -->
        
                  
                    <!--Time -->
                    <div class="form-group col-lg-6 mb-4">
                     
                    <div class="ml-2">
                        <label for="eventTime">Date arrivée</label>
                    </div>
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            </span>
                        </div>
                        <input onchange="validation()" id="date1" type="date" name="date1" placeholder="Event Time" class="form-control bg-white " required>
                    </div>

                    </div>

                    <div class="form-group col-lg-6 mb-4">
                     
                    <div class="ml-2">
                        <label for="eventTime">Date Départ</label>
                    </div>
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            </span>
                        </div>
                        <input onchange="validation()"  id="date2" type="date" name="date2" placeholder="Event Time" class="form-control bg-white " required>
                    </div>
                    
                    </div>

                  
                

                  <!-- Timing -->
                  <div class="form-group col-lg-6 mb-4">
                     
                     <div class="ml-2">
                         <label for="total_hours">Nombre de jours</label>
                     </div>
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-black-tie text-muted"></i>
                            </span>
                        </div>
                       <input type="text" id="njour" name="jour" class="form-control">
                    </div>
                    </div>

                     <!-- total eventCost -->
                     <div class="form-group col-lg-3 mb-4">
                     
                     <div class="ml-2">
                         <label for="totalCost">Montant à payer</label>
                     </div>
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                            <i class="fa fa-in">FBU</i>
                            </span>
                        </div>
                        <input id="cost" readonly type="text" name="cost" value="0" class="form-control bg-white border-left-0 border-md" required readonly>
                    </div>
                    </div>
                    <div class="form-group col-lg-3 mb-4">
                     
                     <div class="ml-2">
                         <label for="totalCost">Montant à payer</label>
                     </div>
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                            <i class="fa fa-in">$</i>
                            </span>
                        </div>
                        <input id="costd" readonly type="text" name="costd" value="0" class="form-control bg-white border-left-0 border-md" required readonly>
                    </div>

                    
                   

                    </div>
                    <div class="col-md-8">
<div class="form-group">
<label for="">Methode de paiement</label>
<select name="payment_mode" id="payment_id" class="form-control" onchange="payment()">
<option value="0">Selectionner le mode de paiement</option>
<option value="1">Ecocash</option>
<option value="2">Lumicash</option>
<option value="3">Visa Card</option>
<option value="4">Paypal Card</option>
<option value="5">Swift Card</option>
<option value="6">Master Card</option>
</select>
</div>

<div id="block_payement">


</div>







</div>

                   




                    <!-- Submit Button -->
                    <div class="form-group col-lg-12 mx-auto mb-0">
                        <button type="button" onclick="savepayment()" class="btn btn-primary btn-block py-2" name="bookEvent" >
                            <span class="font-weight-bold">Book</span>
                        </button>
                    </div>


                </div>
                </form>
        </div>
    </div>
</div>

          <?php          }
                    
?>


<script  src="js/dateValidation.js"></script>
<script>
validation();
function validation(){
   
var montant = $('#eventCost').val(); 
var montant1 = $('#eventCostd').val(); 
var date1 = new Date($('#date1').val()); 
var date2 = new Date($('#date2').val()); 
var Diff_temps = date2.getTime() - date1.getTime(); 
var Diff_jours = Diff_temps / (1000 * 3600 * 24); 
 
$('#njour').val(Math.round(Diff_jours));
var p = montant*Math.round(Diff_jours);
var p2 = montant1*Math.round(Diff_jours);
$('#cost').val(p); 
$('#costd').val(p2); 
//alert(Math.round(Diff_jours))
//alert("Le nombre de jours entre les deux dates est de " + Math.round(Diff_jours) + " jours");
}

function payment(){
    var payment_id=$('#payment_id').val();


var block=''


if(payment_id==1){

block+='<div class="form-group">';
block+='<img src="client/include/eco.png" width="100px" height="50px"  class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="not find">'
block+=' <label for=""><?php $leco = $db-> query("SELECT * FROM hotel")->fetch(); echo $leco['tel_eco'] ?></label>';
block+='<div class="form-group">';

block+=' <label for="">Votre numéro</label>';
block+=' <input type="text"';
block+='  class="form-control" name="numeropay" id="" aria-describedby="helpId" placeholder="">';
block+='<small id="helpId" class="form-text text-muted">Entre votre numero utilisé pour payer votre reservation</small>'
block+='</div>'
block+='<div class="form-group">'
block+='<label for="">Code De Transaction</label>'
block+='<input type="text"'
block+='  class="form-control" name="codeconf" id="" aria-describedby="helpId" placeholder="">'
block+='<small id="helpId" class="form-text text-muted">Saisir votre code transaction envoyer après opération</small>'
block+='</div>'
$('#block_payement').html(block);

    }
    else 
    if(payment_id==2){

block+='<div class="form-group">';
block+='<img src="client/include/mic.png" width="100px" height="50px"  class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="not find">'
block+=' <label for=""><?php $lum = $db-> query("SELECT * FROM hotel")->fetch(); echo $lum['tel_lum'] ?></label>';
block+='<div class="form-group">';

block+=' <label for="">Votre numéro</label>';
block+=' <input type="text"';
block+='  class="form-control" name="numeropay" id="" aria-describedby="helpId" placeholder="">';
block+='<small id="helpId" class="form-text text-muted">Entre votre numero utilisé pour payer votre reservation</small>'
block+='</div>'
block+='<div class="form-group">'
block+='<label for="">Code De Transaction</label>'
block+='<input type="text"'
block+='  class="form-control" name="codeconf" id="" aria-describedby="helpId" placeholder="">'
block+='<small id="helpId" class="form-text text-muted">Saisir votre code transaction envoyer après opération</small>'
block+='</div>'
$('#block_payement').html(block);

    }
}

function savepayment(){alert('yoooo')

    Swal.fire({
  title: 'Do you want to save the changes?',
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: 'Save',
  denyButtonText: `Don't save`,
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  
  if (result.isConfirmed) {
  
   var formData = new FormData($("#savepayment")[0]);

   $.ajax({ 
     url: 'admin/app/hotel/savepayment.php', 
     type: 'POST', 
     data: formData, 
     async: false, 
     cache: false, 
     contentType: false, 
     processData: false, 

success:function(data){  
$('form').trigger("reset");  
// Toast.fire({
// icon:"success",
// title:data
// })
alert(data)
Swal.fire('Saved!', '', 'success')
} ,


error: function (jqXHR, exception) {
var msg = '';
if (jqXHR.status === 0) {
msg = 'Not connect.\n Verify Network.';
} else if (jqXHR.status == 404) {
msg = 'Requested page not found. [404]';
} else if (jqXHR.status == 500) {
msg = 'Internal Server Error [500].';
} else if (exception === 'parsererror') {
msg = 'Requested JSON parse failed.';
} else if (exception === 'timeout') {
msg = 'Time out error.';
} else if (exception === 'abort') {
msg = 'Ajax request aborted.';
} else {
msg = 'Uncaught Error.\n' + jqXHR.responseText;
}
// Toast.fire({
// icon:"error",
// title:msg
// })

alert(msg)
}
});  
  } else if (result.isDenied) {
    Swal.fire('Changes are not saved', '', 'info')
  }
})
}




</script>


