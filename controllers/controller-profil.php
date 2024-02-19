<?php 
session_start();
require_once "../config/config.php";
require_once '../models/utilisateur.php';
require_once '../models/enterprise.php';






if (isset($_SESSION['user'])) {
    $user_id = $_SESSION['user']['user_id'];
    $entreprise = $_SESSION['user']['enterprise_id'];
    $pseudo = $_SESSION['user']['user_pseudo'];
    $lastname = $_SESSION['user']['user_name'];
    $firstname = $_SESSION['user']['user_firstname'];
    $mail = $_SESSION['user']['user_email'];
    $naissance = $_SESSION['user']['user_dateofbirth'];
    $photo = $_SESSION['user']['user_photo'];
    $describ = $_SESSION['user']['user_describ'];
    
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["delete"])) {
        if ($_POST["delete"] === "delete") {
            Utilisateur::deleteUser($_SESSION['user']['user_id']);
            header("Location: controller-signin.php");
            exit();
        }
    }
}



include_once "../views/view-profil.php";
?>