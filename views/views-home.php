<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/home.css">
    <title>Home</title>
</head>
<body>

<header>
    <h2> HOME </h2>
    <a href="../controllers/controller-deconnect.php"><button class="deconnect"> Deconnexion </button></a>
</header>
 <div class="bienvenue-container">   
<h1>
    Bienvenue, <?php echo $pseudo ?></h1>
   <span> <?php echo $date ?></span>
</div>     

<div class="button">
    <a href="../controllers/controller-trajet.php"><button>Créer un trajet</button></a>
    <a href="../controllers/controller-historique.php"><button>Afficher mes trajets</button></a>
    <a href="../controllers/controller-profil.php"><button>Mon Profil</button></a>
</div>



</body>
</html>