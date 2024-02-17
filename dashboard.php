<?php
session_start();

// Vérifier si l'utilisateur est connecté
if(isset($_SESSION['user_id'])) {
    // Afficher les fonctionnalités en fonction du rôle de l'utilisateur
    $role = $_SESSION['role'];
    if($role === 'admin') {
        // Afficher les fonctionnalités pour l'administrateur
        echo "Bienvenue, ".$_SESSION['username']." (Admin)";
    } elseif($role === 'membre') {
        // Afficher les fonctionnalités pour les membres
        echo "Bienvenue, ".$_SESSION['username']." (Membre)";
    } else {
        // Afficher les fonctionnalités pour les utilisateurs anonymes
        echo "Bienvenue, ".$_SESSION['username']." (Anonyme)";
    }
} else {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: login.php");
    exit();
}
?>
