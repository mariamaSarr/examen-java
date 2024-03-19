<?php
session_start(); // Démarrez la session si elle n'est pas déjà démarrée

// Vérifier si l'utilisateur est connecté
if (isset($_SESSION['admin'])) {
    // Déconnecter l'utilisateur en supprimant toutes les informations de session
    session_unset(); // Effacez toutes les variables de session
    session_destroy(); // Détruisez complètement la session
    // Rediriger vers une page de confirmation ou une autre page appropriée
    header("Location: connexion_admin.php"); // Rediriger vers la page d'accueil ou de connexion
    exit(); // Arrêter le script
} else if(isset($_SESSION['joueur'])) {
      // Déconnecter l'utilisateur en supprimant toutes les informations de session
      session_unset(); // Effacez toutes les variables de session
      session_destroy(); // Détruisez complètement la session
      header("Location: connexion_admin.php"); // Rediriger vers la page d'accueil ou de connexion
      exit(); // Arrêter le script
    } else{
    header("Location: index.php"); // Rediriger vers la page d'accueil ou de connexion
    exit(); // Arrêter le script
}
?>
