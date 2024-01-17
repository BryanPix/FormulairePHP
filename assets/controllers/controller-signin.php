<?php


// Nous déclenchons nos vérifications uniquement lorsqu'un submit de type POST est détecté
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // tableau d'erreurs (stockage des erreurs)
    $errors = [];

    if (empty($_POST['mail'])) {
        $errors['spanEmail'] = 'Veuillez saisir votre Email';
    }

    if (empty($_POST['password'])) {
        $errors['SpanPassword'] = 'Veuillez saisir votre mot de passe';
    }

    if (empty($errors)) {
        // ici commence les tests
        if (!Utilisateur::checkMailExists($_POST['mail'])) {
            $errors['spanEmail'] = 'Utilisateur Inconnu';
        } else {
            // je recupère toutes les infos via la méthode getInfos()
            $utilisateurInfos = Utilisateur::getInfos($_POST['mail']);
            // Utilisation de password_verify pour valider le mdp
            if (password_verify($_POST['password'], $utilisateurInfos['mdp_participant'])) {
                header('Location: controller-home.php');
            } else {
                $errors['connexion'] = 'Mauvais mdp';
            }
        }
    }
}