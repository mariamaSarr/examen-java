<?php
// Inclure le fichier de connexion à la base de données
require_once('Connexion.php');

// Vérifier si l'ID de la question est passé en paramètre dans l'URL
if (isset($_GET['id'])) {
    // Récupérer l'ID de la question depuis l'URL
    $question_id = $_GET['id'];

    // Sélectionner la question correspondante dans la base de données
    $query_question = $connect->prepare('SELECT * FROM questions WHERE id = ?');
    $query_question->execute([$question_id]);
    $question = $query_question->fetch(PDO::FETCH_ASSOC);

    // Vérifier si la question existe
    if ($question) {
        // Sélectionner les options associées à cette question
        $query_options = $connect->prepare('SELECT * FROM options WHERE question_id = ?');
        $query_options->execute([$question_id]);
        $options = $query_options->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier la question</title>
    <link rel="stylesheet" href="css/qmod.css">
</head>
<body>
    <div class="rectangle6">
        <h2>Modifier la question</h2>
        <div class="rectangle7">
        <form action="traitement_modification.php" method="post">
            <input type="hidden" name="question_id" value="<?= $question['id'] ?>">
            <label  for="question_text">Question :</label>
            <input class="q1" type="text" id="question_text" name="question_text" value="<?= $question['question_text'] ?>"><br>
            
            <?php foreach ($options as $option) : ?>
                <label for="option<?= $option['id'] ?>">Option <?= $option['id'] ?>:</label>
                <input type="text" id="option<?= $option['id'] ?>" name="option<?= $option['id'] ?>" value="<?= $option['option_text'] ?>"><br>
            <?php endforeach; ?>

            <input type="submit" value="Enregistrer les modifications">
        </form>
        </div>
    </div>
</body>
</html>
<?php
    } else {
        echo "La question spécifiée n'existe pas.";
    }
} else {
    echo "L'ID de la question n'est pas spécifié.";
}
?>
