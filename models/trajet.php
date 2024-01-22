<?php

class trajet {


public static function create ( int $rideDistance, string $rideDate, string $ridePhoto, int $user_id, int $transport_id) {

try {
    // Les informations de connexion à la base de données
    $dbName = "trajet";
    $dbUser = "Omar";
    $dbPassword = "Frizbee76";

    $db = new PDO("mysql:host=localhost;dbname=$dbName", $dbUser, $dbPassword);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   $sql =  "INSERT INTO `ride`(`ride_date`, `ride_distance`, `ride_photo`, `user_id`, `transport_id`) VALUES (:rideDate, :rideDistance, :ridePhoto, :user_id, :transport_id)";

   $query = $db->prepare($sql);

   $query->bindValue(':ridedistance', htmlspecialchars($trajetdistance), PDO::PARAM_STR);
   $query->bindValue(':ridedate', htmlspecialchars($trajetdate), PDO::PARAM_STR);
   $query->bindValue(':userid', $user_id, PDO::PARAM_INT);
   $query->bindValue(':transport_id', $transport_id, PDO::PARAM_INT);

   $query -> execute();
  }

   catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
    die();
   }

 }
}