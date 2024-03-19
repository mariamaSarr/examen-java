<?php
// Récupérer les informations du joueur depuis la base de données (vous devez implémenter cette fonction)
$joueur = array(
    'prenom_nom' => 'prenom_nom',
    'email' => 'email@example.com',
    // Ajoutez d'autres informations du joueur ici
);
// Récupérer l'historique des jeux précédents du joueur depuis la base de données (vous devez implémenter cette fonction)
$historique_jeux = array(
    // Tableau contenant les jeux précédents du joueur
    // Vous pouvez utiliser une boucle pour afficher chaque jeu avec ses détails
);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil du joueur</title>
</head>
<body>
    <h1>Profil du joueur</h1>
    <h2>Informations du joueur</h2>
    <p><strong>Nom:</strong> <?php echo $joueur['prenom_nom']; ?></p>
    <p><strong>Email:</strong> <?php echo $joueur['email']; ?></p>
    <!-- Affichez d'autres informations du joueur ici -->

    <h2>Historique des jeux</h2>
    <ul>
        <!-- Affichez l'historique des jeux précédents du joueur ici -->
        <?php foreach ($historique_jeux as $jeu): ?>
            <li><?php echo $jeu; ?></li>
        <?php endforeach; ?>
    </ul>

    <!-- Formulaire pour permettre au joueur de modifier ses informations (vous devez implémenter cette fonction) -->
    <!-- Vous pouvez utiliser le même formulaire que sur la page de paramètres
