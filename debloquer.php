<?php
require_once("Connexion.php");
global $connect;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si l'ID du joueur à débloquer est envoyé via POST
    if (isset($_POST['id'])) {
        // Récupérer l'ID du joueur à débloquer
        $id_joueur = $_POST['id'];

        // Exécuter la requête pour débloquer le joueur dans la base de données
        $query = $connect->prepare("UPDATE joueur SET debloquer = 'actif' WHERE id = :id");
        $query->bindParam(":id", $id_joueur);
        $query->execute();

        // Rediriger vers une page de confirmation ou une autre page appropriée
        echo "Le joueur a été debloqué avec succès.";
        exit(); // Arrêter le script
    } else {
        // Si l'ID du joueur n'est pas envoyé via POST, rediriger vers une page d'erreur
        echo "Une erreur est survenue lors du blocage du joueur.";
        exit(); // Arrêter le script
    }
}
?>
