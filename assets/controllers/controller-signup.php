<?php
// l'ordre est important car Utilisateur.php utilise des constantes venant de config.php 

// config
require_once '../../config.php';
// models
require_once '../../models/Utilisateur.php';
$showform = true;
if ($_SERVER["REQUEST_METHOD"] == "POST") { // Si le bouton post à été cliquer effectue la verification

    // Contrôle du nom
    if (empty($_POST['nom'])) {
        $errors["spanNom"] = "Le champ Nom ne peut pas être vide";
    } elseif (!preg_match("/^[a-zA-ZÀ-ÿ -]*$/", $_POST["nom"])) {
        $errors["spanNom"] = "Seules les lettres, les espaces et les tirets sont autorisés dans le champ Nom";
    }

    // Contrôle du prénom
    if (empty($_POST["prenom"])) {
        $errors["spanPrenom"] = "Le champ Prénom ne peut pas être vide";
    } elseif (!preg_match("/^[a-zA-ZÀ-ÿ -]*$/", $_POST["prenom"])) {
        $errors["spanPrenom"] = "Seules les lettres, les espaces et les tirets sont autorisés dans le champ Prénom";
    }
    // Contrôle du pseudo
    if (empty($_POST["pseudo"])) {
        $errors["spanPseudo"] = "Le champ Pseudo ne peut pas être vide";
    } elseif (!preg_match("/^[a-zA-ZÀ-ÿ -]*$/", $_POST["pseudo"])) {
        $errors["spanPseudo"] = "Seules les lettres, les espaces et les tirets sont autorisés dans le champ Pseudo";
    }

    // Contrôle de la date de naissance
    if (empty($_POST['birthdate'])) {
        $errors["spanBirthdate"] = "Le champ Date de naissance ne peut pas être vide";
    }

    // Contrôle de l'email
    if (empty($_POST['mail'])) {
        $errors["spanEmail"] = "Le champ mail ne peut pas être vide";
    } elseif (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        $errors["spanEmail"] = "Le format de l'adresse email n'est pas valide";
    }

    // Contrôle du mot de passe
    if (empty($_POST['password'])) {
        $errors["spanPassword"] = "Le champ Mot de passe ne peut pas être vide";
    } elseif (strlen($_POST['password']) < 8) {
        $errors["spanPassword"] = "Le mot de passe doit contenir au moins 8 caractères";
    }
    // Contrôle de la confirmation du mot de passe
    if ($_POST['password'] !== $_POST['confirmPass']) {
        $errors["spanConfirm"] = "Les mots de passe ne correspondent pas";
    }

    // Contrôle des CGU
    if (!isset($_POST['cgu'])) {
        $errors["cgu"] = "Veuillez accepter les conditions générales d'utilisation pour continuer.";
    }
    // Si aucune erreur, traiter les données et soumettre le formulaire
    if (empty($errors)) {

        // VERIFICATION si les CGU sont acceptées
        $cguAccepted = isset($_POST["cgu"]) && $_POST["cgu"] === "on";

        if ($cguAccepted) {

        } else {
            // Si les CGU ne sont pas acceptées, ajoute une erreur spécifique pour les CGU
            $errors["spanCgu"] = "Veuillez accepter les conditions générales d'utilisation pour continuer.";
        }
        // Seulement si il n'y a pas d'erreur
        if (empty($errors)) {

            $name = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $pseudo = $_POST['pseudo'];
            $birthdate = $_POST['birthdate'];
            $mail = $_POST['mail'];
            $password = $_POST['password'];
            $enterprise = $_POST['entreprise'];

            Utilisateur::create($name, $prenom, $pseudo, $birthdate, $mail, $password, $enterprise);
        
            //sert a masquer la div formulaire
            $showform = false;

        }
    }

}

// AFFICHER le formulaire si il est vide et ne l'affiche pas quand il est soumis
if ($_SERVER["REQUEST_METHOD"] != "POST" || !empty($errors)) {
    include_once '../../views/view-signup.php';
}