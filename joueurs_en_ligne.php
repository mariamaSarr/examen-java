
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css\joueur_online.css">
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
        <button type="submit"  class="retour"><a href="user_online.php"> retour</a></button>
        </div>
  <form action="ajout_question.php" method="post">
    <h2>liste des joueurs en ligne</h2>
    <div class="rectangle7">

    
    <?php
$dbhost = 'localhost';
$dbname = 'examen_java';
$dbuser = 'root';
$dbpswd = '';

try {
    $connect = new PDO('mysql:host='.$dbhost.';dbname='.$dbname,$dbuser,$dbpswd, array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
    ));

    // Requête SQL pour récupérer la liste des joueurs
    $query = "SELECT * FROM joueurs";
    $stmt = $connect->query($query);

    // Affichage des joueurs
   
    echo "<ul>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<li>{$row['prenom_nom']}</li>";
    }
    echo "</ul>";
} catch (PDOException $e) {
    die("Une erreur est survenue lors de la connexion à la Base de données !");
}
?>

    </div>
       </form>
  </div>
 <!-- pied de page -->
 <footer class="footer"> mariama & ndack @ copyright iam 2023</footer>
</body>
</html>