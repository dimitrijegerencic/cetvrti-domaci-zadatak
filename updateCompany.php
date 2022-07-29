<?php 

    session_start();

    include './backend/functions.php';
    include './backend/connect.php';

    $company_name = $_POST['company_name'];
    $id = $_POST['id'];
  
    updateCompany($company_name, $id);
    
    // var_dump(updateState($state_name, $id));
    // var_dump($state_name);
    // var_dump($id);
    // exit();

    header("location:./companies.php");
?>