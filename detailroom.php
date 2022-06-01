<?php include('include/currentPage_header.php') ?>

<?php 
include('admin/conn/database.php');
$sqlcatar=$db->query("SELECT *,rooms.id as id_room FROM rooms inner join cotegorie on rooms.fkcategorie=cotegorie.id left join  images_room on rooms.id= images_room.idroom where rooms.id='".$_GET['room']."'");
$rxar=$sqlcatar->fetch();
?>


<div class="card card-solid">
        <div class="card-body">
          <div class="row">

            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none"></h3>
              <div class="col-12">
                <img src="admin/vues/roomImages/<?php echo $rxar['images']?>" class="product-image" alt="Product Image">
              </div>
              <div class="col-12 product-image-thumbs">
                <?php
              $sqlcatari=$db->query("SELECT * from  images_room  where images_room.idroom='".$_GET['room']."'");
            while($rxari=$sqlcatari->fetch()){
              ?>
              <div class="product-image-thumb">   <img src="admin/vues/roomImages/<?php echo $rxari['images']?>"  alt="Product Image"></div>
            
              <?php } ?>
              </div>
            </div>



            <div class="col-12 col-sm-6">
              <h3 class="my-3">Categorie:<?php echo $rxar['nom_categorie'] ?></h3>
              <div id="displaydata">
              <p><?php echo $rxar['resume'] ?></p>
              </div>
              <hr>
            

              <div class="bg-gray py-2 px-3 mt-4 form-inline">
                <h2 class="mb-0">
                  Prix en Fbu:<small>  <?php echo $rxar['price_local'] ?> BIF </small>
                </h2>
                
                <h2 class="mb-0">
                  Prix en $:<small> $<?php echo $rxar['prix_en_dolar'] ?> </small>
                </h2>
                <button type="button" onclick="book(<?php echo $rxar['id_room'] ?>)" class="btn btn-outline-success btn-sm"> <i class="fa fa-send"></i> Resérver</button>

              </div>
              </div>
<!-- 
              <div class="mt-4">
                <div class="btn btn-primary btn-lg btn-flat">
                  <i class="fas fa-cart-plus fa-lg mr-2"></i>
                  Add to Cart
                </div>

                <div class="btn btn-default btn-lg btn-flat">
                  <i class="fas fa-heart fa-lg mr-2"></i>
                  Add to Wishlist
                </div>
              </div>

              <div class="mt-4 product-share">
                <a href="#" class="text-gray">
                  <i class="fab fa-facebook-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fab fa-twitter-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-envelope-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-rss-square fa-2x"></i>
                </a>
              </div>

            </div>
          </div> -->
          <!-- <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae condimentum erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed posuere, purus at efficitur hendrerit, augue elit lacinia arcu, a eleifend sem elit et nunc. Sed rutrum vestibulum est, sit amet cursus dolor fermentum vel. Suspendisse mi nibh, congue et ante et, commodo mattis lacus. Duis varius finibus purus sed venenatis. Vivamus varius metus quam, id dapibus velit mattis eu. Praesent et semper risus. Vestibulum erat erat, condimentum at elit at, bibendum placerat orci. Nullam gravida velit mauris, in pellentesque urna pellentesque viverra. Nullam non pellentesque justo, et ultricies neque. Praesent vel metus rutrum, tempus erat a, rutrum ante. Quisque interdum efficitur nunc vitae consectetur. Suspendisse venenatis, tortor non convallis interdum, urna mi molestie eros, vel tempor justo lacus ac justo. Fusce id enim a erat fringilla sollicitudin ultrices vel metus. </div>
              <div class="ta-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla turpis elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris ornare, eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a sapien eget, ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel id dui. Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum. </div>
              <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit, at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div>
            </div>
          </div> -->
        </div>
        <!-- /.card-body -->
      </div>
<script>
  $(document).ready(function() {
    
    $('.product-image-thumb').on('click', function () {
      var $image_element = $(this).find('img')
      $('.product-image').prop('src', $image_element.attr('src'))
      $('.product-image-thumb.active').removeClass('active')
      $(this).addClass('active')
    })
  })


 


  function book(element){
$.ajax({
    url: "client/booking.php",
    type: "POST",
    data: {
        element:element},
  timeout: 10000,
    beforeSend: function() {
        $("#displaydata").html("loading data...");
    },
    success: function(t) {
        $("#displaydata").html(t);    
        }
        ,
  error:function(t) {
    $("#displaydata").html(" no data to display!!!");
    }
});
}



function singup(element){
$.ajax({
    url: "signup.php",
    type: "POST",
    data: {
        element:element},
  timeout: 10000,
    beforeSend: function() {
        $("#displaydata").html("loading data...");
    },
    success: function(t) {
        $("#displaydata").html(t);    
        }
        ,
  error:function(t) {
    $("#displaydata").html(" no data to display!!!");
    }
});
}
</script>


     