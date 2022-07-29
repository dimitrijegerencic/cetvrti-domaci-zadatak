<?php 

    session_start();

    include './backend/functions.php';
    include './backend/connect.php';

    $class_name = $_POST['class_name'];
  
    saveClassToDatabase($class_name);
    
    header("location:./classes.php");
?>