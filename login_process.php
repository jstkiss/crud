<?php
session_start();
include_once "connect_db.php";

if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0) {

        $user = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];


        header("Location: dashboard.php");
        exit();
    } else {

        header("Location: login.php?error=1");
        exit();
    }
} else {

    header("Location: login.php");
    exit();
}
?>
