<?php
// Récupérer les informations de l'administrateur depuis la base de données (vous devez implémenter cette fonction)
$administrateur = array(
    'prenom_nom' => 'Nom de l\'administrateur',
    'email' => 'email@admin.com',
    // Ajoutez d'autres informations de l'administrateur ici
);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil de l'administrateur</title>
</head>
<body>
    <h1>Profil de l'administrateur</h1>
    <h2>Informations de l'administrateur</h2>
    <p><strong>Nom:</strong> <?php echo $administrateur['prenom_nom']; ?></p>
    <p><strong>Email:</strong> <?php echo $administrateur['email']; ?></p>
    <!-- Affichez d'autres informations de l'administrateur ici -->

    <!-- Formulaire pour permettre à l'administrateur de modifier ses informations (vous devez implémenter cette fonction) -->
    <h2>Modifier les informations de l'administrateur</h2>
    <form action="traitement_modification_admin.php" method="post">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" value="<?php echo $administrateur['prenom_nom']; ?>"><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $administrateur['email']; ?>"><br><br>
        <!-- Ajoutez d'autres champs pour les autres informations de l'administrateur si nécessaire -->
        <input type="submit" value="Enregistrer les modifications">
    </form>

    <!-- Options de gestion -->
    <h2>Options de gestion</h2>
    <ul>
        <li><a href="gestion_joueur.php">Gérer les joueurs</a></li>
        <li><a href="ajout_question.php">Gérer les questions</a></li>
        <li><a href="parametre.php">Paramètres de l'application</a></li>
        <!-- Ajoutez d'autres options de gestion ici -->
    </ul>
</body>
</html>
