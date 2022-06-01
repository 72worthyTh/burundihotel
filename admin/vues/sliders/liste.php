
<?php 
include('../../conn/database.php');
$sqlcatab=$db->query("SELECT * FROM slide_images");

?>


          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 20%">
                        Title
                      </th>
                      <th style="width: 30%">
                          Images
                      </th>
                      <th style="width: 5%">
                         Description
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
                          <?php echo $rxarb['title'] ?>
                      </td>
                      <td>
                         

           
             
                <img src="vues/sliderImages/<?php echo $rxarb['image_name']?>" class="table-avatar" alt="Product Image">
              
              
                      </td>
                      <td class="project_progress">
                        
                          <small>
                             <?php echo $rxarb['desc_image'] ?> 
                          </small>
                      </td>
                     
                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" onclick="detailroom(<?php  echo $rxarb['id'] ?> )" >
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
     
        <!-- /.card-body -->
    