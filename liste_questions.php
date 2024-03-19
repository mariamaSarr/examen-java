<?php
// Inclure le fichier de connexion à la base de données
require_once('Connexion.php');

// Récupérer toutes les questions de la base de données
$query = $connect->query('SELECT * FROM questions');
$questions = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des questions</title>
    <link rel="stylesheet" href="css/qmod.css">
</head>
<body>
    <div class="rectangle6">
   
        <h2>Liste des questions</h2>
        <div>
        <button type="submit"  class="retour"><a href="Accueil_admin.php"> retour</a></button>
        </div>
        <div class="rectangle7">
        <ul>
            <?php foreach ($questions as $question): ?>
                <li>
                    <a href="modifier_question.php?id=<?= $question['id'] ?>">
                        <?= $question['question_text'] ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        </div>
    </div>
</body>
</html>
