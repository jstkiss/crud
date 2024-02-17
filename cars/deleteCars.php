<?php
    $user_id = $_GET['id'];
    include_once "../connect_ddb.php";
    $sql = "DELETE FROM cars where cars_id = $cars_id";
    if(mysqli_query($conn, $sql)) {
        header("location:showCars.php?message=DeleteSuccess");
    }else {
        header("location:showCars.php?message=DeleteFail");
    }
?>