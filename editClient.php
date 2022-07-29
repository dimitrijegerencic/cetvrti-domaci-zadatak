
<?php 

include './backend/functions.php';
include './backend/connect.php';

if(isset($_GET['id'])){
    $client = findClientById($_GET['id']);
}else{
    header("location:clients.php");
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


<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

  <!-- Main Sidebar Container -->
  <?php include "./partials/sidebar.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper mt-0">
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid mt-0">
        <div class="row h-100 align-items-center justify-content-center" >
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-7 ">
                <div class=" bg-light rounded p-4 p-sm-5 my-4 mx-3 mt-5 mb-5 shadow-lg" id="panel">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h4 class="text-center">Change the selected client</h4>
                    </div>
                    <hr/>
                    <div class="row mt-5 mb-3">
                        <div class="col-6">
                          <form action="updateClient.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?=$client['id']?>">  
                            <input type="text" class="form-control" id="floatingInput" name="first_name" placeholder="First name" required value="<?=$client['first_name']?>">
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" id="floatingInput" name="last_name" placeholder="Last name" required value="<?=$client['last_name']?>">
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-8">
                          <input type="text" required class="form-control" id="floatingInput" name="passport_number" placeholder="Passport number" required value="<?=$client['passport_number']?>">
                      </div>
                      <div class="col-4">
                      <select name="state_id" id="state_id" class="form-control">
                      <option value="" selected disabled >Choose a state</option>

                        <?php 

                          $states = getStates();

                          while($state = mysqli_fetch_assoc($states)){
                            $stateId = $state['id'];
                            $stateName = $state['state_name'];
                            $selected = "";
                            if($stateId == $client['state_id']){
                                $selected = "selected";
                            }
                            echo "<option value=\"$stateId\" $selected >$stateName</option>";
                          }

                            // $sql = "SELECT * FROM states";
                            // $res = mysqli_query($db_conn, $sql);
                            // $queryData = [];
                            // $selected = "";

                            // while($row = mysqli_fetch_assoc($res)){
                              
                            //   $queryData[] = $row;
                            //   $idTempState = $row['state_id'];
                            //   $currStateName = $client['state_name'];
                              
                            //   if ($idTempState == $client['state_id'])
                            //     $selected = "selected";
                              
                            //   echo "<option value=\"$idTempState\" $selected >$currStateName</option>";
                            // }
                        
                        ?>

                      </select>
                      </div>
                    </div>
                   <div class="row mt-5">
                    <div class="col-12">
                    <section class="button-container">
                        <button  class="btn btn-outline-success offset-3 py-3 w-50 mt-4 mb-2 btn-block">
                            Save
                          </button>
                    </section>
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
</body>
</html>

  