<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../assets/style/historique.css">
    <title>Document</title>
</head>

<body>

    <header>
        <a href="../controllers/controller-home.php">
            <h2> HOME </h2>
        </a>
        <a href="../controllers/controller-home.php"><button type="button">Retour</button></a>
        <a href="../controllers/controller-deconnect.php"><button class="deconnect"> Deconnexion </button></a>
    </header>

    <div class="container">
        <h2>Mes trajets</h2>

        <?php
        foreach (trajet::historique($user_id) as $key => $trajet) {
            echo "<p>Trajet :  " .  ($key + 1) . "</p>";
            echo "<p>Date du trajet : " . $trajet["ride_date"] . "</p>";
            echo "<p>Distance du trajet en KM : " . $trajet["ride_distance"] . "</p>";
            echo "<p>Type de transport : " . $trajet["transport_type"] . "</p>";
            echo "<form action='' method='post' onsubmit='return confirm(\"Voulez-vous supprimer le trajet? (La suppression sera effectuée même en cliquant sur Annuler)\")'>";
            echo "    <input type='hidden' name='ride_id' value='" . $trajet["ride_id"] . "'>";
            echo "    <input type='submit' name='delete' value='delete'>";
            echo "</form>";
            echo "<hr>";
        }
        ?>


    </div>

</body>

</html>