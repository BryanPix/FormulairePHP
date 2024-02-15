<?php
session_start();
// l'ordre est important car Utilisateur.php utilise des constantes venant de config.php 

// config
require_once '../config.php';
// models
require_once '../models/Utilisateur.php';


// Nous déclenchons nos vérifications uniquement lorsqu'un submit de type POST est détecté
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // tableau d'erreurs (stockage des erreurs)
    $errors = [];
     
    // Vérification du reCAPTCHA

    $secret = '6LcljnQpAAAAAFQkWIiIGdK0rdYse2jDObRDaB0L';
    $response = $_POST['g-recaptcha-response'];
    $remoteip = $_SERVER['REMOTE_ADDR'];

    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip";

    $responseData = file_get_contents($url);
    $dataRow = json_decode($responseData, true);

    if ($dataRow['success'] == false && Utilisateur::checkMailExists($_POST['mail'])) {
        $mail = $_POST['mail'];
        $errors["spanCaptcha"] = 'reCaptcha non verifié';
    }

    if (empty($errors)) {
        // ici commence les tests
        if (!Utilisateur::checkMailExists($_POST['mail'])) {
            $errors['spanEmail'] = 'Utilisateur Inconnu';
        } elseif (Utilisateur::checkMailExists($_POST['mail']) && empty($_POST['password'])) {
            $mail = $_POST['mail'];
            $errors['spanPassword'] = 'Veuillez saisir votre mot de passe';
        } elseif(Utilisateur::checkMailExists($_POST['mail']) && $dataRow['success'] == true && empty($_POST['password'])){
            $mail = $_POST['mail'];
            $errors['spanPassword'] = 'Veuillez saisir votre mot de passe';
        } else {
            // je recupère toutes les infos via la méthode getInfos()
            $utilisateurInfos = Utilisateur::getInfos($_POST['mail']);
            // Utilisation de password_verify pour valider le mdp
            if (password_verify($_POST['password'], $utilisateurInfos['password_utilisateur'])) {
                $_SESSION['user'] = $utilisateurInfos; 
                header('Location: controller-home.php');

            } else {
                $mail = $_POST['mail'];
                $errors['spanPassword'] = 'Mauvais mdp';
            }
        }
    }
}

include_once '../views/view-signin.php';