<?php

require_once('Connexion.php');
global $connect;

if (isset($_POST["email"], $_POST["password"])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    //requete prepare pour admin//
    $sqlAdmin = "SELECT * FROM admin WHERE email = ? AND password = ?";
    $queryAdmin = $connect->prepare($sqlAdmin);
    $queryAdmin->execute([$email, $password]);



    //test pour admin
    if ($queryAdmin->rowCount() === 1) {
        header("Location: Accueil_admin.php");
        exit;
    
    } else {
        echo "Erreur de connexion";
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="css/connexion.css">
</head>
<body >
    <div class="rectangle6">
    <form action="" class="page" method="post">
    <h1> Administrateur </h1>
    <div class="input">
        <input type="text" name="email" placeholder=" Email or Telephone" class="email_tel"id="signup-email" name="signup-password" required ></input><br>
        <input type="password" name="password" placeholder="Mot de passe" class="password" id="signup-password" required ></input><br>
        <input type="submit" name="login" value="S'identifier" class="login"></input><br>
    </form>
    </div>
  </div>
   <!-- pied de page -->
 <footer class="footer"> mariama & ndack @ copyright iam 2023</footer>

</body>
</html>