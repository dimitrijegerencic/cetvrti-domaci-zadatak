<?php 

session_start();

    include './backend/functions.php';
    include './backend/connect.php';
    

    $starts = getStartDates();

    $result = [];
    while($start = mysqli_fetch_assoc($starts)){
        $result[] = $start;
    }

    echo json_encode($result);
?>