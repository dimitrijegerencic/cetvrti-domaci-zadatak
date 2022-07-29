<?php 

    session_start();

    include './backend/functions.php';
    include './backend/connect.php';

    $state_name = $_POST['state_name'];
    $id = $_POST['id'];
  
    updateState($state_name, $id);
    
    // var_dump(updateState($state_name, $id));
    // var_dump($state_name);
    // var_dump($id);
    // exit();

    header("location:./states.php");
?>