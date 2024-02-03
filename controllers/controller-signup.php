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

    if (empty($_POST['nom'])) {
        $errors['spanNom'] = 'Veuillez saisir votre nom';
    }
    if (empty($_POST['prenom'])) {
        $errors['spanPrenom'] = 'Veuillez saisir votre prénom';
    }
    if (empty($_POST['pseudo'])) {
        $errors['spanPseudo'] = 'Veuillez saisir votre pseudo';
    }
    if (empty($_POST['entreprise'])) {
        $errors['spanEntreprise'] = 'Veuillez saisir votre entreprise';
    }
    if (empty($_POST['birthdate'])) {
        $errors['spanBirthdate'] = 'Veuillez saisir votre date de naissance';
    }
    if (empty($_POST['mail'])) {
        $errors['spanEmail'] = 'Veuillez saisir votre Email';
    }
    if (empty($_POST['password'])) {
        $errors['spanPassword'] = 'Veuillez saisir votre mot de passe';
    }
    if (empty($_POST['confirmPass'])) {
        $errors['spanConfirm'] = 'Votre mot de passe doit être similaire';
    }




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
            $entreprise = $_POST['entreprise'];

            Utilisateur::create($name, $prenom, $pseudo, $birthdate, $mail, $password, $entreprise);
            // Sert à masquer la div formulaire
            $showform = false;
        }
    }
}

include_once '../views/view-signup.php';
