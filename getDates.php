<?php 

session_start();

    include './backend/functions.php';
    include './backend/connect.php';

    $ends1 = getDates();

    $result1 = [];
    while($end1 = mysqli_fetch_assoc($ends1)){
        $result1[] = $end1;
    }

    var_dump($result1);
    exit();
    echo json_encode($result1);
?>