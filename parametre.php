<?php
// Vérification de l'authentification de l'administrateur
session_start();
if (!isset($_SESSION['admin'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas un administrateur
    header("Location: connexion_admin.php");
    exit();
}

// Traitement de la soumission du formulaire de modification des paramètres
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Code de mise à jour des paramètres dans la base de données
    // Insérez votre logique de mise à jour des paramètres ici
    // Assurez-vous de valider et de sécuriser les données entrées par l'administrateur
    // Redirection vers la page de gestion des paramètres après la mise à jour
    header("Location: parametres.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des paramètres</title>
    <!-- Styles CSS -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- En-tête -->
    <header>
        <h1>Gestion des paramètres</h1>
        <a href="deconnexion.php">Déconnexion</a>
    </header>

    <!-- Contenu de la page -->
    <main>
        <h2>Options de configuration</h2>
        <!-- Formulaire de modification des paramètres -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <!-- Champs de formulaire pour les paramètres à modifier -->
            <label for="parametre1">Paramètre 1:</label>
            <input type="text" id="parametre1" name="parametre1" value="<?php // Valeur actuelle du paramètre 1 ?>" required>
            <br>
            <label for="parametre2">Paramètre 2:</label>
            <input type="text" id="parametre2" name="parametre2" value="<?php // Valeur actuelle du paramètre 2 ?>" required>
            <br>
            <!-- Bouton de soumission -->
            <input type="submit" value="Enregistrer les modifications">
        </form>
    </main>

    <!-- Pied de page -->
    <footer>
        <p>&copy; mariama & ndack @ copyright iam 2023</p>
    </footer>
</body>
</html>
