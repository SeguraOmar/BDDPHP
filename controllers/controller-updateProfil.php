<?php
require_once "../config/config.php";
require_once "../models/utilisateur.php";

session_start();
var_dump($_SESSION);
var_dump($_FILES);
if (!isset($_SESSION["user"])) {
    // Si l'utilisateur n'est pas connecté, on le renvoie vers la page de connexion 
    header("Location: ../controller-signin.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    $user_id = $_SESSION["user"]["user_id"];  
    $lastname = $_POST["lastname"];
    $firstname = $_POST["firstname"];
    $pseudo = $_POST["pseudo"];
    $email = $_POST["email"];
    $photo = $_FILES["user_photo"];

    // Mettez à jour le profil
    
    Utilisateur::UpdateProfil($user_id, $lastname, $firstname, $pseudo, $email, $photo);


    $_SESSION['user']['user_name'] = $lastname;
    $_SESSION['user']['user_firstname'] = $firstname;
    $_SESSION['user']['user_pseudo'] = $pseudo;
    $_SESSION['user']['user_email'] = $email;
    $_SESSION['user']['user_photo'] = $photo;





    header ("Location: controller-profil.php");
    exit();
}

include_once "../views/view-updateProfil.php";