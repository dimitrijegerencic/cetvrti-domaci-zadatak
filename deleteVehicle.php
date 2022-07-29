<?php 

    session_start();

    include './backend/functions.php';
    include './backend/connect.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        header("location:vehicles.php");
    }

    deleteVehicles($id);
    
    header("location:./vehicles.php");
?>