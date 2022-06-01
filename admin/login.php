<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>BURUNDI</b>Hotel</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>
        <div id="datadisplaydata"></div>
      <form id="loginform">
        <div class="input-group mb-3">
          <input type="email" class="form-control" onblur="vericationlogin()" id="email" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          <span id="info1"></span>
        </div>
        <div class="input-group mb-3">
          <input type="password" id="pwd" name="pwd" vericationlogin() class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <span id="info2"></span>
        </div>
        <div class="row">
          <div class="col-8">
           
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="button" onclick="login()" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgotpass.php">I forgot my password</a>
      </p>
    
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
<script>
function isEmail(email) {
  var EmailRegex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return EmailRegex.test(email);
}


function vericationlogin(){
    if($('#pwd').val().length<6){
        $('#pwd').css('border-color','red')
        $('#info1').html('<br><i>mot de pass doit etre ou mois 6 caractères</i>')

    }
    else{
        $('#pwd').css('border-color','black')
        $('#info1').html('')  
    }

    if(!isEmail($('#email').val())){
        $('#email').css('border-color','red')
        $('#info2').html('<br><i>email invalide</i>')

    }
 

}
function login(){
    if($('#pwd').val()!=" " &&$('#email').val()!=""){
    var formData = $("#loginform").serialize();
   $.ajax({ 
    type: 'POST',
     url: 'app/user/login.php', 
     data: formData, 
success:function(data){  
$('form').trigger("reset");
if(data==2){
$('#datadisplaydata').html('Votre compte est désactive')
}
else if(data==3){
$('#datadisplaydata').html('votre identification est incorrecte')
}
else if(data==1){
  window.location.href="index.php";
}

}})}
else{
vericationlogin()   
}
}

</script>