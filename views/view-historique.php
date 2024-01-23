<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php 

foreach ($trajets as $trajet) {
    echo "<p> Date du trajet : " . $trajet["ride_date"] . "</p>";
    echo "<p> Distance du trajet : " . $trajet["ride_distance"] . "</p>";
    echo "<p> Transport " . $trajet["transport_type"] . "</p>";
}


?>

</body>
</html>