<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>showCars</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <main>
        <div class="link_container">
            <a class="link" href="cars.php">Ajouter une voiture</a>
        </div>

        <table>
            <thead>
                <?php
                include_once "../connect_ddb.php";
                $sql = "SELECT * FROM cars";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0){
                ?>
                <tr>
                    <th>model</th>
                    <th>price</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?=$row['model']?></td>
                    <td><?=$row['price']?></td>
                    <td class="image"><a href="modifyCars.php?id=<?=$row['cars_id']?>"> <img src="../images/write.png" alt="m"></a></td>
                    <td class="image"><a href="deleteCars.php?id=<?=$row['cars_id']?>"> <img src="../images/remove.png" alt="r"></a></td>
                </tr>
                <?php
                    }
                }
                else {
                    echo " <p class='message'>0 voiture présente !</p> ";
                }
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>