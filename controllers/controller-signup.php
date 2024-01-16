<?php
// j'appelle ma config et mon utilisateur
require_once '../config/config.php';
require_once '../models/utilisateur.php';
// Vérification des données postées depuis le formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$errors = [];

// Vérification du nom
if (empty($_POST["firstname"])) {
$errors['firstname'] = "Champs obligatoire.";
} else if (!preg_match("/^[a-zA-ZÀ-ÿ\-]+$/", $_POST["firstname"])) {
$errors['firstname'] = "Le nom est invalide.";
}

// Vérification du prénom
if (empty($_POST["firstname"])) {
$errors['firstname'] = "Champs obligatoire.";
} else if (!preg_match("/^[a-zA-ZÀ-ÿ\-]+$/", $_POST["lastname"])) {
$errors['firstname'] = "Le nom est invalide.";
}

// Verification du select
// Vérifie si la variable POST 'id_entreprise' est définie et n'est pas vide
if (isset($_POST['id_enterprise']) && !empty($_POST['id_enterprise'])) {
$id_enterprise = $_POST['id_enterprise'];

// Vérifie si la valeur est l'une des valeurs attendues
if ($id_enterprise === "1" || $id_enterprise === "2") {
// La valeur est valide, vous pouvez faire ce que vous avez besoin de faire avec $id_$enterprise
echo "ID de l'enterprise valide : " . $id_enterprise;
} else {
// La valeur n'est pas valide
echo "Valeur de l'ID de l'enterprise non valide.";
}
} else {
// La variable n'a pas été définie ou est vide
echo "L'ID de l'enterprise n'a pas été fourni ou est vide.";
}

// Vérification du Pseudo
$regexPseudo = '/^[a-zA-Z_\-\d]+$/';
if (empty($_POST["pseudo"])) {
$errors['pseudo'] = "Champs obligatoire.";
} 

// Vérification de l'email
if (empty($_POST["email"])) {
$errors['email'] = "Champs obligatoire.";
} else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
$errors['email'] = "L'adresse email est invalide.";
}

// Vérification de la date de naissance
if (empty($_POST["dob"])) {
$errors['dob'] = "La date de naissance est obligatoire.";
}

// Vérification du mot de passe
$password = $_POST["password"];
$confirm_password = $_POST["confirm_password"];
if (empty($password) || strlen($password) < 8 || $password !== $confirm_password) {
$errors['password'] = "Le mot de passe doit comporter au moins 8 caractères et correspondre.";
}

if (!isset($_POST["CGU"])) {
$errors['CGU'] = "Les CGU sont obligatoires";
}

// Affichage des erreurs
// Si aucune erreur détectée
if (empty($errors)) {
// Afficher la synthèse des informations et le message de confirmation
$nom = $_POST['firstname'];
$prenom = $_POST['lastname'];
$email = $_POST['email'];
$dob = $_POST['dob'];

// Cacher le formulaire
$formHidden = true;

// Envoyer le mail de confirmation (simulation ici)
$message = "Bonjour $prenom $nom, votre inscription a bien été enregistrée.";
// Envoi du mail (à remplacer par votre code d'envoi de mail)
// mail($email, 'Confirmation d\'inscription', $message);

// Afficher la synthèse des informations et le message de confirmation
if(empty($errors)){
    // Instance d'une PDO 
    try {
        $dbName = "trajet";
        $dbUser = "Omar";
        $dbPassword ="Frizbee76";
        $db = new PDO("mysql:host=localhost;dbname=$dbName", $dbUser,  $dbPassword);
        
        
        //stockage de ma requete toujours avant le catch
        $sql = "INSERT INTO `userprofil`(`user_validate`, `user_name`, `user_firstname`, `user_pseudo`, `user_email`, `user_dateofbirth`, `user_password`, `enterprise_id`) VALUES (:userValidate, :lastname, :firstname, :pseudo, :email, :birthdate, :userPassword, :id_enterprise)";
        
        $query = $db->prepare($sql);
        
        $lastname = htmlspecialchars($_POST['lastname']);
        $firstname = htmlspecialchars($_POST['firstname']);
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $id_enterprise =$_POST['id_enterprise'];
        $userValidate = 1;

        
        Utilisateur::create($userValidate, $lastname, $firstname, $pseudo, $email, $dob, $password, $id_enterprise);
        


    } catch (PDOException $e){
        echo "Erreur : " . $e->getMessage();
        die();
    }
include('../views/view-summary.php');
exit; // Arrêter l'exécution du script
}
}
?>
<?php

}
// Contrôleur - Gestion de la logique métier

// Vérifications et traitements du formulaire ici

// Inclusion de la vue
include_once('../views/view-signup.php');
?>