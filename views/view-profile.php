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
        <?= '<img src="' . $_SESSION['user']['Image_utilisateur'] . '" alt="Image de profile">' ?>
        </br>
        <?= $_SESSION['user']['nickname_utilisateur'] ?>
        </br>
        <?= $_SESSION['user']['lastname_utilisateur'] ?>
        </br>
        <?= $_SESSION['user']['firstname_utilisateur'] ?>
        </br>
        <?= $_SESSION['user']['birthdate_utilisateur'] ?>
        </br>
        <?= $_SESSION['user']['email_utilisateur'] ?>

        <p>Vous êtes sur le placeholder de la page profile</p>
        <button class="btn-signup">Modifier</button>
        <a href="../controllers/controller-home.php"><button class="btn-signup">Retour Home</button></a>
    </div>

    <!-- <div class="divFormulaire">
        <form method="POST" action="" novalidate>

            <label for="nickname"></label>
            <input type="text"></input>

            <label for="lastname"></label>
            <input type="text"></input>

            <label for="firstname"></label>
            <input type="text"></input>

            <label for="birthdate"></label>
            <input type="text"></input>

            <label for="email"></label>
            <input type="text"></input>

        </form>

    </div> -->
    <footer>
        <?php
        include 'templates/footer.php';
        ?>
    </footer>
    <script src="../../assets/js/view-home.js"></script>

</body>

</html>