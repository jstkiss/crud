<?php
// register_process.php

// Inclure le fichier de connexion à la base de données
include_once "connect_ddb.php";

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hasher le mot de passe (utilisez une fonction de hachage sécurisée comme password_hash() en production)
    $hashed_password = md5($password); // Ceci est juste un exemple, pas sécurisé pour la production

    // Requête SQL pour insérer l'utilisateur dans la base de données avec un rôle par défaut
    $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$hashed_password', 'Membre')";

    // Exécuter la requête SQL
    if (mysqli_query($conn, $sql)) {
        echo "Inscription réussie.";
    } else {
        echo "Erreur d'inscription: " . mysqli_error($conn);
    }
}
?>
