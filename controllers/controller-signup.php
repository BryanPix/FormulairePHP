<?php
// l'ordre est important car Utilisateur.php utilise des constantes venant de config.php 

// config
require_once '../config.php';
// model
require_once '../models/Utilisateur.php';
require_once '../models/entreprise.php';

$showform = true;
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Contrôle de l'image
    if ($_FILES['userImage']['error'] == 4) {
        $userImage = 'default.png';
    } else{
        $userImage = $_FILES['userImage']['name'];
    }

    // Contrôle des autres champs...
    
    // Si aucune erreur, traiter les données et soumettre le formulaire
    if (empty($errors)) {
        // VERIFICATION si les CGU sont acceptées
        $cguAccepted = isset($_POST["cgu"]) && $_POST["cgu"] === "on";

        if (!$cguAccepted) {
            $errors["spanCgu"] = "Veuillez accepter les conditions générales d'utilisation pour continuer.";
        }

        if (empty($errors)) {

            $name = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $pseudo = $_POST['pseudo'];
            $birthdate = $_POST['birthdate'];
            $mail = $_POST['mail'];
            $password = $_POST['password'];
            $enterprise = $_POST['entreprise'];

            Utilisateur::create($userImage, $name, $prenom, $pseudo, $birthdate, $mail, $password, $enterprise);

            // Sert à masquer la div formulaire
            $showform = false;
        }
    }
}

include_once '../views/view-signup.php';
