<?php

// l'ordre est important car Utilisateur.php utilise des constantes venant de config.php 

// config
require_once '../config.php';
// models
require_once '../models/Utilisateur.php';

// Suppression compte utilisateur

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idUser = isset($_POST['id_utilisateur']) ? $_POST['id_utilisateur'] : null;

    if ($idUser !== null) {
        Utilisateur::deleteUtilisateur($idUser);

        header("Location: ../views/view-suppression.php");
        exit();
    }
}