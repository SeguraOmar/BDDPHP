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

// delete trajet 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ride_id = isset($_POST['ride_id']) ? intval($_POST['ride_id']) : 0;

    if ($ride_id > 0) {
        // config
        require_once '../config.php';
        // models
        require_once '../models/trajet.php';

        trajet::deleteRide($ride_id);
    }

    // Redirection après suppression
    header("Location: ../controllers/controller-historique.php");
    exit();
} 






include_once "../views/view-historique.php";

?>