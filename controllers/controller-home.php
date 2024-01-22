<?php 
session_start();
if(isset($_SESSION["user"])){
$date = date('d F Y');
$pseudo = $_SESSION['user']['user_pseudo'];
// $defaultPic = $_SESSION['user']['user_default'];
}







?>













<?php


// Contrôleur - Gestion de la logique métier

// Vérifications et traitements du formulaire ici

// Inclusion de la vue
include_once('../views/views-home.php');
?>