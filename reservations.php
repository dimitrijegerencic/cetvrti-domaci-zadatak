
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


</head>


<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

  <!-- Main Sidebar Container -->
  <?php include "./partials/sidebar.php"; ?>

  
  <div class="content-wrapper">    
    <div class="row h-100 align-items-center justify-content-center" >
      <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-11 mt-5">
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Reservations</h1>
              </div>
            </div>
          </div>
        </div>
          <div class=" bg-light rounded p-4 p-sm-5 my-4 mx-3 mt-5 mb-5 shadow" id="panel">
            
            <table class="table table-bordered table-hover text-center">
              <thead>
                <tr>
                  <th scope="col">Client</th>
                  <th scope="col">Vehicle</th>
                  <th scope="col">Reg. num. of the vehicle</th>
                  <th scope="col">Start date</th>
                  <th scope="col">End date</th>
                  <th scope="col">Price</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Cancel</th>
                  
                </tr>
              </thead>
              <tbody>

                <?php 
                    
                    $sql1 = "SELECT reservations.*, clients.first_name, clients.last_name, vehicles.model_id, models.model_name, vehicles.registration_number
                            FROM reservations
                            JOIN clients on clients.id = reservations.client_id
                            JOIN vehicles on vehicle_id = vehicles.id
                            JOIN models on models.id = vehicles.model_id;";

                    $res = mysqli_query($db_conn, $sql1);

                    $queryData = [];

                    while($row = mysqli_fetch_assoc($res)){

                        $queryData[] = $row;

                        $idTemp = $row['id'];
                        $startDateTemp = $row['start_date'];
                        $endDateTemp = $row['end_date'];

                        if ($startDateTemp == "0000-00-00"){
                          $startDateTemp = "<span class=\"badge badge-success\">Available after canceling</span>";
                        }

                        if ($endDateTemp == "0000-00-00")
                          $endDateTemp = "<span class=\"badge badge-success\">Available after canceling</span>";

                        echo "<tr>";
                        echo "  <td>".$row['first_name']." ". $row['last_name'] ."</td>";
                        echo "  <td>".$row['model_name']."</td>";
                        echo "  <td>".$row['registration_number']."</td>";
                        echo "  <td>".$startDateTemp."</td>";
                        echo "  <td>".$endDateTemp."</td>";
                        echo "  <td>".$row['price']." "."€</td>";
                        echo "<td>
                                <a type=\"button\" class=\"btn btn-outline-warning\" href='editReservation.php?id=$idTemp'>
                                  <i class=\"fas fa-edit\"></i>
                                </a>
                            </td>";
                        echo "<td>
                            <a type=\"button\" class=\"btn btn-outline-danger\" href='deleteReservation.php?id=$idTemp'>
                            <i class=\"fas fa-times\"></i>
                            </a>
                            </td>";
                        echo "</tr>";
                    }
                
                ?>
                
                
              </tbody>
            </table>
          </div>
      </div>
    </div>

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
