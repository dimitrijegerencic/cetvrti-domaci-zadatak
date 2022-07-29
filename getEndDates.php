<?php 

session_start();

    include './backend/functions.php';
    include './backend/connect.php';


    $ends = getEndDates();

    $result = [];
    while($end = mysqli_fetch_assoc($ends)){
        $result[] = $end;
    }

    echo json_encode($result);
?>