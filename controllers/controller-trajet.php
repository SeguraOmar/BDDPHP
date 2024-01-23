<?php 

require_once "../config/config.php";
require_once "../models/trajet.php";



session_start();



// $rideDistance = 0;
// $rideDate = "";  
// $transport_id = 0; 
// $user_id = 0;



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rideDistance= $_POST["distanceParcourue"];
    $rideDate = $_POST["dateTrajet"];
    $transport_id = $_POST["TypeDeTransport"];



    if (isset($_SESSION['user'])) {
        $user_id = $_SESSION['user']['user_id'];
    }

    trajet::create($rideDate,$rideDistance,$user_id,$transport_id);
}


include_once "../views/view-trajet.php";


?>