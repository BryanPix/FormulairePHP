<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_trajet = isset($_POST['id_trajet']) ? intval($_POST['id_trajet']) : 0;

    if ($id_trajet > 0) {
        // config
        require_once '../config.php';
        // models
        require_once '../models/trajet.php';

        Trajet::deleteTrajet($id_trajet);
    }

    // Redirection après suppression
    header("Location: ../controllers/controller-historique.php");
    exit();
}

if (session_status() === PHP_SESSION_NONE) {
    //demarre la session
    session_start();
}

// l'ordre est important car trajet.php utilise des constantes venant de config.php 
// config
require_once '../config.php';
// models
require_once '../models/trajet.php';


$trajetData = Trajet::getAllTrajets($_SESSION['user']['id_utilisateur']);


include_once '../views/view-historique.php';