<?php
    $user_id = $_GET['id'];
    include_once "../connect_ddb.php";
    $sql = "DELETE FROM users where user_id = $user_id";
    if(mysqli_query($conn, $sql)) {
        header("location:showUsers.php?message=DeleteSuccess");
    }else {
        header("location:showUsers.php?message=DeleteFail");
    }
?>