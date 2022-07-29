<?php 

    session_start();

    include './backend/functions.php';
    include './backend/connect.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        header("location:reservations.php");
    }


    deleteReservation($id);
    
    header("location:./reservations.php");
?>