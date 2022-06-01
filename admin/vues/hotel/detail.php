<?php 
include('../../conn/database.php');
$sql=$db->query("SELECT * from hotel");
$row=$sql->fetch();

?>

  <!-- Post -->
  <div class="post">
                      
                      <!-- /.user-block -->
                      <div class="row mb-3">
                      <div class="col-sm-6">
                          <img class="img-fluid" src="dist/img/photo1.png" alt="Photo">
                          <?php  echo '<img src="data:'.$row['typephoto'].';base64,'.base64_encode($row['photo_hotel']).'" class="img-fluid"/>';?>

                        </div>
                        <div class="col-sm-6">
                      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Infos de base du hotel</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                        <div class="user-block">

                        <span class="username">
                          <a href="#"><?php echo $row['nom_hotel']?></a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                   </div>
                    <br>
                   <br>
                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted"><?php echo $row['lieu_hotel']?></p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Contacts</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">Telephone:  </span><Strong><?php echo $row['tel_hotel']?></Strong><br>
                  <span class="tag tag-success">Email:  </span><strong><?php echo $row['email_hotel']?></strong>
                 
                </p>

                <hr>
<strong><i class="fas fa-pencil-alt mr-1"></i> Mode de payement</strong>

<p class="text-muted">
  <span class="tag tag-danger">Lumicash:  </span><Strong><?php echo $row['tel_lum']?></Strong><br>
  <span class="tag tag-success">EcoCash:  </span><strong><?php echo $row['tel_eco']?></strong>
 
</p>

                
              </div>
              <!-- /.card-body -->
            </div>


            </div>
                      
                      </div>
                      <!-- /.row -->

                     
                      </p>

                    </div>