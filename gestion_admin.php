<?php
require_once("Connexion.php");
global $connect;

// Récupérer la liste des administrateurs depuis la base de données
$query = $connect->query("SELECT * FROM administrateurs");
$admins = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des administrateurs</title>
    <link rel="stylesheet" href="css/joueur_onlin.css">
</head>
<body>
    <div class="div">
        <h2>Gestion des administrateurs</h2>
        <table border="1">
            <tr>
                <td>Nom d'utilisateur</td>
                <td>Email</td>
                <td>Action</td>
            </tr>

            <?php foreach ($admins as $admin) { ?>
                <tr>
                    <td><?= $admin["prenom_nom"] ?></td>
                    <td><?= $admin["email"] ?></td>
                    <td>
                        <form action="modifier_admin.php" method="post">
                            <input type="hidden" name="id" value="<?= $admin['id'] ?>">
                            <button type="submit">Modifier</button>
                        </form>
                        <form action="supprimer_admin.php" method="post" onsubmit="return confirm('Voulez-vous vraiment supprimer cet administrateur ?');">
                            <input type="hidden" name="id" value="<?= $admin['id'] ?>">
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <div>
            <button type="submit" class="retour"><a href="menu_admin.php">Retour</a></button>
        </div>
    </div>
</body>
</html>
