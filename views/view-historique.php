<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/historique.css">
    <title>Document</title>
</head>
<body>

<header>
    <a href="../controllers/controller-home.php"><h2> HOME </h2></a>
    <a href="../controllers/controller-deconnect.php"><button class="deconnect"> Deconnexion </button></a>
</header>

<div class="container">
    <h2>Mes trajets</h2>
    <?php
    foreach ($trajets as $key => $trajet) {
        echo "<p>Trajet :  " .  ($key +1) . "</p>";
        echo "<p>Date du trajet : " . $trajet["ride_date"] . "</p>";
        echo "<p>Distance du trajet en KM : " . $trajet["ride_distance"] . "</p>";
        echo "<p>Type de transport : " . $trajet["transport_type"] . "</p>";
        echo "<hr>";
    }
    ?>
    <a href="../controllers/controller-home.php"><button type="button">Retour</button></a>
</div>

</body>
</html>
