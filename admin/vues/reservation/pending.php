
<?php 
include('../../conn/database.php');
$sqlcatab=$db->query("SELECT *  FROM booking_details where etat=0");

?>

<div class="card">
        <div class="card-header">
          <h3 class="card-title">Réservation non encore Traiter</h3>

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
          <table class="table table-striped table-bordered" id="example1">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 20%">
                        Client
                      </th>
                      <th style="width: 30%">
                          Reservé
                      </th>
                      <th style="width: 5%">
                         Montant
                      </th>
                      <th style="width: 5%" class="text-center">
                       Nbre Jour
                      </th>
                      <th style="width: 30%">
                      Code de Transaction
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
                          <?php echo $rxarb['email_user'] ?>
                      </td>
                      <td>
                          

               <?php
             echo $rxarb['date_arrive']
              ?>
              
              <?php
             echo $rxarb['date_dep']
              ?>
              
               
                      </td>
                      <td>
                        
                    
                             <?php echo $rxarb['montant'] ?> 
                     
                      </td>
                      <td>
                      <?php echo $rxarb['njour'] ?> 
                      </td>
                      <td>
                      <?php echo $rxarb['code_transaction'] ?> 
                      </td>
                      
                  </tr>
                 <?php }?>
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
    