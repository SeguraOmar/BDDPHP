<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Synthèse d'inscription</title>
</head>

<body>
    <h2>Synthèse d'inscription</h2>

    <p>Merci pour votre inscription !</p>

    <?php
    echo "<p>Nom : $nom</p>";
    echo "<p>Prénom : $prenom</p>";
    echo "<p>Pseudo : $pseudo</p>";
    echo "<p>Email : $email</p>";
    echo "<p>Entreprise : $id_enterprise</p>";
    echo "<p>Date de naissance : $dob</p>";
    ?>

    <p>Un email de confirmation a été envoyé à
        <?php echo $email; ?>.
    </p>

</body>

</html>