<?php 

    session_start();

    include './backend/functions.php';
    include './backend/connect.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        header("location:companies.php");
    }


    deleteCompany($id);
    
    header("location:./companies.php");
?>