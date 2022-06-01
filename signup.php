
        <!-- Registeration Form -->
            <form  id="sigform" enctype="multipart/form-data" autocomplete="off">
                <div class="row">
                        <div class="container mb-4">
                            <div class="picture-container">
                                <div class="picture">
                                <img src="assets/picture/icons/user.png" class="picture-src" id="wizardPicturePreview" title="">
                                <input type="file" id="wizard-picture" class="" name="profileImage" required>
                            </div>
                        <h6 class="">Choose Picture</h6>
                        
                    </div>
                    <?php
                if (isset($_GET["error"])) {
                    echo '<div class="text-danger text-center">' . $_GET["error"] . '</div>';
                }
                ?>
                </div>
               

                    <!-- First Name -->
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <input id="firstName" type="text" name="firstname" placeholder="prenom" class="form-control bg-white border-left-0 border-md" required>
                    </div>

                    <!-- Last Name -->
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <input id="lastName" type="text" name="lastname" placeholder="nom" class="form-control bg-white border-left-0 border-md" required>
                    </div>

                    <!-- Email Address -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0" >
                                <i class="fa fa-envelope text-muted"></i>
                            </span>
                        </div>
                        <input id="email" type="email" name="email" placeholder="adresse email" class="form-control bg-white border-left-0 border-md" required>
                    </div>
                   
                    <!-- Phone Number -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-phone-square text-muted"></i>
                            </span>
                        </div>
                      
                        <input type="tel" id="phone" name="phone" value="+257" class="form-control" placeholder="télephone">
                    </div>


                    <!-- Job -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-black-tie text-muted"></i>
                            </span>
                        </div>
                        <select id="gender" name="gender" class="form-control custom-select bg-white border-left-0 border-md" required>
                            <option value="">Sexe</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>

                    <!-- Password -->
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                        </div>
                        <input id="password" type="password" name="password" placeholder="Password" class="form-control bg-white border-left-0 border-md" required>
                    </div>

                    <!-- Password Confirmation -->
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                        </div>
                        <input id="passwordConfirmation" type="password" name="conformPassword" placeholder="Confirm Password" class="form-control bg-white border-left-0 border-md" required>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group col-lg-12 mx-auto mb-0">
                        <button type="button" onclick="validation()" class="btn btn-primary btn-block py-2" name="user_registration" >
                            <span class="font-weight-bold">Create your account</span>
                        </button>
                    </div>

                    <!-- Divider Text -->
                    <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                        <div class="border-bottom w-100 ml-5"></div>
                        <span class="px-2 small text-muted font-weight-bold text-muted">ou</span>
                        <div class="border-bottom w-100 mr-5"></div>
                    </div>

                    <!-- Already Registered -->
                    <div class="text-center w-100">
                        <p class="text-muted font-weight-bold">vous avez deja un compte? <button type="button" class="btn btn-primary btn-sm"  onclick="book(<?php echo $_POST['element'] ?>)" class="text-primary ml-2">se connecter</button></p>
                    </div>

                </div>
                <script>
            $('#firstName').focus();
            $('#lastName').attr("required", true);
            function validation(){
                if($('#firstName').val()==""){
                    $('#firstName').focus();
                $("[name='firstname']").attr('required',true);
                }
               else if($('#lastName').val()==""){
                $('#lastName').focus();
                $('#lastName').css('border-color','red');

               }
               else if($('#email').val()==""){
                $('#email').focus();
                $('#email').css('border-color','red');
               }else if($('#phone').val()=="")
              {
                $('#phone').focus();
                $('#phone').css('border-color','red');
              } else if($('#gender').val()==""){
                $('#gender').focus();
                $('#gender').css('border-color','red');
              }
               else if($('#password').val()==""){
                $('#password').focus();
                $('#password').css('border-color','red');
               } 
               else if($('#passwordConfirmation').val()==""){
                $('#passwordConfirmation').focus();
                $('#passwordConfirmation').css('border-color','red');
               }
               else if($('#password').val().length<6){
                $('#password').focus();
                $('#password').css('border-color','red');
                   alert('le mot de passe doit contenir ou mois 6 caractères')
               }
               else if($('#password').val()!=$('#passwordConfirmation').val()){
                alert('les deux mot de passes doivent etre identiques')  
               }
               else{
                var formData = new FormData($("#sigform")[0]); 
$.ajax({ 
 url: 'register.php', 
 type: 'POST', 
 data: formData, 
 async: false, 
 cache: false, 
 contentType: false, 
 processData: false, 
        success: function (data) {
         if(data==1){

         }else{
          alert(data);   
         }
        },
        error: function (xhr, exception) {
            var msg = "";
            if (xhr.status === 0) {
                msg = "Not connect.\n Verify Network." + xhr.responseText;
            } else if (xhr.status == 404) {
                msg = "Requested page not found. [404]" + xhr.responseText;
            } else if (xhr.status == 500) {
                msg = "Internal Server Error [500]." +  xhr.responseText;
            } else if (exception === "parsererror") {
                msg = "Requested JSON parse failed.";
            } else if (exception === "timeout") {
                msg = "Time out error." + xhr.responseText;
            } else if (exception === "abort") {
                msg = "Ajax request aborted.";
            } else {
                msg = "Error:" + xhr.status + " " + xhr.responseText;
            }
           
        }
    }); 
               }
                
                
            
            }







   
  
  // For Demo Purpose [Changing input group text on focus] (used in )

  
  
  //  User registration proile picture preview 
  $(document).ready(function(){
    // Prepare the preview for profile picture - user
        $("#wizard-picture").change(function(){
            readURL(this,'#wizardPicturePreview');
        });
        $("#wizardUpdate-picture").change(function(){
            readURL(this,'#updatePicture');
        });
        //gallery
        $("#wizardUpdate-image").change(function(){
            readURL(this,'#addNewImage');
        });
        //Room Type
        $("#roomTypeImage").change(function(){
            readURL(this,'#roomTypeImagePreview');
        });
        $("#roomTypeImageEdit").change(function(){
            readURL(this,'#roomTypeImagePreviewEdit');
        });
       $("#eventTypeImage").change(function(){
            readURL(this,'#eventTypeImagePreview');
        });
        $("#editEventTypeImage").change(function(){
            readURL(this,'#eventTypeImagePreviewEdit');
        });
      
    });
   
    function readURL(input,id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
    
            reader.onload = function (e) {
                $(id).attr('src', e.target.result).fadeIn('slow');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
                </script>
   
 
