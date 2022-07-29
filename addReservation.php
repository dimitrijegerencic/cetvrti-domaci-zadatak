
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


<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

  <!-- Main Sidebar Container -->
  <?php include "./partials/sidebar.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper mt-0">
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid mt-5">
        <div class="row h-100 align-items-center justify-content-center" >
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-7 ">
                <div class=" bg-light rounded p-4 p-sm-5 my-4 mx-3 mt-5 mb-5 shadow-lg" id="panel">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h4 class="text-center">Add a new reservation</h4>
                    </div>
                    <hr/>
                    <div class="row mt-5 mb-3">
                        <div class="col-6">
                          <form action="saveReservation.php" method="POST" enctype="multipart/form-data">
                            <input type="number" hidden name="reservation_id"/>
                          <label for="client_id">Client</label>
                            <select name="client_id" id="state_id" class="form-control">
                            <option value="" selected disabled >Choose a client</option>
                                <?php 

                                    $sql = "SELECT * FROM clients";
                                    $res = mysqli_query($db_conn, $sql);
                                    $queryData = [];

                                    while($row = mysqli_fetch_assoc($res)){
                                    
                                    $queryData[] = $row;
                                    $idTempClient = $row['id'];
                                    $currFirstName = $row['first_name'];
                                    $currLastName = $row['last_name'];
                                    
                                    echo "<option value=\"$idTempClient\" >$currFirstName $currLastName</option>";
                                    }
                                
                                ?>
                            </select>
                        </div>
                        <div class="col-6">
                          <label for="vehicle_id">Vehicle</label>
                        <select name="vehicle_id" id="state_id" class="form-control">
                            <option value="" selected disabled >Choose a vehicle</option>
                                <?php 

                                    $sql = "SELECT vehicles.*, models.model_name
                                    FROM vehicles
                                    JOIN models ON models.id = vehicles.model_id;";

                                    $res = mysqli_query($db_conn, $sql);
                                    $queryData = [];

                                    while($row = mysqli_fetch_assoc($res)){
                                    
                                    $queryData[] = $row;
                                    $idTempVehicle = $row['id'];
                                    $currModelName = $row['model_name'];
                                    $currRegNum = $row['registration_number'];
                                   
                                    echo "<option value=\"$idTempVehicle\">$currModelName ($currRegNum)</option>";

                                    }
                                
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <label for="start_date">Start date</label>
                          <input type="date" required class="form-control" id="start_date" name="start_date" placeholder="Start date">
                      </div>
                      
                      <div class="col-6">
                      <label for="end_date">End date</label>
                          <input type="date" required class="form-control" id="end_date" name="end_date" placeholder="End date">
                      </div>
                    </div>
                    <div class="row mt-3">
                      <div class="col-6">
                        <label for="price">Price</label>
                        <input type="number" required class="form-control" id="floatingInput" name="price" placeholder="Price" required>
                      </div>
                      <div class="col-6 my-1">
                      <section class="button-container">
                      <label for="price"></label>
                          <button class="btn btn-outline-success py-2 w-100 btn-block" onclick="checkReservations()">
                            Save
                          </button>
                          
                        </section>
                      </div>
                    
                    </div>
                   <div class="row mt-5">
                      <div class="col-12">
                        
                      </form>
                    </div>
                   </div> 
                </div>
              </div>
            </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>
<script src="app.js"></script>
<script>

async function checkReservations(){

    var baseUrl = "http://localhost/rent-service/";

    let start_date_input = document.getElementById("start_date").value;
    let end_date_input = document.getElementById("end_date").value;

    let responseStart = await fetch(baseUrl+"getStartDates.php");
    let responseEnd = await fetch(baseUrl+"getEndDates.php");

    let startDates = await responseStart.json();
    let endDates = await responseEnd.json();
    
    var flag1 = 0;
    var flag2 = 0;
    
    startDates.forEach((sDate)=>{
      let currStart = sDate.start_date;
      if (start_date_input == currStart){
        flag1 = 1;    
      }
    });

    endDates.forEach((sDate)=>{
      let currStart = sDate.start_date;
      if (start_date_input == currStart){
        flag2 = 1;  
      }
    });

    if (flag1==1 || flag2==1){
      alert("Reservation already exists! Choose another one!");
    }

    console.log(start_date_input);
    console.log(startDates);
    console.log(endDates);
    

    
}

</script>

</body>
</html>

  