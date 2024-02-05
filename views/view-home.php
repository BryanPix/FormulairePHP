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
    <!-- <div class="popup">
        <div class="popup-content text-dark">
            <h2 class="text-center">Bienvenue !</h2>
            <ul>
                <li>Amusez-vous bien !</li>
            </ul>
            <span class="close-btn">X</span>
        </div>
    </div> -->
    
    <!-- Main -->
    <h1>GreenRide</h1>
    <div class="divFormulaire">

    <?= '<p>Bienvenue ' . $_SESSION['user']['firstname_utilisateur'] . ' ! </p>'?>
        <p>Tu es sur la page home.</p>
        <p>Sur cette page Home, il t'est possible de :</p>
        <ul>
            <li><b>Naviguer</b> vers ton profil.</li>
            <li><b>Naviguer</b> vers ton historique.</li>
            <li><b>Ajouter</b> un nouveau trajet.</li>
            <li>Te <b>déconnecter</b>.</li>
        </ul>
        <p>
            Pour naviguer sur ce site, n'hésite pas à utiliser la barre de navigation qui se trouve en bas de page.
        </p>
        <p>
            Ce site est plutôt vide pour le moment,
            <br>
            Mais n'aie crainte, il s'étoffera avec le temps.
        </p>
        <p>Amuses-toi bien !</p>
    </div>
    <footer>
        <?php
        include 'templates/footer.php';
        ?>
    </footer>
    <script src="../assets/js/view-home.js"></script>

</body>

</html>
