<?php
    if(isset($_POST['send'])){
        if(isset($_POST['username'], $_POST['sold'], $_POST['email']) &&
           $_POST['username'] != "" && $_POST['sold'] != "" && $_POST['email'] != "") {
            include_once "../connect_ddb.php";
            extract($_POST);

            $sql = "INSERT INTO users (username, email, sold) VALUES ('$username', '$email', '$sold')";
            if(mysqli_query($conn, $sql)) {
                header("location:showUsers.php");
            }else {
                header("location:user.php?message=addFail");
            }
        }else {
            header("location:user.php?message=EmptyFields");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>addUser</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <form action="" method="post">
        <h1>Ajouter un utilisateur</h1>
        <input type="text" name="username" placeholder="Username">
        <input type="email" name="email" placeholder="Email">
        <input type="text" name="sold" placeholder="your sold">
        <input type="submit" value="Ajouter" name="send">
        <a class="link back" href="showUser.php">Annuler</a>
    </form>
</body>
</html>