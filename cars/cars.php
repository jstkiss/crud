<?php
    if(isset($_POST['send'])){
        if(isset($_POST['model'], $_POST['price']) &&
           $_POST['model'] != "" && $_POST['price'] != "") {
            include_once "../connect_ddb.php";
            extract($_POST);

            $sql = "INSERT INTO cars (model, price) VALUES ('$model', '$price')";
            if(mysqli_query($conn, $sql)) {
                header("location:showCars.php");
            } else {
                header("location:cars.php?message=addFail");
            }
        } else {
            header("location:cars.php?message=EmptyFields");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cars</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <form action="" method="post">
        <h1>Ajouter une voiture</h1>
        <input type="text" name="model" placeholder="model">
        <input type="text" name="price" placeholder="price model">
        <input type="submit" value="Ajouter" name="send">
        <a class="link back" href="showUser.php">Annuler</a>
    </form>
</body>
</html>
