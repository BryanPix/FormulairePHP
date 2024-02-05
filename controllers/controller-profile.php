<?php 
// l'ordre est important car Utilisateur.php utilise des constantes venant de config.php 

// config
require_once '../config.php';
// models
require_once '../models/Utilisateur.php';

// empêche l'accès à la page home si l'utilisateur n'est pas connecté et vérifie si la session n'est pas déjà active
if (session_status() === PHP_SESSION_NONE) {
    // Si non, démarrer la session
    session_start();
}
if(!isset($_SESSION['user'])){
    header('Location : controller-signin.php');
    exit();
}
// Appliquer une image par defaut en cas de non presence d'image
if(isset($_SESSION['user']['Image_utilisateur']) && $_SESSION['user']['Image_utilisateur'] == 'NULL'){
    $_SESSION['user']['Image_utilisateur'] = 'default.png';
}

include_once '../views/view-profile.php';
