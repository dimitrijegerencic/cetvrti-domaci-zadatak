<?php 

    session_start();

    include './backend/functions.php';
    include './backend/connect.php';

    $client_id = $_POST['client_id'];
    $vehicle_id = $_POST['vehicle_id'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $price = $_POST['price'];
    $id = $_POST['id'];
  
    updateReservation($client_id, $vehicle_id, $start_date, $end_date, $price, $id);
    
    

    header("location:./reservations.php");
?>