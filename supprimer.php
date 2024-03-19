<?php
// Vérifier si l'identifiant de l'étudiant à supprimer est envoyé en tant que POST
if(isset($_POST['id'])) {
    require_once("Connexion.php");
    global $connect;

    // Récupérer l'identifiant de l'étudiant à supprimer
    $id = $_POST['id'];

    // Exécuter la requête de suppression
    $query = $connect->prepare("DELETE FROM joueur WHERE id = :id");
    $query->bindParam(':id', $id);
    
    // Exécuter la requête
    if($query->execute()) {
        // Redirection vers la page d'affichage après la suppression
        header("Location: menu_admin.php");
        exit(); // Terminer le script après la redirection
    } else {
        // En cas d'erreur lors de la suppression
        echo "Erreur lors de la suppression du joueur.";
    }
} else {
    // Si l'identifiant de l'étudiant n'est pas envoyé, rediriger vers une page d'erreur ou une autre page appropriée
    header("Location: erreur.php");
    exit(); // Terminer le script après la redirection
}
?>
