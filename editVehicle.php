
<?php 

include './backend/functions.php';
include './backend/connect.php';

if(isset($_GET['id'])){
    $vehicle = findVehicleByID($_GET['id']);
}else{
    header("location:vehicles.php");
}

?>

<!DOCTYPE html>
  <html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rent-A-Car Service</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

  <style>
  #panel{
  border-radius: 3px;
  }

  .button-container:hover{

  transform: scale(1.1); 
  }

  .button-container{
  transition: transform .23s;
  }
  </style>

  </head>


  <body class="hold-transition sidebar-mini layout-fixed bg-light">

  <div class="wrapper bg-light">

  <!-- Main Sidebar Container -->
  <?php include "./partials/sidebar.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper mt-0">
  <!-- Content Header (Page header) -->

  <!-- Main content -->
  <section class="content">
  <div class="container-fluid mt-5">
  <div class="row h-100 align-items-center justify-content-center" >
      <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-6 ">
          <div class=" bg-light rounded p-4 p-sm-5 my-4 mx-3 mt-5 mb-5 shadow-lg" id="panel">
              <div class="d-flex align-items-center justify-content-between mb-3">
                  <h4 class="text-center">Change the selected vehicle</h4>
              </div>             
              <form action="updateVehicle.php" method="POST" enctype="multipart/form-data">
                <div class="row mb-3">
                  <div class="col-6">
                  <input type="hidden" name="id" value="<?=$vehicle['id']?>"> 
                    <input type="text" required class="mt-3 form-control" name="registration_number" placeholder="Insert registration number" value="<?=$vehicle['registration_number']?>">
                  </div>
                  <div class="col-6">
                  <input type="text" required class="mt-3 form-control" name="production_year" placeholder="Insert production year" maxlength="4" value="<?=$vehicle['production_year']?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <select name="company_id" id="company_id" class="form-control mb-3" onchange="displayModels()">
                      <option value="" selected disabled>Choose a company</option>
                                
                          <?php 

                            $companies = getCompanies();

                            while($company = mysqli_fetch_assoc($companies)){
                              
                              $companyId = $company['id'];
                              $companyName = $company['company_name'];
                              $selected = "";

                              if($companyId == $vehicle['company_id']){
                                  $selected = "selected";
                              }
                              echo "<option value=\"$companyId\" $selected >$companyName</option>";
                            }

                          
                          ?>
                    </select>
                  </div>
                  <div class="col-6">
                    <select name="model_id" id="model_id" class="form-control">
                                  <option value="" selected disabled >Choose a model</option>

                                      <?php 

                                          $models = getModels();

                                          while($model = mysqli_fetch_assoc($models)){
                                            $modelId = $model['id'];
                                            $modelName = $model['model_name'];
                                            $selected = "";

                                            if($modelId == $vehicle['model_id']){
                                                $selected = "selected";
                                            }
                                            echo "<option value=\"$modelId\" $selected >$modelName</option>";
                                          }
                                      
                                      ?>

                    </select>          
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <select name="class_id" id="class_id" class="form-control">
                          <option value="" selected disabled >Choose a class</option>

                              <?php 
                                  
                                  $classes = getClasses();

                                  while($class = mysqli_fetch_assoc($classes)){
                                    $classId = $class['id'];
                                    $className = $class['class_name'];
                                    $selected = "";
                                    if($classId == $vehicle['class_id']){
                                        $selected = "selected";
                                    }
                                    echo "<option value=\"$classId\" $selected >$className</option>";
                                  }

                                  
                              
                              ?>

                    </select>                   
                  </div>
                  <div class="col-6">

                  <?php 
                      $profile_photo = $vehicle['vehicle_image'];
                      if(!$profile_photo) $profile_photo = "uploads/car_photos/car-placeholder.jpg";
                  ?>
                  
                  <img src="<?=$profile_photo?>" alt="Profile photo" class="img-fluid img-thumbnail" >
                  <input type="hidden" name="old_profile_photo" value="<?=$profile_photo?>">
                  
                  <input type="file" name="profile" class="form mt-3">
                  
              </div>
                </div>

                <!-- <input type="file" name="profile_photo" class="form-control mt-3">  -->

                <section class="button-container">
                  <button class="btn btn-outline-success py-2 w-100 mt-4 mb-2 btn-block">
                    Save
                  </button>                           
  </section>
          </form>
      </div>
  <!-- /.content -->
  </div>
  </div>
  </div>
  </div>
  </div>
                            </section>
  <!-- /.content-wrapper -->

  <?php include "./partials/footer.php"; ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
  $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>
  <script src="app.js"></script>
</body>
</html>

