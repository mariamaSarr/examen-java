<?php
// Inclure le fichier de connexion à la base de données
require_once('Connexion.php');

// Vérifier si l'identifiant de la question a été envoyé
if ($_SERVER["REQUEST_METHOD"] === 'POST' && isset($_POST['id_question'])) {
    // Récupérer l'identifiant de la question sélectionnée
    $id_question = $_POST['id_question'];

    // Sélectionner la question correspondante à partir de la base de données
    $query = $connect->prepare('SELECT * FROM questions WHERE id = ?');
    $query->execute([$id_question]);
    $question = $query->fetch(PDO::FETCH_ASSOC);

    // Vérifier si la question a été trouvée
    if ($question) {
        // Afficher la question
        echo "<h3>{$question['question_text']}</h3>";
        // Vous pouvez également ajouter le formulaire de réponse ici
    } else {
        echo "La question sélectionnée n'a pas été trouvée.";
    }
} else {
    // Rediriger l'utilisateur si l'identifiant de la question n'a pas été envoyé
    header("Location: accuil_joueur.php");
    exit;
}
?>
