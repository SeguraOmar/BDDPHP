<?php

class trajet
{


    public static function create(string $rideDate, string $rideDistance,  int $user_id, int $transport_id)
    {

        try {
            // Les informations de connexion à la base de données
            $dbName = "trajet";
            $dbUser = "Omar";
            $dbPassword = "Frizbee76";

            $db = new PDO("mysql:host=localhost;dbname=$dbName", $dbUser, $dbPassword);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql =  "INSERT INTO `ride`(`ride_date`, `ride_distance`, `user_id`, `transport_id`) VALUES (:rideDate, :rideDistance, :user_id, :transport_id)";

            $query = $db->prepare($sql);

            $query->bindValue(':rideDistance', ($rideDistance), PDO::PARAM_STR);
            $query->bindValue(':rideDate', ($rideDate), PDO::PARAM_STR);
            $query->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $query->bindValue(':transport_id', $transport_id, PDO::PARAM_INT);


            $query->execute();
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            die();
        }
    }



    public static function historique(int $user_id)
    {
        try {
            // Les informations de connexion à la base de données


            // Création de l'objet PDO pour la connexion à la base de données
            $db = new PDO("mysql:host=localhost;dbname=" . DB_NAME, DB_USER, DB_PASS);
            // Paramétrage des erreurs PDO pour les afficher en cas de problème
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM ride NATURAL JOIN transport WHERE user_id = :user_id";
            // Préparation de la requête
            $query = $db->prepare($sql);
            $query->bindValue(":user_id", $user_id, PDO::PARAM_INT) .
                $query->execute();
            $result =  $query->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($result);
        } catch (PDOException $e) {
            // En cas d'erreur, affichage du message d'erreur et arrêt du script
            echo "Erreur : " . $e->getMessage();
            die();
        }
    }


    public static function deleteRide(int $ride_id)
    {


        try {



            // Création de l'objet PDO pour la connexion à la base de données
            $db = new PDO("mysql:host=localhost;dbname=" . DB_NAME, DB_USER, DB_PASS);
            // Paramétrage des erreurs PDO pour les afficher en cas de problème
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "DELETE FROM `ride` WHERE `ride_id` = :ride_id";
            // Préparation de la requête
            $query = $db->prepare($sql);
            $query->bindValue(":ride_id", $ride_id, PDO::PARAM_INT);
            $query->execute();
        } catch (PDOException $e) {
            // En cas d'erreur, affichage du message d'erreur et arrêt du script
            echo "Erreur : " . $e->getMessage();
            die();
        }
    }
}
