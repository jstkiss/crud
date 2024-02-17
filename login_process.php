<?php
session_start();
include_once "connect_db.php";

if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vérifier les informations de connexion par rapport à la base de données
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0) {
        // Utilisateur authentifié, récupérer le rôle et démarrer la session
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // Rediriger vers le tableau de bord après une connexion réussie
        header("Location: dashboard.php");
        exit();
    } else {
        // Rediriger vers la page de connexion avec un message d'erreur
        header("Location: login.php?error=1");
        exit();
    }
} else {
    // Rediriger vers la page de connexion si les informations de connexion ne sont pas fournies
    header("Location: login.php");
    exit();
}
?>
