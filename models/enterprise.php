<?php


class Entreprise {

    /**
         * Méthode permettant de récupérer les informations de toutes les entreprises
         *
         * @return string
         */
        public static function getEntreprises(): string
        {
            try {
                // Création d'un objet $db selon la classe PDO
                $db = new PDO("mysql:host=localhost;dbname=" . DB_NAME, DB_USER, DB_PASS);
    
                // stockage de ma requete dans une variable
                $sql = "SELECT * FROM enterprise";
    
                // je prepare ma requête pour éviter les injections SQL
                $query = $db->prepare($sql);
    
             
                // on execute la requête
                $query->execute();
    
                // on récupère le résultat de la requête dans une variable
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
    
                // on retourne le résultat
                return json_encode($result);
            } catch (PDOException $e) {
                echo 'Erreur : ' . $e->getMessage();
                die();
            }
        }

}


    ?>