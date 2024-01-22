<?php
// empêche l'accès à la page home si l'utilisateur n'est pas connecté et vérifie si la session n'est pas déjà active
if (session_status() === PHP_SESSION_NONE) {
    // Si non, démarrer la session
    session_start();
}
if(!isset($_SESSION['user'])){
    header('Location : controller-signin.php');
    exit();
}

// l'ordre est important car Utilisateur.php utilise des constantes venant de config.php 

// config
require_once '../../config.php';
// models
require_once '../../models/Utilisateur.php';

// if(!isset($_SESSION["mail"])){
//     header("Location : controller-signin.php");
// }
// Récupère le pseudo de l'utilisateur
// $pseudo = isset($_SESSION['user']['user_pseudo']) ? ($_SESSION['user']['user_pseudo']) : "Pseudo non défini";

include_once '../../views/view-home.php';

