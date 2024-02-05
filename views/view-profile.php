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

    <h1>Section profil</h1>
    <div class="divFormulaire">
        <h2>Vos informations</h2>

        <div class="divInfos">
            <span class="labelUnderline"><b>Image de profile</b></span>: <img class="imgProfile" src="../assets/img/<?= $_SESSION['user']['Image_utilisateur'] ?>" alt="Image de profil">
            </br></br>
            <span class="labelUnderline"><b>Nom de famille</b></span>: <?=  $_SESSION['user']['lastname_utilisateur'] ?>
            </br></br>
            <span class="labelUnderline"><b>Prénom</b></span>: <?= $_SESSION['user']['firstname_utilisateur'] ?>
            </br></br>
            <?= '<span class="labelUnderline"><b>Pseudo</b></span>: ' . $_SESSION['user']['nickname_utilisateur'] . ' ' ?>
            </br></br>
            <?= '<span class="labelUnderline"><b>Date de naissance</b></span>: ' . $_SESSION['user']['birthdate_FR'] . ' ' ?>
            </br></br>
            <?= '<span class="labelUnderline"><b>Email</b></span>: ' . $_SESSION['user']['email_utilisateur'] . ' ' ?>
            <br><br>
            <button class="btn-secondary" id="btn-modifier">Modifier</button>
            <button class="btn-secondary returnHome"><a href="../controllers/controller-home.php">Retour
                    Home</a></button>
        </div>
        <!-- SERT A MODIFIER LES INFORMATIONS -->
        <div class="divModifier">
            <form method="POST" action="" novalidate>
                
                <label class="labelSignup" for="userImage">Image :
                    <input type="file" name="userImage" id="userImage" accept="image/*" />
                </label>
                <br><br>
                <label class="labelSignup" for="lastname">Nom de famille: </label>
                <input class="inputModifier" type="text"></input>
                <br><br>
                <label class="labelSignup" for="firstname">Prénom: </label>
                <input class="inputModifier" type="text"></input>
                <br><br>
                <label class="labelSignup" for="nickname">Pseudo: </label>
                <input class="inputModifier" type="text"></input>
                <br><br>
                <label class="labelSignup" for="birthdate">Date de naissance: </label>
                <input class="inputModifier" type="date"></input>
                <br><br>
                <label class="labelSignup" for="mail">Adresse Mail: </label>
                <input class="inputModifier" type="text"></input>
                <button class="btn-modifier">Modifier</button>

            </form>

        </div>
    </div>


    <footer>
        <?php
        include 'templates/footer.php';
        ?>
    </footer>
    <script src="../assets/js/view-profile.js"></script>

</body>

</html>