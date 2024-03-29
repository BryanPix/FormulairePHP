<?php
require_once "../controllers/controller-profile.php";

require_once "../controllers/controller-suppression.php";
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
            <span><b>Image de profile</b></span>: <img class="imgProfile"
                src="../assets/img/<?= $_SESSION['user']['Image_utilisateur'] ?>" alt="Image de profil">
            </br></br>
            <span><b>Nom de famille</b></span>:
            <?= $_SESSION['user']['lastname_utilisateur'] ?>
            </br></br>
            <span><b>Prénom</b></span>:
            <?= $_SESSION['user']['firstname_utilisateur'] ?>
            </br></br>
            <span><b>Pseudo</b></span>:
            <?= $_SESSION['user']['nickname_utilisateur'] ?>
            </br></br>
            <span><b>Date de naissance</b></span>:
            <?= $_SESSION['user']['birthdate_FR'] ?>
            </br></br>
            <span><b>Email</b></span>:
            <?= $_SESSION['user']['email_utilisateur'] ?>
            <br><br>
            <span><b>Description</b></span>:
            <?= $_SESSION['user']['description_utilisateur'] ?>
            <br><br>
            <button class="btn-secondary" id="btn-modifier">Modifier</button>
            <button class="btn-secondary returnHome"><a href="../controllers/controller-home.php">Retour
                    Home</a></button>
        </div>

        <!-- SERT A MODIFIER LES INFORMATIONS -->
        <div class="divModifier">
            <form method="POST" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data"
                novalidate>

                <label class="labelSignup" for="userImage">Image : </label>
                <input type="file" name="userImage" id="userImage" accept="image/*" onchange="showPreview(event);" />
                <img id="file-ip-1-preview" class="imgProfile">
                <br><br>
                <label class="labelSignup" for="lastname">Nom de famille: </label>
                <input name="lastname" class="inputModifier" type="text"></input>
                <br><br>
                <label class="labelSignup" for="firstname">Prénom: </label>
                <input name="firstname" class="inputModifier" type="text"></input>
                <br><br>
                <label class="labelSignup" for="nickname">Pseudo: </label>
                <input name="nickname" class="inputModifier" type="text"></input>
                <br><br>
                <label class="labelSignup" for="birthdate">Date de naissance: </label>
                <input name="birthdate" class="inputModifier" type="date"></input>
                <br><br>
                <label class="labelSignup" for="mail">Adresse Mail: </label>
                <input name="mail" class="inputModifier" type="text"></input>
                <br><br>
                <label class="labelSignup" for="description">Description: </label>
                <textarea name="description" class="textarea" type="textarea" maxlength="250"
                    placeholder="J'aime le poulet" spellcheck="false" rows="4" cols="30"></textarea>
                <button class="btn-modifier">Modifier</button>

            </form>
        </div>
    </div>
    <!-- Popup confirmation suppression -->
    
    <div id="popupConfirm" class="popup-confirm">
        <div class="popup-content">
            <p id="deleteText"></p>
            <form id="deleteForm" action="../controllers/controller-suppression.php" method="POST">
            <input type="hidden" name="id_utilisateur" value="<?= $_SESSION['user']['id_utilisateur'] ?>">
            <button id="btn-accept" class="btnYes" type="submit">Oui</button>
            </form>

            <button id="btn-cancel" class="btnNo">Non</button>
        </div>
    </div>
    <input type="hidden" name="id_utilisateur" value="<?= $_SESSION['user']['id_utilisateur'] ?>">
    <button class="btn-modifier btn-delete">Supprimer compte</button>
        
    <footer>
        <?php
        include 'templates/footer.php';
        ?>
    </footer>
    <script src="../assets/js/view-profile.js"></script>

</body>

</html>