<?php 

session_start();

    include './backend/functions.php';
    include './backend/connect.php';

    if(isset($_GET['company_id'])){
        $company_id = $_GET['company_id'];
    }else{
        echo json_encode([]);
        exit;
    }

    $models = getModelsByCompany($company_id);

    $result = [];
    while($model = mysqli_fetch_assoc($models)){
        $result[] = $model;
    }

    echo json_encode($result);
?>