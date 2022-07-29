<?php 

    session_start();

    include './backend/functions.php';
    include './backend/connect.php';

    $state_name = $_POST['state_name'];
  
    saveStateToDatabase($state_name);
    
    header("location:./states.php");
?>