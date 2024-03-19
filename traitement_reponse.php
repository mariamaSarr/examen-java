<?php
// Inclure le fichier de connexion à la base de données
require_once('Connexion.php');

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    // Récupérer l'ID de la question et la réponse soumise par l'utilisateur
    $id_question = $_POST['question_id'];
    $reponse_utilisateur = $_POST['reponse'];

    // Sélectionner la réponse correcte pour la question
    $query = $connect->prepare('SELECT is_correct FROM options WHERE id = :id');
    $query->bindParam(':id', $reponse_utilisateur);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_ASSOC);

    // Vérifier si la réponse soumise par l'utilisateur est correcte
    if ($row && $row['is_correct'] == 1) {
        echo "<h2>Félicitations ! Votre réponse est correcte.</h2>";
      
    } else {
        echo "<h2>Désolé, votre réponse est incorrecte. Veuillez réessayer.</h2>";
        
    }?><button  type="submit"><a href="jouer.php">  réessayer</a></button>
    <?php
} else {
    // Rediriger l'utilisateur s'il essaie d'accéder à cette page directement sans soumettre le formulaire
    header("Location: jouer.php");
    exit;
}
?>
