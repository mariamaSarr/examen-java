<?php
require_once('Connexion.php');

// Sélectionner une question aléatoire
$query = $connect->query('SELECT * FROM questions ORDER BY RAND() LIMIT 1');
$question = $query->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="css/playe.css">
</head>
<body>
    <div class="rectangle6">
        <div>
          <button type="submit"  class="retour"><a href="accuil_joueur.php"> retour</a></button>
        </div>
       <form action="traitement_reponse.php" class="page" method="post">
           <h1> Question</h1>
           <div class="rectangle7">

              <?php
                  // Vérifier si une question a été sélectionnée avec succès
                  if ($question) {
                    
                    // Récupérer les options associées à cette question
                    $query_options = $connect->prepare('SELECT * FROM options WHERE question_id = ?');
                    $query_options->execute([$question['id']]);
                    $options = $query_options->fetchAll(PDO::FETCH_ASSOC);

                    // Afficher la question et ses options
                    echo "<h3>{$question['question_text']}</h3><br><br>";
                    echo "<form action='traitement_reponse.php' method='post'>";
                    echo "<input type='hidden' name='question_id' value='{$question['id']}'><br><br>";

                    foreach ($options as $option) {
                        echo "<input type='radio' name='reponse' value='{$option['id']}'> {$option['option_text']}<br>";
                    }
                    
                    echo "<br><button type='submit'>Soumettre</button>";
                    echo "</form>";
                } else {
                    echo "Aucune question disponible pour le moment.";
                  }
              ?>
           </div>
       </form>
        
  </div>
   <!-- pied de page -->
 <footer class="footer"> mariama & ndack @ copyright iam 2023</footer>

</body>
</html>  
