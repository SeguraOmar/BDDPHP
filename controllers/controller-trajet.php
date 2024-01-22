<?php 

require_once "../config/config.php";
require_once "../models/trajet.php";



session_start();



$rideDistance = 0;
$rideDate = "";  
$transport_id = 0; 
$user_id = 0;



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rideDistance= $_POST["distanceParcourue"];
    $rideDate = $_POST["dateTrajet"];
    $transport_id = $_POST["TypeDeTransport"];
    $user_id = $_POST["Utilisateur"];



    if (isset($_SESSION['user'])) {
        $User_ID = $_SESSION['user']['user_id'];
    }

    trajet::create($rideDistance,$rideDate,$transport_id,$user_id);
}


include_once "../views/view-trajet.php";


?>