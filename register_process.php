<?php



include_once "connect_ddb.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];


    $hashed_password = md5($password); 


    $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$hashed_password', 'Membre')";

    // Exécuter la requête SQL
    if (mysqli_query($conn, $sql)) {
        echo "Inscription réussie.";
    } else {
        echo "Erreur d'inscription: " . mysqli_error($conn);
    }
}
?>
