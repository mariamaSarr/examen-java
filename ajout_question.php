<?php
// Inclure le fichier de connexion à la base de données
require_once('Connexion.php');

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    // Récupérer les données du formulaire
    $question_text = $_POST['question_text'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option_correcte = $_POST['option_correcte'];

    // Commencer une transaction
    $connect->beginTransaction();

    try {
        // Insérer la question
        $query_insert_question = $connect->prepare('INSERT INTO questions (question_text) VALUES (?)');
        $query_insert_question->execute([$question_text]);

        // Récupérer l'ID de la question insérée
        $question_id = $connect->lastInsertId();

        // Insérer les options
        $query_insert_option1 = $connect->prepare('INSERT INTO options (question_id, option_text, is_correct) VALUES (?, ?, ?)');
        $query_insert_option1->execute([$question_id, $option1, ($option_correcte === 'option1' ? 1 : 0)]);

        $query_insert_option2 = $connect->prepare('INSERT INTO options (question_id, option_text, is_correct) VALUES (?, ?, ?)');
        $query_insert_option2->execute([$question_id, $option2, ($option_correcte === 'option2' ? 1 : 0)]);

        $query_insert_option3 = $connect->prepare('INSERT INTO options (question_id, option_text, is_correct) VALUES (?, ?, ?)');
        $query_insert_option3->execute([$question_id, $option3, ($option_correcte === 'option3' ? 1 : 0)]);

        // Valider la transaction
        $connect->commit();

        echo "La question a été ajoutée avec succès";
        header("Location: Accueil_admin.php");

    } catch (Exception $e) {
        // En cas d'erreur, annuler la transaction
        $connect->rollBack();
        echo "Erreur lors de l'ajout de la question : " . $e->getMessage();
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/Questionnaire.css">
</head>
<body>
    
      <!-- en tete -->

  <header>
  <div class="gift">
  <img src="image/gif1.jpg" alt="logo" class="logo">
  </div>
  <div class="line_3"></div>
  <div class="line2"></div>
  <div class="line_5"></div>
  <div > <input class="rectangle_5" type="text" placeholder="recherche"></div>
   <div class="rectangle_6">
          <img src="image/icon_recherche.jpg" alt="icon-1" class="icon_1">
      </div>
  </header>

 <!-- menu -->
  
  <div class= "accueil">
    <nav>
      <ul>
        <div class="menu"><li><a href="menu_admin.php">MENU</a></li></div>
        <div class="parametre"><li><a href="parametre.php">PARAMETRES</a></li></div>
        <div class="profil"><li><a href="profile_admin.php">PROFIL</a></li></div>
      </ul>
    </nav>
  </div>
  <div class="line_4"></div>
  <div class="deconnexion">
    <nav><ul><li><a href="#">DECONNEXION</a></li></ul></nav>
  </div>
  <div class="rectangle6">
  <div>
        <button type="submit"  class="retour"><a href="gestion_question.php"> retour</a></button>
    </div>
    <form action="ajout_question.php" method="post">
        <h2>Ajouter un Quizz</h2>
        <div class="rectangle7">
            <!-- Formulaire pour ajouter une question -->
            <input type="text" name="question_text" placeholder="Entrer la question" class="prenom"><br>
            <input type="text" name="option1" placeholder="Option 1" class="pseudo"><br>
            <input type="text" name="option2" placeholder="Option 2" class="mot_de_passe"><br>
            <input type="text" name="option3" placeholder="Option 3" class="confirmer"><br>
            <select name="option_correcte" class="vrai">
                <option value="" disabled selected>Choisir l'option correcte</option>
                <option value="option1">Option 1</option>
                <option value="option2">Option 2</option>
                <option value="option3">Option 3</option>
            </select>
            <input type="submit" value="Ajouter" class="ajouter">
        </div>
    </form>
</div>
  </div>
 <!-- pied de page -->
 <footer class="footer"> mariama & ndack @ copyright iam 2023</footer>
</body>
</html>