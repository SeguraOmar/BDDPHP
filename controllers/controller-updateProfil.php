<?php
require_once "../config/config.php";
require_once "../models/utilisateur.php";

session_start();
var_dump($_SESSION);
var_dump($_FILES);
if (!isset($_SESSION["user"])) {
    // Si l'utilisateur n'est pas connecté, on le renvoie vers la page de connexion 
    header("Location: ../controller-signin.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    $user_id = $_SESSION["user"]["user_id"];  
    $lastname = $_POST["lastname"];
    $firstname = $_POST["firstname"];
    $pseudo = $_POST["pseudo"];
    $email = $_POST["email"];
    $photo = $_FILES["user_photo"]['name'];

    // Mettez à jour le profil
    
    Utilisateur::UpdateProfil($user_id, $lastname, $firstname, $pseudo, $email, $photo);


    $target_dir = "../assets/image/";
    $target_file = $target_dir . basename($_FILES["user_photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["user_photo"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }
    
    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["user_photo"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["user_photo"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["user_photo"]["name"])). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }

    $_SESSION["user"] = Utilisateur::getInfos($pseudo);
    


    header ("Location: controller-profil.php");
    exit();
}

include_once "../views/view-updateProfil.php";