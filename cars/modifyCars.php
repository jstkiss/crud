<?php
    $cars_id = $_GET['id'];
    if(isset($_POST['send'])){
        if(isset($_POST['model'], $_POST['price']) &&
           $_POST['model'] != "" && $_POST['price'] != "") {
            include_once "../connect_ddb.php";
            extract($_POST);

            $sql = "UPDATE cars SET model = '$model' , price = '$price' WHERE cars_id = $cars_id";

            if(mysqli_query($conn, $sql)) {
                header("location:showCars.php");
            }else {
                header("location:showCars.php?message)ModifyFail");
            }
        }else {
            header("location:showCars.php?message=EmptyFields");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifyCars</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php
        include_once "../connect_ddb.php";

        $sql = "SELECT cars.model, cars.price FROM `cars` WHERE cars_id = $cars_id";
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result)) {
    ?>


    <form action="" method="post">
        <h1>Modifier un utilisateur</h1>
        <input type="text" name="model" value="<?=$row['model']?>" placeholder="Username">
        <input type="text" name="price" value="<?=$row['price']?>" placeholder="Email">
        <input type="submit" value="Modifier" name="send">
        <a class="link back" href="showCars.php">Annuler</a>
    </form>
        <?php
            }
        ?>

</body>
</html>