
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
  <!-- CSS only -->

<link rel="stylesheet" href="./css/style.css">

<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">

</head>

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper ">

  <!-- Main Sidebar Container -->
  <?php include "./partials/sidebar.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper mt-0 bg-white">
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
    <section class="content">
      <div class="container">
      <section id="category-container" class="category-container mb-5 mt-5 mx-5">
      <div class="container aos-init aos-animate" data-aos="fade-up">
        <div class="row">
        <div class="col-lg-6 col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
            <div class="card shadow-lg" style="width: 30rem;">
              
                  <img id="image" class="card-img-top" src="./dist/img/car-car-park.jpg" alt="Card image cap">
              
              <div class="card-body">
                <div class="row align-middle">
                  <div class="col-6">
                    <h3 class="card-title mx-5 mt-3">Vehicles</h3></div>
                  <div class="col-6">
                  <p class="mt-2 mx-2">
                      Gain access to the entire database of available vehicles for renting!
                    </p>
                  </div>
                </div>
              </div>
          </div>
          </div>
          <div class="col-lg-6 col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
            <div class="card shadow-lg" style="width: 30rem;">
              
                  <img id="image" class="card-img-top" src="./dist/img/clients.jpg" alt="Card image cap">
              
              <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <h3 class="card-title mx-5 mt-3">Clients</h3>
                  </div>
                  <div class="col-6">
                  <p class="mt-3 mx-2">
                      Manage our system of clients! 
                    </p>
                  </div>
                </div>
              </div>
          </div>
          </div>
        </div>

      </div>
    </section>

    <section class="content">
      <div class="container">
      <section id="category-container" class="category-container mb-5 mt-5 mx-5">
      <div class="container aos-init aos-animate" data-aos="fade-up">
        <div class="row">
        <div class="col-lg-6 col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
            <div class="card shadow-lg" style="width: 30rem;">
              
                  <img id="image" class="card-img-top" src="./dist/img/company.jpg" alt="Card image cap">
              
              <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <h3 class="card-title mt-3 mx-5">Companies</h3>
                  </div>
                  <div class="col-6">
                    <p class="mt-2 mx-2">
                      A full fledged insight into multiple companies, such as: BMW, Peugeot, Volkswagen etc.
                    </p>
                  </div>
                </div>
              </div>
          </div>
          </div>
          <div class="col-lg-6 col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
            <div class="card shadow-lg" style="width: 30rem;">
              
                  <img id="image" class="card-img-top" src="./dist/img/model.jpg" alt="Card image cap">
              
              <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <h3 class="card-title mt-3 mx-5">Models</h3>
                  </div>
                  <div class="col-6">
                    <p class="mt-3 mx-2">
                      Multiple types of models, everything for everyone!
                    </p>
                  </div>
                </div>
              </div>
          </div>
          </div>
        </div>

      </div>
    </section>

            
      </div>
    </section>

  </div>


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




