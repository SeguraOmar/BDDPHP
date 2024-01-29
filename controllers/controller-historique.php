<?php

require_once "../config/config.php";
require_once "../models/trajet.php";
require_once "../models/utilisateur.php";

session_start();

if (!isset($_SESSION["user"])) {
    // Si l'utilisateur n'est pas connecté on le renvoie vers la page de connexion 
    header("Location: ../controller-signin.php");
    exit();
} else if (isset($_SESSION["user"])) {
    $user_id = $_SESSION["user"]["user_id"];


    // delete trajet 

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (isset($_POST["delete"])) {
            if ($_POST["delete"] === "delete") {
                var_dump($_POST);


                trajet::deleteRide($_POST["ride_id"]);
                header("Location: controller-historique.php");
            } else {
                header("Location: controller-historique.php");
            }
        }
    }
}





include_once "../views/view-historique.php";
