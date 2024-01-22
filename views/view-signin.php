<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/style/style.css">
    <link rel="stylesheet" href="../assets/style/signin.css">
</head>

<body>

    <!-- Header -->
    <header>
        <!-- Votre code pour l'en-tête -->
    </header>

    <h2>Log in</h2>

    <!-- Formulaire de connexion -->
    <form action="controller-signin.php" method="POST" novalidate>

        <!-- Champ Pseudo -->
        <label for="pseudo">Pseudo:
            <?php
            // Vérifie si le pseudo a été soumis et s'il est vide
            if (isset($_POST['pseudo']) && empty($_POST["pseudo"])) {
                echo '<span style="color: red;">Champs obligatoire.</span>';
            }
            ?>
        </label><br>
        <input type="text" id="pseudo" name="pseudo" value="<?php echo htmlspecialchars($user_pseudo ?? ''); ?>">
        </span><br><br>

        <!-- Champ Mot de passe -->
        <label for="password">Mot de passe:
            <?php
            // Vérifie si le pseudo a été soumis et s'il est vide
            if (isset($_POST['pseudo']) && empty($_POST["password"])) {
                echo '<span style="color: red;">Champs obligatoire.</span>';
            }
            ?>
        </label><br>
        <input type="password" id="password" name="password" value="">
        </span><br><br>

        <!-- Affichage des erreurs de connexion -->
        <p><?= $errors["connexion"] ?? "" ?></p>

        <!-- Bouton de soumission -->
        <input type="submit" value="Se connecter">
    </form>

    <!-- Footer -->
    <footer>
        <!-- Votre code pour le pied de page -->
    </footer>

</body>

</html>
`
