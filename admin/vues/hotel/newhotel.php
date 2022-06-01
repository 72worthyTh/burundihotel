<?php if($_POST['newhot']){?>



            <!-- general form elements -->
            <form class="col-sm-12" id="hotelform" enctype="multipart/form-data">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Mise à jour du hotel</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             
                <div class="card-body ">
                  <div class="row mb-3">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nom hotel</label>
                    <input type="text" name="nomhot" class="form-control" id="hotelnom" placeholder="entrer le nom">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Lieu</label>
                    <input type="text" name="lieu" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Telephone</label>
                    <input type="tel" name="telephone" class="form-control" id="exampleInputPassword1" placeholder="telephone">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Télephone Lumicash</label>
                    <input type="tel" name="telephonelum" class="form-control" id="exampleInputPassword1" placeholder="telephone">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Télephone Ecocash</label>
                    <input type="tel" name="telephoneeco" class="form-control" id="exampleInputPassword1" placeholder="telephone">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Photo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="photo" class="form-control" id="exampleInputFile">
                      </div>
                     
                    </div>
                  </div>
                </div>
                 <div class="col-sm-8" >
                   <label for="">Description du hotel</label>
                  <textarea  name="description" id="description" class="form-control" style="width:100%;height: 300px"></textarea>
                  </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button" id="savehot" class="btn btn-primary">Enregistre</button>
                  <button type="button" class="btn btn-primary">Modifier</button>
                </div>
          
            </div>
            </form>
    <?php }?>



    <script>


$(function () {
    //Add text editor
    $('#description').summernote()
  })
$('#savehot').click(function(){ 

    var formData = new FormData($("#hotelform")[0]); 
   $.ajax({ 
     url: 'app/hotel/savehotel.php', 
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

}); 





    </script>