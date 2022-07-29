<?php 

    session_start();

    include './backend/functions.php';
    include './backend/connect.php';

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $passport_number = $_POST['passport_number'];
    $state_id = $_POST['state_id'];
    $id = $_POST['id'];
  
    updateClient($first_name, $last_name, $passport_number, $state_id, $id);
    
    // var_dump(updateState($state_name, $id));
    // var_dump($state_name);
    // var_dump($id);
    // exit();

    header("location:./clients.php");
?>