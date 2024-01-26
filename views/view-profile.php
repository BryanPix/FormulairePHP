<?php
require_once "../controllers/controller-profile.php"
    ?>
<!DOCTYPE html>
<html lang="fr">
<?php
include 'templates/head.php';
?>

<body>
  
    <!-- Main -->
    <h1>Bienvenue!</h1>
    <div class="divFormulaire">
    <?= $_SESSION['user']['Image_utilisateur'] . '</br>'?>
    <?= $_SESSION['user']['nickname_utilisateur'] . '</br>'?>
    <?= $_SESSION['user']['lastname_utilisateur'] . '</br>'?>
    <?= $_SESSION['user']['firstname_utilisateur'] . '</br>'?>
    <?= $_SESSION['user']['birthdate_utilisateur'] . '</br>'?>
    <?= $_SESSION['user']['email_utilisateur'] . '</br>'?>
        <p>Vous êtes sur le placeholder de la page home</p>
        <a href="../controllers/controller-home.php"><button class="btn-signup">Retour Home</button></a>
    </div>

    <footer>
        <?php
        include 'templates/footer.php';
        ?>
    </footer>
    <script src="../../assets/js/view-home.js"></script>

</body>

</html>
