
<?php 
include('../../conn/database.php');
$sqlcatab=$db->query("SELECT * ,rooms.id as id_room FROM rooms inner join cotegorie on rooms.fkcategorie=cotegorie.id");

?>

<div class="card">
        <div class="card-header">
          <h3 class="card-title">Projects</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 20%">
                        Cotegorie Chambre
                      </th>
                      <th style="width: 30%">
                          Images
                      </th>
                      <th style="width: 5%">
                         Prix en fbu
                      </th>
                      <th style="width: 5%" class="text-center">
                          prix en $
                      </th>
                      <th style="width: 30%">
                      </th>
                  </tr>
              </thead>
              <tbody>

<?php
         while($rxarb=$sqlcatab->fetch()){
              ?>
                  <tr>
                      <td>
                          #
                      </td>
                      <td>
                          <?php echo $rxarb['nom_categorie'] ?>
                      </td>
                      <td>
                          <ul class="list-inline">


                              <li class="list-inline-item">

               <?php
              $sqlcataib=$db->query("SELECT * from  images_room  where images_room.idroom='".$rxarb['id_room']."'");
               while($rxarib=$sqlcataib->fetch()){
              ?>
                <img src="vues/roomImages/<?php echo $rxarib['images']?>" class="table-avatar" alt="Product Image">
              
              <?php } ?>
                </li>
                            
                          </ul>
                      </td>
                      <td class="project_progress">
                        
                          <small>
                             <?php echo $rxarb['price_local'] ?> 
                          </small>
                      </td>
                      <td class="project-state">
                      <?php echo $rxarb['prix_en_dolar'] ?> 
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" onclick="detailroom(<?php  echo $rxarb['id_room'] ?> )" >
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                          <a class="btn btn-info btn-sm" >
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                  </tr>
                 <?php }?>
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
    