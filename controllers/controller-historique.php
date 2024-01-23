<?php

require_once "../config/config.php";
require_once "../models/trajet.php";
require_once "../models/utilisateur.php";

session_start();

if(!isset($_SESSION["user"])){
    // Si l'utilisateur n'est pas connecté on le renvoie vers la page de connexion 
    header ("Location: ../controller-signin.php");
    exit();
}

else if(isset($_SESSION["user"])){
    $user_id = $_SESSION["user"]["user_id"];
    $trajets = trajet::historique($user_id);
}




include_once "../views/view-historique.php";

?>