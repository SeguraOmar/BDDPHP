<?php

session_start();
$errors = [];
// Inclusion des fichiers nécessaires
require_once "../config/config.php"; // Paramètres de configuration de la base de données
require_once "../models/utilisateur.php"; // Classe Utilisateur

// Vérification si la requête est de type POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Tableau d'erreurs (stockage des erreurs)
    $errors = [];

    // Validation du champ pseudo
    if (empty($_POST['pseudo'])) {
        $errors['pseudo'] = 'Veuillez saisir votre pseudo';
    }

    // Validation du champ mot de passe
    if (empty($_POST['password'])) {
        $errors['password'] = 'Veuillez saisir votre mot de passe';
    }

    // Si les champs sont valides, commence les tests
    if (empty($errors)) {
        // Vérification de l'existence du pseudo avec la méthode checkPseudoExists de la classe Utilisateur
        if (!Utilisateur::checkPseudoExists($_POST['pseudo'])) {
            $errors['pseudo'] = 'Utilisateur inconnu';
        } else {
            // Récupération des informations de l'utilisateur via la méthode getInfos()
            $UtilisateurInfos = Utilisateur::getInfos($_POST['pseudo']);

            // Utilisation de password_verify pour valider le mot de passe
            if (password_verify($_POST['password'], $UtilisateurInfos['user_password'])) {
                $_SESSION["user"] = $UtilisateurInfos;
                unset($_SESSION["user"]["user_password"]);
                // Si la validation du mot de passe est réussie, redirection vers controller-home.php
                header('Location: controller-home.php');
            } else {
                // Sinon, ajout d'une erreur de connexion au tableau d'erreurs
                $errors['connexion'] = 'Mauvais mot de passe';
            }
        }
    }
}
?>

<?php
// Inclusion de la vue
include_once('../views/view-signin.php');
?>
