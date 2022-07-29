<?php 

    $upload_dir = "uploads/car_photos/";
    session_start();

    include './backend/functions.php';
    include './backend/connect.php';

    $company_id = $_POST['company_id'];
    $model_id = $_POST['model_id'];
    $class_id = $_POST['class_id'];
    $production_year = $_POST['production_year'];
    $registration_number = $_POST['registration_number'];
    // $vehicle_image = $_POST['vehicle_image'];
    
    $new_photo_path = null;
    $allowed_extensions = ['jpg', 'jpeg', 'bmp', 'png', 'gif'];

    if(isset($_FILES['profile'])){
        $new_photo_path = uploadFile($allowed_extensions, $upload_dir);
    }else{
       $new_photo_path = $upload_dir."car-placeholder.jpg"; 
    }

    saveVehicleToDatabase($registration_number, $company_id, $model_id, $class_id, $production_year, $new_photo_path);

    // var_dump(saveVehicleToDatabase($registration_number, $company_id, $model_id, $class_id, $production_year, $vehicle_image));
    // exit();
    
    header("location:./vehicles.php");
?>