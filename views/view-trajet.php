<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/trajet.css">
    <title>Document</title>
</head>
<body>


<header>
    <a href="../controllers/controller-home.php"><h2> HOME </h2></a>
    <a href="../controllers/controller-deconnect.php"><button class="deconnect"> Deconnexion </button></a>
</header>


<form class="formTrajet" action="../controllers/controller-trajet.php" method="post" enctype="multipart/form-data">
        <label for="dateTrajet">Date du trajet:</label>
        <input type="date" id="dateTrajet" name="dateTrajet" required>

        <label for="distanceParcourue">Distance parcourue (en km):</label>
        <input type="number" step="0.10" id="distanceParcourue" name="distanceParcourue" required>

    


       Type de transport : <select id="transportType" name="TypeDeTransport" required>
            <option value="1" <?php if (!empty($transport_id) && $transport_id == "1") {
                                    echo "selected";
                                } ?>>Vélo</option>
            <option value="2" <?php if (!empty($transport_id) && $transport_id == "2") {
                                    echo "selected";
                                } ?>>Marche</option><br>
            <option value="3" <?php if (!empty($transport_id) && $transport_id == "3") {
                                    echo "selected";
                                } ?>>Roller</option><br>
            <option value="4" <?php if (!empty($transport_id) && $transport_id == "4") {
                                    echo "selected";
                                } ?>>Skate</option><br>
            <option value="5" <?php if (!empty($transport_id) && $transport_id == "5") {
                                    echo "selected";
                                } ?>>Trotinette</option><br>
            <button type="submit">Ajouter</button><br>

            <input  type="submit" value="Enregistrer le trajet">
            <a href="../controllers/controller-home.php"><button type="button">Annuler le trajet</button></a>
    </form>
    
</body>
</html>