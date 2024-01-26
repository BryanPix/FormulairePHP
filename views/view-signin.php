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
    <form method="POST" action="" novalidate>

        <label for="mail">Adresse mail :
            <input class="inputField" type="text" id="mail" name="mail" size="25" 
                value="<?php if (!empty($mail)) {
                    echo $mail;
                } ?>" required>
            <span class="redInput spanEmail">
                <?= isset($errors["spanEmail"]) ? $errors["spanEmail"] : "" ?>
            </span>
        </label>
        <label for="password">Mot de passe :
            <input class="inputField" type="password" id="password" name="password" size="20" required>
            <span class="redInput spanPassword">
                <?= isset($errors["spanPassword"]) ? $errors["spanPassword"] : "" ?>
            </span>
        </label>
        <input class="btn-signup" type="submit" id="btn-check" value="Se Connecter">
        </form>

        <span> Vous n'avez pas de compte ? </span><a href="controller-signup.php">Inscrivez-vous !</a>
    </div>

    <footer>
        <?php
        include 'templates/footer.php';
        ?>
    </footer>
</body>

</html>
