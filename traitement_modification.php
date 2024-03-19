<?php
// Inclure le fichier de connexion à la base de données
require_once('Connexion.php');

// Vérifier si les données du formulaire sont envoyées en méthode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier si les données nécessaires sont présentes
    if (isset($_POST['question_id'], $_POST['question_text'])) {
        // Récupérer les données du formulaire
        $question_id = $_POST['question_id'];
        $question_text = $_POST['question_text'];

        // Mettre à jour la question dans la base de données
        $update_question = $connect->prepare('UPDATE questions SET question_text = ? WHERE id = ?');
        $update_question->execute([$question_text, $question_id]);

        // Vérifier si les options sont présentes et les mettre à jour
        foreach ($_POST as $key => $value) {
            if (strpos($key, 'option') === 0) {
                $option_id = substr($key, 6); // Récupérer l'ID de l'option
                $update_option = $connect->prepare('UPDATE options SET option_text = ? WHERE id = ?');
                $update_option->execute([$value, $option_id]);
            }
        }

        // Rediriger vers une page de confirmation ou une autre page appropriée
        echo "Question modifie avec suces";
        exit(); // Arrêter l'exécution du script après la redirection
    } else {
        echo "Tous les champs requis ne sont pas spécifiés.";
    }
} else {
    echo "La méthode d'envoi des données n'est pas autorisée.";
}
?>
