                  
                  <form id="roomform" enctype="multipart/form-data">
                  
                  <div class="bootstrap-timepicker">
                  <div class="form-group">
                    <label>Categorie Chambre:</label>

                    <div class="input-group date" id="fkcategorie" data-target-input="nearest">
                      <select onchange="getprix()" name="fkcategorie" class=" select2bs4 form-control"  id="selectcat">


                      </select>
                      <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                          <div class="input-group-text"> <button type="button" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-plus-circle"></i></button></div>
                      </div>
                      </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
                </div>


                <div class="bootstrap-timepicker">
                  <div class="form-group">
                    <label>Prix local</label>

                    <div class="input-group date" id="timepicker" data-target-input="nearest">
                      <input readonly type="text" class="form-control " id="prix"/>
                      
                      </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
                </div>

                <div class="bootstrap-timepicker">
                  <div class="form-group">
                    <label>Prix en dollar</label>

                    <div class="input-group date" id="timepicker" data-target-input="nearest">
                      <input readonly type="text" class="form-control " id="prix2"/>
                      
                      </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
                </div>

                <div class="bootstrap-timepicker">
                  <div class="form-group">
                    <label>Nomble de lits</label>

                    <div class="input-group date" id="timepicker" data-target-input="nearest">
                      <input  type="number" name="bedding" min='1' class="form-control " id="prix2"/>
                      
                      </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
                </div>


                <div class="">
                  <div class="form-group">
                    <label>Description</label>

               
                      <textarea  type="number" name="description" rows="5" class="form-control "></textarea>
                      
                    
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
                </div>

                <div class="form-group">
          <table id="photochambre" class="table">
         <tr><td>Photo 1</td><td><input type="file" id='file_1' class="form-control" name="photoch[]"></td></tr>

          </table>
          <button type="button" id="addrowphoto" class="btn-success float-right" ><i class="fa fa-plus-circle"></i></button>

        </div><br><br>
        <button type="button" class="btn btn-success float-right" id="saveroom" ><i class="fa fa-save"></i> Enregistrer</button>
        </form>

<!---modal pour ajouter une categorie chambre--->
         <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Ajout catégorie </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
      <div class="panel-body">
         <form id="catform">
            <table id="table_categorie" class="table table-bordered">
            <thead><th>Nom Categorie</th><th>Prix Local</th><th>Prix en ($)</th><th></th></thead>
            <tbody>
            <tr>

            <td> 
            <input type="hidden" class="items">       
            <input type="text" name="nom_categorie[]" id="nom_cat_1" class="form-control" id="inputName" placeholder="nom">
            </td> 
            <td>  
            <input type="number" name="ploc[]" id="pl_1" class="form-control" id="inputEmail" placeholder="prix local">
            </td>  
            <td>
            <input type="text" name="dollar[]" id="pd_1" class="form-control" id="inputName2" placeholder="prix en dollar">
            </td>
            </tr>
            </tbody>
            </table>
                   
              <button type="button" id="addrow" class="float-right" ><i class="fa fa-plus-circle"></i></button>
            </form>
     
      </div>
             <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" onclick="savecate()" class="btn btn-primary">Save changes</button>
            </div>
    </div>

  </div>
</div>


<script>
$('#addrow').on('click',function(){
$count=$('.items').length;
let $html='';
$html+='<tr><td> <input type="hidden"  class="items"><input type="text" id="nom_cat_'+$count+'" name="nom_categorie[]" class="form-control"  placeholder="nom"></td>';

$html+='<td> <input type="number" id="pl_'+$count+'" name="ploc[]" class="form-control"  placeholder="prix local"></td>'; 

$html+='<td> <input type="number" id="pd_'+$count+'" name="dollar[]" class="form-control" placeholder="prix en dollar"></td>';

$html+='<td> <button type="button" id="'+$count+'" class="btn-danger rmcat" ><i class="fa fa-times-circle"></i></button></td></tr>'
$('#table_categorie').append($html);         

})




$('#addrowphoto').on('click',function(){
$countp=$('.itemsp').length;
let $htmlp='';
$htmlp+='<tr class="itemsp"><td>Photo'+$countp+'</td>';
$htmlp+='<td><input type="file" id="file_'+$countp+'" name="photoch[]" class="form-control " id="inputName" placeholder="nom"></td>';
$htmlp+='<td><button type="button" id="'+$countp+'" class="btn-danger remove_rowph" ><i class="fa fa-times-circle"></i></button></td></tr>' 

$('#photochambre').append($htmlp);         

})

$(document).on('click', '.remove_rowph', function() {
    var row_id = $(this).attr("id");
    $(this).closest('tr').remove();
    countp--;
});

$(document).on('click', '.rmcat', function() {
    var row_id = $(this).attr("id");
    $(this).closest('tr').remove();
    countp--;
   
});
    

autocatselect();
    function autocatselect(){
     
    let selectcat='selectcat';
    //alert(selectcat)
$.ajax({
    url: "vues/rooms/autocatselect.php",
    type: "POST",
    data: {
      selectcat:selectcat
    },
    success: function(t) {
        $("#selectcat").html(t);    
        }
      
});
    }


function getprix(){
 
let prix=$('#selectcat').val();
//alert(prix);
  $.ajax({ 
    type: 'POST',
     url: 'vues/rooms/getprix.php', 
     data: {prix:prix}, 
success:function(data){ 
  let res =data.split('&#');
$('#prix').val(res[0]);
$('#prix2').val(res[1]);
}})
}

function savecate(){
  var formData = $("#catform").serialize();
   $.ajax({ 
    type: 'POST',
     url: 'app/room/savecat.php', 
     data: formData, 
success:function(data){  
$('form').trigger("reset"); 
autocatselect();
// Toast.fire({
// icon:"success",
// title:data
// })
alert(data)

}})}





$('#saveroom').click(function(){ 

var formData = new FormData($("#roomform")[0]); 
$.ajax({ 
 url: 'app/room/saveroom.php', 
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