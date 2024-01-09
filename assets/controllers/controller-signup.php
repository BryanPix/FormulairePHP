<?php 
    require_once "../../views/view-signup.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") { // Si le bouton post a été cliquer effectue la verification
        // $errors = array();
        // $mailRegex = "^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\\.[A-Za-z]{2,4}$";
        $name = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $birthdate = $_POST['birthdate'];
        $mail = $_POST['mail'];
        $password = $_POST['password'];
        $confirmPass = $_POST['confirmPass'];
        $cgu = $_POST['cgu'];
    }
?>
