<?php 

// config
require_once '../../config.php';
// models
require_once '../../models/Utilisateur.php';

session_start();
unset($_SESSION['utilisateur']);
session_destroy();
header("Location: index.php");

include_once '../../views/view-signout.php';
