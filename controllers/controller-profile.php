<?php
// l'ordre est important car Utilisateur.php utilise des constantes venant de config.php 

// config
require_once '../config.php';
// models
require_once '../models/Utilisateur.php';


session_start();

if (!isset($_SESSION['user'])) {
    header('Location: controller-signin.php');
    exit();
}


$showform = true;
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['delete'])) {
        Utilisateur::deleteUtilisateur($_SESSION['user']['id_utilisateur']);
        header("Location: controller-signout.php");
        exit();
    }

    if (!empty($_FILES['userImage']['name'])) {
        $target_dir = "../assets/img/";
        $target_file = $target_dir . basename($_FILES["userImage"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (file_exists($target_file)) {
            $errors[] = "Désolé, cette image existe déjà.";
            $uploadOk = 0;
        }

        if ($_FILES["userImage"]["size"] > 500000) {
            $errors[] = "Désolé, votre image est trop volumineuse.";
            $uploadOk = 0;
        }

        $allowedExtensions = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($imageFileType, $allowedExtensions)) {
            $errors[] = "Désolé, seules les images de type JPG, JPEG, PNG & GIF sont autorisées.";
            $uploadOk = 0;
        }

        if ($uploadOk == 1 && move_uploaded_file($_FILES["userImage"]["tmp_name"], $target_file)) {
            $imageUser = basename($_FILES['userImage']['name']);
        } else {
            $errors[] = "Désolé, une erreur est survenue lors de l'upload.";
        }
    } else {
        $imageUser = isset($_POST['userImage']) && !empty($_POST['userImage']) ? $_POST['userImage'] : ($_SESSION['user']['Image_utilisateur'] ?? "default.png");
    }

    $name = empty($_POST['lastname']) ? $_SESSION['user']['lastname_utilisateur'] : $_POST['lastname'];

    $prenom = empty($_POST['firstname']) ? $_SESSION['user']['firstname_utilisateur'] : $_POST['firstname'];

    $pseudo = empty($_POST['nickname']) ? $_SESSION['user']['nickname_utilisateur'] : $_POST['nickname'];

    $birthdate = empty($_POST['birthdate']) ? $_SESSION['user']['birthdate_utilisateur'] : $_POST['birthdate'];

    $mail = empty($_POST['mail']) ? $_SESSION['user']['email_utilisateur'] : $_POST['mail'];

    $description = empty($_POST['description']) ? ($_SESSION['user']['description_utilisateur'] == NULL ? "" : $_SESSION['user']['description_utilisateur']) : $_POST['description'];

    Utilisateur::updateUtilisateur($imageUser, $name, $prenom, $pseudo, $birthdate, $mail, $description);
    $_SESSION['user'] = Utilisateur::getInfos($mail);

    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}


include_once '../views/view-profile.php';
