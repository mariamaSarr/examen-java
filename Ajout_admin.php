<?php
require_once('Connexion.php');

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $prenom_nom = $_POST['prenom_nom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmer = $_POST['confirmer'];

    // Requête préparée pour admin
    $queryAdmin = $connect->prepare('INSERT INTO admin (prenom_nom, email, password, confirmer) VALUES (?, ?, ?, ?)');
    $testqueryAdmin = $queryAdmin->execute([$prenom_nom, $email, $password, $confirmer]);

    //test pour admin
    if ($queryAdmin ->execute()) {
        echo "votre compte est créer avec succès";
        header("Location: Accueil_admin.php");
        exit;
    }else {
        echo "Erreur d'insertion : " . $query->errorInfo()[2];
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/admin.css">
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
        <button type="submit"  class="retour"><a href="add_user.php"> retour</a></button>
        </div>
  <form action="Ajout_admin.php" method="post">
    <h2>Ajouter un administrateur</h2>
    <div class="rectangle7">
      <!-- formulaire -->
   
            <input type="text" class="prenom" id="signup-username" placeholder="prenom_nom" name="prenom_nom" required><br>
            <input type="test"  placeholder=" Email" class="pseudo" id="signup-email" name="email" required><br>
            <input type="password" name="password" placeholder="Mot de passe" class="mot_de_passe" id="signup-password"></input><br>
            <input type="password" name="confirmer" placeholder="Confirmer" class="confirmer" id="signup-password"></input><br>
            <input type="submit" value="Ajouter ->"class="ajouter" onclick="click()"></input><br>
   
       </form>
  </div>
 <!-- pied de page -->
 <footer class="footer"> mariama & ndack @ copyright iam 2023</footer>
</body>
</html>