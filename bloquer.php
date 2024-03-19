<?php
require_once("Connexion.php");
global $connect;

// Vérifier si l'identifiant du joueur à bloquer est passé en paramètre POST
if(isset($_POST['id'])) {
    $id_joueur = $_POST['id'];

    // Préparation de la requête SQL pour mettre à jour le statut du joueur à bloqué
    $query = $connect->prepare("UPDATE joueur SET bloquer = 1 WHERE id = :id");

    // Liaison des valeurs
    $query->bindParam(':id', $id_joueur);

    // Exécution de la requête
    if($query->execute()) {
        echo "Le joueur a été bloqué avec succès.";
    } else {
        echo "Une erreur est survenue lors du blocage du joueur.";
    }
} else {
    echo "Identifiant du joueur non spécifié.";
}
?>
