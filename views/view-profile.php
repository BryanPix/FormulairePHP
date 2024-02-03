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

    <h1>Section profile</h1>
    <div class="divFormulaire">
        <h2>Vos informations</h2>
        <?= '<span class="labelUnderline"><b>Image de profile</b></span>: <img src="' . $_SESSION['user']['Image_utilisateur'] . '" alt="Image de profile">' ?>
        </br>
        </br>
        <?= '<span class="labelUnderline"><b>Pseudo</b></span>: ' . $_SESSION['user']['nickname_utilisateur'] . ' ' ?>
        </br>
        </br>
        <?= '<span class="labelUnderline"><b>Nom de famille</b></span>: ' . $_SESSION['user']['lastname_utilisateur'] . ' '?>
        </br>
        </br>
        <?= '<span class="labelUnderline"><b>Prénom</b></span>: ' . $_SESSION['user']['firstname_utilisateur'] . ' '?>
        </br>
        </br>
        <?= '<span class="labelUnderline"><b>Date de naissance</b></span>: ' . $_SESSION['user']['birthdate_utilisateur'] . ' '?>
        </br>
        </br>
        <?= '<span class="labelUnderline"><b>Email</b></span>: ' . $_SESSION['user']['email_utilisateur'] . ' '?>

        <button class="btn-signup">Modifier</button>
        <a href="../controllers/controller-home.php"><button class="btn-signup">Retour Home</button></a>
    </div>


    <!-- SERT A MODIFIER LES INFORMATIONS -->

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