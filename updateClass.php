<?php 

    session_start();

    include './backend/functions.php';
    include './backend/connect.php';

    $class_name = $_POST['class_name'];
    $id = $_POST['id'];
  
    updateClass($class_name, $id);
    
    header("location:./classes.php");
?>