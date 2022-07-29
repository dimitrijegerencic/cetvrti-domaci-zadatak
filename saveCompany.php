<?php 

    session_start();

    include './backend/functions.php';
    include './backend/connect.php';

    $company_name = $_POST['company_name'];
  
    saveCompanyToDatabase($company_name);
    
    header("location:./companies.php");
?>