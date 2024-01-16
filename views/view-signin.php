<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/style/style.css">
</head>

<body>
    
    <!-- Header -->
    <header>
        <!-- Votre code pour l'en-tête -->
    </header>

    <h2>Log in</h2>


    <form action="" method="POST" novalidate>

        

        <label for="pseudo">Pseudo: <?php  if(isset($_POST['pseudo'])){
            if (empty($_POST["pseudo"])) {
                echo '<span style="color: red;">Champs obligatoire.</span>';
                }
        }

         ?> 
         </label><br>
        <input type="text" id="pseudo" name="pseudo" 
            ?>
        </span><br><br>

        <label for="password">Mot de passe: <?php  if(isset($_POST['pseudo'])){
            if (empty($_POST["password"])) {
                echo '<span style="color: red;">Champs obligatoire.</span>';
                }
        }

         ?> 
         </label><br>
        <input type="password" id="password" name="password"
            value="" ?>
        </span><br><br>



        <input type="submit" value="Se connecter">
    </form>

    <!-- Footer -->
    <footer>
        <!-- Votre code pour le pied de page -->
    </footer>



</body>

</html>