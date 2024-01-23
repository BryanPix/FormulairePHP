<?php
require_once "../controllers/controller-home.php"
    ?>
<!DOCTYPE html>
<html lang="fr">
<?php
include 'templates/head.php';
?>

<body>
    <!-- popup -->
    <div class="popup">
        <div class="popup-content text-dark">
            <h2 class="text-center">Bienvenue !</h2>
            <ul>
                <li>Amusez-vous bien !</li>
            </ul>
            <span class="close-btn">X</span>
        </div>
    </div>
    <!-- Main -->
    <h1>Bienvenue!</h1>
    <div class="divFormulaire">
    <?= $_SESSION['user']['nickname_utilisateur'] . '</br>'?>
        <p>Vous etes sur le placeholder de la page home</p>

        <a href="../controllers/controller-profile.php"><button class="btn-signup">profile</button></a>
        <a href="../controllers/controller-signout.php"><button class="btn-signup">Déconnexion</button></a>
    </div>
    <footer>
        <?php
        include 'templates/footer.php';
        ?>
    </footer>
    <script src="../../assets/js/view-home.js"></script>

</body>

</html>
