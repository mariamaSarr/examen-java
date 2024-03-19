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

     // Requête préparée pour joueur
     $queryJoueur = $connect->prepare('INSERT INTO joueur (prenom_nom, email, password, confirmer) VALUES (?, ?, ?, ?)');
     $testqueryJoueur = $queryJoueur->execute([$prenom_nom, $email, $password, $confirmer]);
     //test pour admin
    if ($queryAdmin ->execute()) {
        echo "votre compte est créer avec succès";
        header("Location: Menu.php");
        exit;
    } elseif ($queryJoueur ->execute()){
    //test pour joueur 
        echo "votre compte est créer  avec succès";
        header("Location: Menu.php");
        exit;
    } else {
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
     <link rel="stylesheet" href="css/inscription.css">
</head>
<body >
<div class="rectangle6">
<form action="" method="post">
    <h3>Remplir les champs pour créer votre compte</h3>
    <div class="rectangle7">
        <input type="text" name="prenom_nom" placeholder="Prenom & Nom" class="prenom"></input><br>
        <input type="text" name="email" placeholder="Email" class="pseudo"></input><br>
        <input type="password" name="password" placeholder="Mot de passe" class="mot_de_passe"></input><br>
        <input type="password" name="confirmer" placeholder="Confirmer" class="confirmer"></input><br>
        <input type="submit" value="Créer" class="creer"></input><br>
    </div>
</form>
  </div>
   <!-- pied de page -->
 <footer class="footer"> mariama & ndack @ copyright iam 2023</footer>

</body>
</html>