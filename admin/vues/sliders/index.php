
<div class="card">
        <div class="card-header">
          <h3 class="card-title">IMAGES DEFFIRANTS</h3>

          <div class="card-tools">
<button type="button" class="btn btn-primary" onclick="newImage()" data-toggle="modal" data-target="#exampleModalCenter">
  <i class="fa fa-plus"></i>Nouvel Image
</button>
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0" id="liste">
            
        </div>
       </div>

       <form id="sliderform" enctype="multipart/form-data">
       <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Enregistrement Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button id="savesliders" type="button" class="btn btn-primary"><i class='fa fa-save'></i>  Enregistrer</button>
      </div>
    </div>
  </div>
</div>
       </form>

<script>
    liste();
function liste(){
$.ajax({
    url: "vues/sliders/liste.php",
    type: "POST",
  timeout: 10000,
    beforeSend: function() {
        $("#liste").html("loading data...");
    },
    success: function(t) {
        $("#liste").html(t);    
        }
        ,
  error:function(t) {
    $("#liste").html(" no data to display!!!");
    }
});
}

function newImage(){
    $.ajax({
    url: "vues/sliders/new.php",
    type: "POST",
  timeout: 10000,
    beforeSend: function() {
        $(".modal-body").html("loading data...");
    },
    success: function(t) {
        $(".modal-body").html(t);    
        }
        ,
  error:function(t) {
    $(".modal-body").html(" no data to display!!!");
    }
});   
}






$('#savesliders').click(function(){ 

var formData = new FormData($("#sliderform")[0]); 
$.ajax({ 
 url: 'app/sliders/savesliders.php', 
 type: 'POST', 
 data: formData, 
 async: false, 
 cache: false, 
 contentType: false, 
 processData: false, 

success:function(data){  
$('form').trigger("reset");  

if(data!=0){
Toast.fire({
icon:"success",
 title:'Image bien enrgistré'
 })  
}
liste();
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