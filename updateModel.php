<?php 

    session_start();

    include './backend/functions.php';
    include './backend/connect.php';

    $model_name = $_POST['model_name'];
    $company_id = $_POST['company_id'];
    $id = $_POST['id'];
  
    updateModel($model_name, $company_id, $id);
    
    // var_dump(updateState($state_name, $id));
    // var_dump($state_name);
    // var_dump($id);
    // exit();

    header("location:./models.php");
?>