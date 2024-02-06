<?php
session_start();
// l'ordre est important car trajet.php utilise des constantes venant de config.php 
if(!isset($_SESSION['user'])){
    header('Location: controller-signin.php');
    exit();
}
// config
require_once '../config.php';
// models
require_once '../models/trajet.php';
require_once '../models/transport.php';

$errors = [];
// Nous déclenchons nos vérifications uniquement lorsqu'un submit de type POST est détecté
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    // tableau d'erreurs (stockage des erreurs)

    // Contrôle de la date du trajet
    if (empty($_POST['date_trajet'])) {
        $errors["spanDateTrajet"] = "Le champ date ne peut pas être vide";
    } 
    // Contrôle du temps de trajet
    if (empty($_POST["distance_trajet"])) {
        $errors["spanDistance"] = "Le champ distance ne peut pas être vide";
    }
    // Contrôle de la distance du trajet
    if (empty($_POST["traveltime_trajet"])) {
        $errors["spanTempsTrajet"] = "Le champ temps ne peut pas être vide";
    } 
    // Contrôle de la durée du trajet
    if (empty($_POST["transport"])) {
        $errors["spanModeTransport"] = "Le champ transport ne peut pas être vide";
    } 

        // Seulement si il n'y a pas d'erreur
        if (empty($errors)) {
            
            $date = $_POST['date_trajet'];
            $distance = $_POST["distance_trajet"];
            $travel = $_POST["traveltime_trajet"];
            $id_modetransport = $_POST["transport"];
            $id_utilisateur = $_SESSION['user']['id_utilisateur'];

            Trajet::create($date, $distance, $travel, $id_modetransport, $id_utilisateur );
            header('Location: controller-historique.php');
    

        }
    }


// Affiche le formulaire si il est vide et ne l'affiche pas quand il est soumis
    include_once '../views/view-trajet.php';
