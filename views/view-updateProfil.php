<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h2>Modifier le Profil</h2>
    <form action="" method="post">
        Pseudo <input name="pseudo" type="text" value="<?= $_SESSION['user']['user_pseudo'] ?>"></input><br>
        Nom <input name="firstname" type="text" value="<?= $_SESSION['user']['user_name'] ?>"><br>
        Prénom <input name="lastname" type="text" value="<?= $_SESSION['user']['user_firstname'] ?>"><br>
        Email <input name="email" type="text" value="<?= $_SESSION['user']['user_email'] ?>"><br>
        Ajouter une photo <input type="file" name="User_Photo" accept="image/*"><br>
        <input type="submit" value="Enregistrer">
    </form>

</body>

</html>