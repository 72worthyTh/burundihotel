<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Recover Password (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="index2.html" class="h1"><b>Admin</b>LTE</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg" id="codep">code de confirmation</p>
      <form id="passform">

      <div class="input-group mb-3">
          <input type="number" class="form-control" onkeyup="verication()" id="code" name="code" placeholder="inter your code verification">
          <br><br>
         <i id="error"></i>
        </div>

<div id='blocpass'>
   

      
      
        <div class="row">
          <div class="col-12">
            <button type="button" onclick="savepass()" class="btn btn-primary btn-block">activer</button>
          </div>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <div id="datadisplaydata">ggg <div>
    <!-- /.login-card-body -->
  </div>



</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="admin/dist/js/adminlte.min.js"></script>
</body>
</html>
<script>
$('#blocpass').hide();
function verication(){
    if($('#code').val().length==5){
    $.ajax({
method:'POST',
url:'verication.php',
data:{code:$('#code').val()},
success:function(data){
if(data==1){
$('#blocpass').show();
$('#code').hide() 
$('#codep').hide()
$('#error').html('Code verifié');
 $('#error').css('color','green');    
}
else{
    $('#error').html('code non valide! reverifier votre mail');
    $('#error').css('color','red'); 
}
}



    })
}
else{

    $('#error').html('le code est composé par 5 chiffre');
    $('#error').css('color','red'); 
}



}

function vericationpass(){
    if($('#pass1').val().length<6){
        $('#pass1').css('border-color','red')
        $('#info1').html('<br><i>mot de pass doit etre ou mois 6 caractères</i>')

    }
    else{
        $('#pass1').css('border-color','black')
        $('#info1').html('')  
    }

    if($('#pass1').val()!=$('#pass2').val()){
        $('#pass2').css('border-color','red')
        $('#info2').html('<br><i>mot de passe non identique</i>')

    }
 

}
function savepass(){
var formData = $("#passform").serialize();
   $.ajax({ 
    type: 'POST',
     url: 'activer.php', 
     data: formData, 
success:function(data){  
$('form').trigger("reset"); 
$('#datadisplaydata').html(data)
$('#blocpass').hide();
//alert(data)

}})

}

</script>
