<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h2>Modifier le Profil</h2>
    <form action="" method="post" enctype="multipart/form-data">
        Pseudo <input name="pseudo" type="text" value="<?= $_SESSION['user']['user_pseudo'] ?>"></input><br>
        Nom <input name="firstname" type="text" value="<?= $_SESSION['user']['user_name'] ?>"><br>
        Prénom <input name="lastname" type="text" value="<?= $_SESSION['user']['user_firstname'] ?>"><br>
        Email <input name="email" type="text" value="<?= $_SESSION['user']['user_email'] ?>"><br>
        <select class="fs-4 col-12 text-center" name="enterprise" id="enterprise"><br>
            <option value="" disabled selected>Selectionner une entreprise</option>
            <?php foreach (Entreprise::getEntreprises() as $entreprise) { ?>
                <option value="<?= $entreprise['enterprise_id']  ?>" <?= $entreprise['enterprise_id'] = $_SESSION['user']['enterprise_id'] ? 'selected' : '';  ?>><?= $entreprise['enterprise_name'] ?></option>
            <?php } ?>
        </select>

        
        <label class="fs-5" for="dob">Description:</label><br>
        <textarea cols="30" rows="10" name="user_describ"><?= $_SESSION['user']['user_describ'] ?></textarea>
        Ajouter une photo <input type="file" name="user_photo" accept="image/*"><br>
        <input type="submit" value="Enregistrer">
    </form>

</body>

</html>