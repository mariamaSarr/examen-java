<?php
// Inclure le fichier de connexion à la base de données
require_once('Connexion.php');

// Sélectionner toutes les questions disponibles dans la base de données
$query = $connect->query('SELECT * FROM questions');
$questions = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MENU</title>
    <link rel="stylesheet" href="css/accuilJoueur.css">
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
        <div class="menu"><li><a href="menu_joueur.php"> Menu </a</li></div>
        <div class="parametre"><li><a href="evolution_temps.php"> Evolution du temps</a></li></div>
        <div class="profil"><li><a href="#">Top Score</a></li></div>
      </ul>
    </nav>
  </div>
  <div class="line_4"></div>
  <div class="deconnexion">
    <nav><ul><li><a href="deconnexion.php"> DECONNEXION</a></li></ul></nav>
  </div>
  <div class="rectangle6">
  <form action="" method="post">
  <h2>Choisissez une question à répondre </h2>
    <div class="rectangle7">
        <form action="traitement_question.php" method="post">
            <select name="id_question" class="select">
            <option value="" disabled selected>Choisir une question</option>
                <?php foreach ($questions as $question) { ?>
                    <option value="<?php echo $question['id']; ?>"><?php echo $question['question_text']; ?></option>
                <?php } ?>
            </select>
            <br><br>
            <button type="submit" class="submit" ><a href="jouer.php">Repondre</a></button>
        </form>
    </div>
       </form>
  </div>

 <!-- pied de page -->
 <footer class="footer"> mariama & ndack @ copyright iam 2023</footer>
</body>
</html>
