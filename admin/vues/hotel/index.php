
<div class="card card-solid">
<div class="card-body">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
              <a class="nav-item nav-link active" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Details</a>

                <a class="nav-item nav-link " id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Nouveau</a>
              </div>
            </nav>
            <div class="tab-content">
              <div class="tab-pane fade  " id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab" style="width: 100%;">
              <div id="newhot">

              </div>
              </div>  
              
              
              <div class="tab-pane fade show active" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
                  <div id="detaillhot"></div>
              </div>
           
          </div>
</div>




<script>
  newhotel(); 
  detailhotel(); 

function newhotel(){
    let newhot='newhot';
$.ajax({
    url: "vues/hotel/newhotel.php",
    type: "POST",
    data: {
        newhot:newhot
    },
  timeout: 10000,
    beforeSend: function() {
        $("#newhot").html("loading data...");
    },
    success: function(t) {
        $("#newhot").html(t);    
        }
        ,
  error:function(t) {
    $("#newhot").html(" no data to display!!!");
    }
});
}




detailhotel();
function detailhotel(){
    let detaillhot='detaillhot';
$.ajax({
    url: "vues/hotel/detail.php",
    type: "POST",
    data: {
        detaillhot:detaillhot},
  timeout: 10000,
    beforeSend: function() {
        $("#detaillhot").html("loading data...");
    },
    success: function(t) {
        $("#detaillhot").html(t);    
        }
        ,
  error:function(t) {
    $("#detaillhot").html(" no data to display!!!");
    }
});
}

</script>

