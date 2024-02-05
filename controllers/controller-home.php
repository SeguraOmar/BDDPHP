 <?php
include_once "../models/utilisateur.php";
    session_start();
    if (isset($_SESSION["user"])) {
        $date = date('d F Y');
        $pseudo = $_SESSION['user']['user_pseudo'];
        $photo = $_SESSION['user']['user_photo'];}
        // $defaultPic = $_SESSION['user']['user_default'];
    







    ?>













<?php


// Contrôleur - Gestion de la logique métier

// Vérifications et traitements du formulaire ici

// Inclusion de la vue
include_once('../views/views-home.php');
?>