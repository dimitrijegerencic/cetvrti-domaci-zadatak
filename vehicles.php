<?php 

session_start();
include './backend/functions.php';
include './backend/connect.php';

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
  <!-- <link rel="stylesheet" href="./css/style.css"> -->
  
  <link rel="stylesheet" href= "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />


</head>


<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

  <!-- Main Sidebar Container -->
  <?php include "./partials/sidebar.php"; ?>

  <section id="service-container" class="service-container mt-5 offset-2" >
        <div class="container" data-aos="fade-up">
            <div class="row">
              <?php 

                  $sql = "SELECT vehicles.* ,
                  companies.company_name as company_n, models.model_name as model_n, classes.class_name as class_n
                  FROM vehicles
                  JOIN companies on companies.id = vehicles.company_id
                  JOIN models on models.id = vehicles.model_id
                  JOIN classes on classes.id = vehicles.class_id;";

                  $res = mysqli_query($db_conn, $sql);
                  $queryData = [];

                  while($row = mysqli_fetch_assoc($res)){
                    $queryData[] = $row;

                          $idTemp = $row['id'];
                          $profile_photo = $row['vehicle_image'];

                          $image = "<a target=\"_blank\" href=\"$profile_photo\" >
                                            <img src=\"$profile_photo\" class=\"table-profile-img\" >
                                        </a>";

                    echo "
                    <div class=\"col-lg-4 col-md-6 d-flex align-items-stretch\" data-aos=\"fade-up\" data-aos-delay=\"100\">
                      <div class=\"card shadow-lg\">
                        <img src=".$profile_photo." alt=\"./car-placeholder.jpg\">
                          <div class=\"card-body\">
                            <h3 class=\"text-center\">".$row['model_n']."</h3>
                            <div class=\"row\">
                              <div class=\"col-12\">
                              
                                <label>Company:</label> ".$row['company_n']." 
                                </br>
                                <label>Class:</label> ".$row['class_n']." 
                                </br>
                                <label>Production year: </label> ".$row['production_year']." 
                                </br>
                                <label>Registration number: </label> ".$row['registration_number']." 
                                

                              </div>
                            </div>
                            <div class=\"row mt-3 float-end\">
                            <div class=\"col-12\">
                              <a type=\"button\" class=\"btn btn-outline-warning\" href='editVehicle.php?id=$idTemp'>
                                <i class=\"fas fa-edit\"></i>
                              </a>
                              <a type=\"button\" class=\"btn btn-outline-danger\" href='deleteVehicle.php?id=$idTemp'>
                                    <i class=\"fas fa-trash-alt\"></i>
                                  </a>
                            </div>
                            </div>
                            
                    </div>
                    </div>
                    </div>

                    ";
                    

                  }
              
              ?>
               
            
          </div>
  
        </div>
      </section>

  </div>               

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
</body>
</html>
