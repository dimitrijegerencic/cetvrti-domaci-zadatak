<?php 

    session_start();

    include './backend/functions.php';
    include './backend/connect.php';

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $passport_number = $_POST['passport_number'];
    $state_id = $_POST['state_id'];
  
    saveClientToDatabase($first_name, $last_name, $state_id, $passport_number);

    // var_dump($first_name);
    // var_dump($last_name);
    // var_dump($passport_number);
    // var_dump($state_id);
    // exit();
    
    header("location:./clients.php");
?>