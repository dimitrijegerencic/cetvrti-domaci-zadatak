<?php 

    session_start();

    include './backend/functions.php';
    include './backend/connect.php';

    $model_name = $_POST['model_name'];
    $company_id = $_POST['company_id'];
  
    saveModelToDatabase($model_name, $company_id);
    
    header("location:./models.php");
?>