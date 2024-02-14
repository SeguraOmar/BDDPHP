<?php

class Utilisateur
{

    /**
     * Méthode permettant de créer un utilisateur
     *
     * @param int    $userValidate   Validation de l'utilisateur
     * @param string $lastname       Nom de l'utilisateur
     * @param string $firstname      Prénom de l'utilisateur
     * @param string $pseudo         Pseudo de l'utilisateur
     * @param string $email          Adresse mail de l'utilisateur
     * @param string $dob            Date de naissance de l'utilisateur
     * @param string $password       Mot de passe de l'utilisateur
     * @param int    $id_enterprise  Id de l'entreprise de l'utilisateur
     */
    public static function create(int $userValidate, string $lastname, string $firstname, string $pseudo, string $email, string $dob, string $password, int $id_enterprise)
    {

        try {
            // Les informations de connexion à la base de données
            $dbName = "trajet";
            $dbUser = "Omar";
            $dbPassword = "Frizbee76";

            // Création de l'objet PDO pour la connexion à la base de données
            $db = new PDO("mysql:host=localhost;dbname=" . DB_NAME, DB_USER, DB_PASS);
            // Paramétrage des erreurs PDO pour les afficher en cas de problème
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Requête SQL d'insertion des données dans la table userprofil
            $sql = "INSERT INTO `userprofil`(`user_validate`, `user_name`, `user_firstname`, `user_pseudo`, `user_email`, `user_dateofbirth`, `user_password`, `enterprise_id`) VALUES (:userValidate, :lastname, :firstname, :pseudo, :email, :birthdate, :userPassword, :id_enterprise)";

            // Préparation de la requête
            $query = $db->prepare($sql);

            // Liaison des valeurs avec les paramètres de la requête
            $query->bindValue(':userValidate', $userValidate, PDO::PARAM_INT);
            $query->bindValue(':lastname', htmlspecialchars($lastname), PDO::PARAM_STR);
            $query->bindValue(':firstname', htmlspecialchars($firstname), PDO::PARAM_STR);
            $query->bindValue(':pseudo', htmlspecialchars($pseudo), PDO::PARAM_STR);
            $query->bindValue(':email', htmlspecialchars($email), PDO::PARAM_STR);
            $query->bindValue(':birthdate', $dob, PDO::PARAM_STR);
            $query->bindValue(':userPassword', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR); // Utilisation de l'algorithme PASSWORD_DEFAULT
            $query->bindValue(':id_enterprise', $id_enterprise, PDO::PARAM_INT);

            // Exécution de la requête
            $query->execute();
        } catch (PDOException $e) {
            // En cas d'erreur, affichage du message d'erreur et arrêt du script
            echo "Erreur : " . $e->getMessage();
            die();
        }
    }

    /**
     * Methode permettant de récupérer les informations d'un utilisateur avec son pseudo comme paramètre
     * 
     * @param string $pseudo pseudo de l'utilisateur
     * 
     * @return bool
     */
    public static function checkPseudoExists(string $pseudo): bool
    {
        // le try and catch permet de gérer les erreurs, nous allons l'utiliser pour gérer les erreurs liées à la base de données
        try {
            // Création d'un objet $db selon la classe PDO
            $db = new PDO("mysql:host=localhost;dbname=" . DB_NAME, DB_USER, DB_PASS);

            // stockage de ma requete dans une variable
            $sql = "SELECT * FROM `userprofil` WHERE `user_pseudo` = :pseudo";

            // je prepare ma requête pour éviter les injections SQL
            $query = $db->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);

            // on execute la requête
            $query->execute();

            // on récupère le résultat de la requête dans une variable
            $result = $query->fetch(PDO::FETCH_ASSOC);

            // on vérifie si le résultat est vide car si c'est le cas, cela veut dire que le pseudo n'existe pas
            if (empty($result)) {
                return false;
            } else {
                return true;
            }
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }

    /**
     * Méthode permettant de récupérer les informations d'un utilisateur avec son pseudo comme paramètre
     * 
     * @param string $pseudo Pseudo de l'utilisateur
     * 
     * @return array
     */
    public static function getInfos(string $pseudo): array
    {
        try {
            // Création d'un objet $db selon la classe PDO
            $db = new PDO("mysql:host=localhost;dbname=" . DB_NAME, DB_USER, DB_PASS);

            // stockage de ma requete dans une variable
            $sql = "SELECT * FROM `userprofil` WHERE `user_pseudo` = :pseudo";

            // je prepare ma requête pour éviter les injections SQL
            $query = $db->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);

            // on execute la requête
            $query->execute();

            // on récupère le résultat de la requête dans une variable
            $result = $query->fetch(PDO::FETCH_ASSOC);

            // on retourne le résultat
            return $result;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }

    public static function UpdateProfil(int $user_id, string $lastname, string $firstname, string $pseudo, string $describ, string $email, string $photo)
    {
        try {
            // Création d'un objet $db selon la classe PDO
            $db = new PDO("mysql:host=localhost;dbname=" . DB_NAME, DB_USER, DB_PASS);

            // stockage de ma requete dans une variable
            $sql = "UPDATE `userprofil` SET `user_name` = :lastname, `user_firstname` = :firstname, `user_pseudo` = :pseudo,
            `user_describ` = :describ, `user_email` = :email, `user_photo` = :photo WHERE `user_id` = :user_id";

            // je prepare ma requête pour éviter les injections SQL
            $query = $db->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $query->bindValue(':lastname', htmlspecialchars($lastname), PDO::PARAM_STR);
            $query->bindValue(':firstname', htmlspecialchars($firstname), PDO::PARAM_STR);
            $query->bindValue(':pseudo', htmlspecialchars($pseudo), PDO::PARAM_STR);
            $query->bindValue(':email', htmlspecialchars($email), PDO::PARAM_STR);
            $query->bindValue(':photo', htmlspecialchars($photo), PDO::PARAM_STR);
            $query->bindValue(':describ', htmlspecialchars($describ), PDO::PARAM_STR);


            // on execute la requête
            $query->execute();
            var_dump("ok");
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }

    public static function deleteUser(int $user_id)
    {


        try {



            // Création de l'objet PDO pour la connexion à la base de données
            $db = new PDO("mysql:host=localhost;dbname=" . DB_NAME, DB_USER, DB_PASS);
            // Paramétrage des erreurs PDO pour les afficher en cas de problème
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "DELETE FROM `userprofil` WHERE `user_id` = :user_id";
            // Préparation de la requête
            $query = $db->prepare($sql);
            $query->bindValue(":user_id", $user_id, PDO::PARAM_INT);
            $query->execute();
        } catch (PDOException $e) {
            // En cas d'erreur, affichage du message d'erreur et arrêt du script
            echo "Erreur : " . $e->getMessage();
            die();
        }
    }
    
}
