<?php
require_once "../controllers/controller-signup.php"

    ?>
<!DOCTYPE html>
<html lang="fr">
<?php
include 'templates/head.php';
?>

<body>
    <h1>Inscription</h1>
   <?php if ($showform){ ?>

    
    <div class="divFormulaire">
        <form method="POST" action="" novalidate>
            <label for="nom">Nom<sup class="star">*</sup> :
                <input class="inputField" type="text" id="nom" name="nom" size="20" placeholder="Ex:Doe" value="<?php if (!empty($name)) {
                    echo $name;
                } ?>" required>
                <span class="redInput spanNom">
                    <?= isset($errors["spanNom"]) ? $errors["spanNom"] : "" ?>
                </span>
            </label>
            <label for="prenom">Prénom<sup class="star">*</sup> :
                <input class="inputField" type="text" id="prenom" name="prenom" size="20" placeholder="Ex:John" value="<?php if (!empty($prenom)) {
                    echo $prenom;

                } ?>" required>
                <span class="redInput spanPrenom">
                    <?= isset($errors["spanPrenom"]) ? $errors["spanPrenom"] : "" ?>
                </span>
            </label>
            <label for="pseudo">Pseudo<sup class="star">*</sup> :
                <input class="inputField" type="text" id="pseudo" name="pseudo" size="20" placeholder="Baobab" value="<?php if (!empty($pseudo)) {
                    echo $pseudo;
                } ?>" required>
                <span class="redInput spanPseudo">
                    <?= isset($errors["spanPseudo"]) ? $errors["spanPseudo"] : "" ?>
                </span>
            </label>
            <label for="entreprise">Entreprise<sup class="star">*</sup> :
                <select name="entreprise" id="entreprise" class="selectField">
                    <option value="">-- Veuillez choisir une option --</option>
                    <option value="1" <?= isset($_POST["entreprise"]) && $_POST["entreprise"] == 1 ? 'selected' : "" ?>>
                        LunaTech Solutions</option>
                    <option value="2" <?= isset($_POST["entreprise"]) && $_POST["entreprise"] == 2 ? 'selected' : "" ?>>
                        Phoenix Consulting and Design</option>
                </select>
            </label>
            <label for="birthdate">Date de naissance<sup class="star">*</sup> :
                <input class="inputField" type="date" id="birthdate" name="birthdate" value="<?php if (!empty($birthdate)) {
                    echo $birthdate;
                } ?>" required>
                <span class="redInput spanBirthdate">
                    <?= isset($errors["spanBirthdate"]) ? $errors["spanBirthdate"] : "" ?>
                </span>
            </label>
            <label for="mail">Adresse mail<sup class="star">*</sup> :
                <input class="inputField" type="text" id="mail" name="mail" size="25" placeholder="Ex:JohnDoe@gmail.com"
                    value="<?php if (!empty($mail)) {
                        echo $mail;
                    } ?>" required>
                <span class="redInput spanEmail">
                    <?= isset($errors["spanEmail"]) ? $errors["spanEmail"] : "" ?>
                </span>
            </label>
            <label for="password">Mot de passe<sup class="star">*</sup> :
                <input class="inputField" type="password" id="password" name="password" size="20" required>
                <span class="redInput spanPassword">
                    <?= isset($errors["spanPassword"]) ? $errors["spanPassword"] : "" ?>

                </span>
            </label>
            <label for="confirmPass" class="inputConfirm">Confirmation du mot de passe<sup class="star">*</sup> :
                <input class="inputField" type="password" id="confirmPass" name="confirmPass" size="20" required>
                <span class="redInput spanConfirm">
                    <?= isset($errors["spanConfirm"]) ? $errors["spanConfirm"] : "" ?>

                </span>
            </label>
            <label for="cgu">
                <input type="checkbox" id="cgu" name="cgu" required>
                <span>Pour vous inscrire, veuillez accepter les CGU !</span>
                <span class="redInput spanCgu">
                    <?= isset($errors["spanCgu"]) ? $errors["spanCgu"] : "" ?>
                </span>
            </label>
            <input class="btn-signup" type="submit" id="btn-check" value="S'enregistrer">

            <p><sup class="redInput">*</sup> Requis</p>
        </form>
        <span>Vous avez déjà un compte ? </span><a href="controller-signin.php">Connectez-vous !</a>
    </div>
            <?php } else { ?>

            
    <!-- A faire apparaitre quand le formulaire est soumit -->
    <div id="divMessage">
        <h2>Connexion</h2>
        <h3>Bienvenue</h3>
        <p>  Vous pouvez à present vous connecter.</p>
      <a href="../controllers/controller-signin.php"><button>Connexion</button></a>  
    </div>
         <?php   } ?>
    <footer>
        <?php
        include 'templates/footer.php';
        ?>
    </footer>
    <script src="../js/script.js"></script>
</body>

</html>