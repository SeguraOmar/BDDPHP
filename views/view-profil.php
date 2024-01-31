<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/profil.css">
    <title>Document</title>
</head>

<body>



    <header>

        <a href="../controllers/controller-home.php"><button type="button">Retour</button></a>

    </header>


    <div class="container">

        <h1>Profil de <?= $pseudo ?></h1>

        <p>Nom : <?= $lastname ?></p>
        <p>Entreprise : <?= $entreprise ?></p>
        <p>Prénom : <?= $firstname ?></p>
        <p>Adresse e-mail : <?= $mail ?></p>
        <p>Date de naissance : <?= $naissance ?></p>
        <p>Ma description : <?= $describ ?></p>

        <!-- Si $photo contient le chemin vers l'image, vous pouvez l'afficher comme suit -->
        <img src="../assets/image/<?= $photo ?>" alt="Photo de profil">


        <a href="../controllers/controller-updateProfil.php"><button type="button">Modifier le profil</button></a>

    </div>





</body>

</html>