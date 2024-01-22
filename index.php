<?php
$redirectController = 'assets/controllers/controller-signin.php'; //il faut qu'il point vers sign-in au lieu de sign-up
header("Location: " . $redirectController);
exit();
