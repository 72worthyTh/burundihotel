<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new membership</p>
<p id="datadisplay"></p>
      <form id="userform">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="nom" placeholder="nom">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control" name="prenom" placeholder="prenom">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="tel" id="phone" name="phone" value="+257" class="form-control" placeholder="tel">
          <div class="input-group-append">
           
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="mail" placeholder="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="button" onclick="saveuser()" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<script src="build/js/intlTelInput.js"></script>
    <script>
    // Vanilla Javascript
    var input = document.querySelector("#phone");
    window.intlTelInput(input,({
      // options here
    }));

    $(document).ready(function() {
        $('.iti__flag-container').click(function() { 
          var countryCode = $('.iti__selected-flag').attr('title');
          var countryCode = countryCode.replace(/[^0-9]/g,'')
          $('#phone').val("");
          $('#phone').val("+"+countryCode+" "+ $('#phone').val());
       });
    });


    function saveuser(){
  var formData = $("#userform").serialize();
   $.ajax({ 
    type: 'POST',
     url: 'app/user/saveuser.php', 
     data: formData, 
success:function(data){  
$('form').trigger("reset"); 
$('#datadisplay').html(data)

//alert(data)

}})}
  </script>