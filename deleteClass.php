<?php 

    session_start();

    include './backend/functions.php';
    include './backend/connect.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        header("location:classes.php");
    }


    deleteClass($id);
    
    header("location:./classes.php");
?>