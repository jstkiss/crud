<?php
include_once "../connect_ddb.php";
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>showUser</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <main>
        <div class="link_container">
            <a class="link" href="user.php">Ajouter un utilisateur</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Solde</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                    <th>Eligible/Non Eligible</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)) {
                        // Récupération des voitures disponibles dans le budget de l'utilisateur
                        $sql_cars = "SELECT * FROM cars WHERE price <= " . $row['sold'];
                        $result_cars = mysqli_query($conn, $sql_cars);
                        $eligible_cars = mysqli_fetch_all($result_cars, MYSQLI_ASSOC);
                        $eligible = mysqli_num_rows($result_cars) > 0 ? "Eligible" : "Non Eligible";
                ?>
                <tr>
                    <td><?=$row['username']?></td>
                    <td><?=$row['email']?></td>
                    <td><?=$row['sold']?></td>
                    <td class="image"><a href="modifyUser.php?id=<?=$row['user_id']?>"> <img src="../images/write.png" alt="m"></a></td>
                    <td class="image"><a href="deleteUser.php?id=<?=$row['user_id']?>"> <img src="../images/remove.png" alt="r"></a></td>
                    <td><?=$eligible?>
                        <?php if ($eligible == "Eligible") {
                            echo "<br>";
                            foreach ($eligible_cars as $car) {
                                echo $car['model'] . " - $" . $car['price'] . "<br>";
                            }
                        }?>
                    </td>
                </tr>
                <?php
                    }
                } else {
                    echo " <p class='message'>0 utilisateur présent !</p> ";
                }
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>
