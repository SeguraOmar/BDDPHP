<?php  

class Utilisateur {

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
    public static function create(int $userValidate, string $lastname, string $firstname, string $pseudo, string $email, string $dob, string $password, int $id_enterprise) {
        
        try {
            // Les informations de connexion à la base de données
            $dbName = "trajet";
            $dbUser = "Omar";
            $dbPassword = "Frizbee76";

            // Création de l'objet PDO pour la connexion à la base de données
            $db = new PDO("mysql:host=localhost;dbname=$dbName", $dbUser, $dbPassword);
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
}

?>
