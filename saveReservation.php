<?php 

    session_start();

    include './backend/functions.php';
    include './backend/connect.php';

    $client_id = $_POST['client_id'];
    $vehicle_id = $_POST['vehicle_id'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $price = $_POST['price'];
    
    saveReservationToDatabase($client_id, $vehicle_id, $start_date, $end_date, $price);

    // var_dump($first_name);
    // var_dump($last_name);
    // var_dump($passport_number);
    // var_dump($state_id);
    // exit();
    
    header("location:./reservations.php");
?>