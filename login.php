

        <div class="login-form">
         <form id="loginform" enctype="multipart/form-data" >
        <h2 class="text-center mb-4">Se connecter</h2>
        <?php
                if (isset($_GET["error"])) {
                    echo '<div class="text-danger text-center">' . $_GET["error"] . '</div>';
                }
        ?>   
        <div class="form-group mt-3">
        	<div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <span class="fa fa-user"></span>
                    </span>                    
                </div>
                <input type="text" class="form-control" name="email" placeholder="Email" required="required">				
            </div>
        </div>
		<div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fa fa-lock"></i>
                    </span>                    
                </div>
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">				
            </div>
        </div>    
        <!-- <div class="clearfix mb-3">
            <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
            <a href="#" class="float-right">Forgot Password?</a>
        </div> -->

        <div class="form-group ">
            <button type="button" name="user_login" onclick="login()" class="btn btn-primary login-btn btn-block">connexion</button>
        </div>
 
		<div class="or-seperator"><i>ou</i></div>
     
        </div>
    </form>
    <p class="text-center text-muted small">vous n'avez pas du compte ? <button onclick="singup(<?php echo $_POST['element'] ?>)" type="button" class="btn btn-primary" href="signup.php">Veillez vous inscrire</button></p>

<script>


function login(){
  var formData = $("#loginform").serialize();
   $.ajax({ 
    type: 'POST',
     url: 'validation.php', 
     data: formData, 
success:function(data){  
if(data!=0){
    alert(data)
     book(<?php echo 2 ?>)
}
}})}
</script>

