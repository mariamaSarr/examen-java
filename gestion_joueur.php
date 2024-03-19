<?php

require_once("Connexion.php");
global $connect;

// Avec la méthode des tableaux associatifs
$query = $connect->query("SELECT * FROM joueur ");
$list = $query->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/joueur_onlin.css">
</head>
<body>
    <div class="div">
    
        <div class="div2">
    <table border="1">
        <tr>
            <td>Prenom & nom</td>
            <td>Email</td>
            <td>Bloquer</td>
            <td>Debloquer</td>
            <td>Supprimer</td>
        </tr>

    <?php foreach ($list as $etudiant) { ?>
        <tr>
            <td><?= $etudiant["prenom_nom"] ?></td>
            <td><?= $etudiant["email"] ?></td>
            <td>
            <form action="bloquer.php" method="post">
                <input type="hidden" name="id" value="<?= $etudiant['id'] ?>">
                <button type="submit">Bloquer</button>
            </form>
            </td>
            <td>
            <form action="debloquer.php" method="post">
                <input type="hidden" name="id" value="<?= $etudiant['id'] ?>">
                <button type="submit">Debloquer</button>
            </form>
            </td>
            <td>
            <form action="supprimer.php" method="post" onsubmit="return confirm('Voulez-vous vraiment supprimer cet joueur ?');">
                <input type="hidden" name="id" value="<?= $etudiant['id'] ?>">
                <button type="submit">Supprimer</button>
            </form>
            </td>
        </tr>
    <?php } ?>
    <div>
        <button type="submit"  class="retour"><a href="gestion_user.php"> retour</a></button>
        </div>
</table>
</div>
</div>


</body>
</html>
