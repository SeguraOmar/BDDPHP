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

<ul>
    <li>Entreprise : <?= $entreprise ?></li>
    <li>Nom : <?= $lastname ?></li>
    <li>Prénom : <?= $firstname ?></li>
    <li>Adresse e-mail : <?= $mail ?></li>
    <li>Date de naissance : <?= $naissance ?></li>
</ul>

</div>





</body>
</html>