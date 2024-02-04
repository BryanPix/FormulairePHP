<?php
require_once "../controllers/controller-signin.php"
    ?>

<!DOCTYPE html>
<html lang="fr">
<?php
include 'templates/head.php';
?>

<body>
    <h1>Connexion</h1>
    <div class="divFormulaire">
        <form method="POST" action="" autocomplete="off" novalidate>

            <label for="mail" class="labelSignin">
                <p class="labelUnderline">Adresse mail :</p>
                <input class="inputField" type="text" id="mail" name="mail" size="25" value="<?php if (!empty($mail)) {
                    echo $mail;
                } ?>" placeholder="JohnDoe@gmail.com" required>
                <span class="redInput spanEmail">
                    <?= isset($errors["spanEmail"]) ? $errors["spanEmail"] : "" ?>
                </span>
            </label>
            <label for="password" class="labelSignin">
                <p class="labelUnderline">Mot de passe :</p>
                <input class="inputField" type="password" id="password" name="password" size="20" required>
                <span class="redInput dynamicFont spanPassword">
                    <?= isset($errors["spanPassword"]) ? $errors["spanPassword"] : "" ?>
                </span>
            </label>
            <input class="btn-signup" type="submit" id="btn-check" value="Se Connecter">
        </form>

        <span class="spanDirection"> Vous n'avez pas de compte ? <a href="controller-signup.php"> Inscrivez-vous !</a></span>
    </div>

    <!-- <footer>
        <?php
        include 'templates/footer.php';
        ?>
    </footer> -->
</body>

</html>