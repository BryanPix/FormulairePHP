<?php 
// l'ordre est important car Utilisateur.php utilise des constantes venant de config.php 

// config
require_once '../config.php';
// models
require_once '../models/Utilisateur.php';

session_start();

if(!isset($_SESSION['user'])){
    header('Location: controller-signin.php');
    exit();
}

// Appliquer une image par defaut en cas de non presence d'image
if(isset($_SESSION['user']['Image_utilisateur']) && $_SESSION['user']['Image_utilisateur'] == 'NULL'){
    $_SESSION['user']['Image_utilisateur'] = 'default.png';
}

$showform = true;
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['delete'])){
        utilisateur::deleteUtilisateur($_SESSION['user']['id_utilisateur']);
        header("Location: controller-signout.php");
        exit();
    }

        $imageUser = "default.png";

        $name = empty($_POST['lastname']) ? $_SESSION['user']['lastname_utilisateur'] : $_POST['lastname'];

        $prenom = empty($_POST['firstname']) ? $_SESSION['user']['firstname_utilisateur']: $_POST['firstname'];

        $pseudo = empty($_POST['nickname'])? $_SESSION['user']['nickname_utilisateur']: $_POST['nickname'];

        $birthdate = empty($_POST['birthdate'])? $_SESSION['user']['birthdate_utilisateur']: $_POST['birthdate'];

        $mail = empty($_POST['mail']) ? $_SESSION['user']['email_utilisateur'] : $_POST['mail'];

        $description = empty($_POST['description']) ? ($_SESSION['user']['description_utilisateur'] == NULL ? "" : $_SESSION['user']['description_utilisateur']) : $_POST['description'];

        Utilisateur::updateUtilisateur($imageUser, $name, $prenom, $pseudo, $birthdate, $mail, $description);
        $_SESSION['user'] = Utilisateur::getInfos($mail);
        
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();

    }


include_once '../views/view-profile.php';
