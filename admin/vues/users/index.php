<div class="col-md-12">
         
            <!-- Custom Tabs -->
            <div class="card">
              <div class="card-header d-flex p-0">
                <h3 class="card-title p-3"></h3>
                <ul class="nav nav-pills ml-auto p-2">
                  <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab" onclick="newuser(0)">Nouveau</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_2" onclick="liste()" data-toggle="tab">Listes des utilisateurs</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Enregistrer</a></li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                      Dropdown <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" tabindex="-1" href="#">Action</a>
                      <a class="dropdown-item" tabindex="-1" href="#">Another action</a>
                      <a class="dropdown-item" tabindex="-1" href="#">Something else here</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" tabindex="-1" href="#">Separated link</a>
                    </div>
                  </li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content" id="new">



                </div>
              </div></div></div>




                   
                  

                  
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <script>

function newuser(element){
    let newuser='newuser';
    
$.ajax({
    url: "vues/users/new.php",
    type: "POST",
    data: {
        newuser:newuser,element:element
    },
  timeout: 10000,
    beforeSend: function() {
        $("#new").html("loading data...");
    },
    success: function(t) {
        $("#new").html(t);    
        }
        ,
  error:function(t) {
    $("#new").html(" no data to display!!!");
    }
});
}

function liste(){
  let liste='liste';
$.ajax({
    url: "vues/users/liste.php",
    type: "POST",
    data: {
      liste:liste
    },
  timeout: 10000,
    beforeSend: function() {
        $("#new").html("loading data...");
    },
    success: function(t) {
        $("#new").html(t);    
        }
        ,
  error:function(t) {
    $("#new").html(" no data to display!!!");
    }
});
}



function detailroom(room){
let listroom='room';
$.ajax({
    url: "vues/rooms/detailsroom.php",
    type: "POST",
    data: {
      room:room
    },
  timeout: 10000,
    beforeSend: function() {
        $("#newroom").html("loading data...");
    },
    success: function(t) {
        $("#newroom").html(t);    
        }
        ,
  error:function(t) {
    $("#newroom").html(" no data to display!!!");
    }
});
      }      
      </script>