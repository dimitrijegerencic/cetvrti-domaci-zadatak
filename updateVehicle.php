<?php 

    session_start();

    $upload_dir = "uploads/car_photos/";

    include './backend/functions.php';
    include './backend/connect.php';

    $registration_number = $_POST['registration_number'];
    $production_year = $_POST['production_year'];
    $company_id = $_POST['company_id'];
    $model_id = $_POST['model_id'];
    $class_id = $_POST['class_id'];
    $old_profile_photo = $_POST['old_profile_photo'];
    $id = $_POST['id'];


    $new_photo_path = null;

    $allowed_extensions = ['jpg', 'jpeg', 'bmp', 'png', 'gif'];

    if(isset($_FILES['profile'])){
        $new_photo_path = uploadFile($allowed_extensions, $upload_dir);
    }else{
       $new_photo_path = $upload_dir."car-placeholder.jpg"; 
    }
  
    updateVehicles($registration_number, $company_id, $model_id, 
    $class_id, $production_year, $new_photo_path, $id);


    header("location:./vehicles.php");
?>