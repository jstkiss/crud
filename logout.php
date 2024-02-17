<?php
session_start();

// Détruire toutes les données de la session
session_destroy();

// Rediriger vers la page de connexion après la déconnexion
header("Location: login.php");
exit();
?>
