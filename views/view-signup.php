<?php
require_once "../controllers/controller-signup.php"

    ?>
<!DOCTYPE html>
<html lang="fr">
<?php
include 'templates/head.php';
?>

<body>
    <?php if ($showform) { ?>
        <h1>Inscription</h1>


        <div class="divFormulaire">
            <form method="POST" action="" enctype="multipart/form-data" autocomplete="off" novalidate>
                
                <label class="labelSignup" for="nom">
                    <p class="labelUnderline">Nom<sup class="redInput">* </sup>:</p>
                    <input class="inputField" type="text" id="nom" name="nom" size="20" placeholder="Doe" value="<?php if (!empty($name)) {
                        echo $name;
                    } ?>" required>
                    <span class="redInput spanNom">
                        <?= isset($errors["spanNom"]) ? $errors["spanNom"] : "" ?>
                    </span>
                </label>
                <label class="labelSignup" for="prenom">
                    <p class="labelUnderline">Prénom<sup class="redInput">* </sup> :</p>
                    <input class="inputField" type="text" id="prenom" name="prenom" size="20" placeholder="John" value="<?php if (!empty($prenom)) {
                        echo $prenom;

                    } ?>" required>
                    <span class="redInput spanPrenom">
                        <?= isset($errors["spanPrenom"]) ? $errors["spanPrenom"] : "" ?>
                    </span>
                </label>
                <label class="labelSignup" for="pseudo">
                    <p class="labelUnderline">Pseudo<sup class="redInput">* </sup> :</p>
                    <input class="inputField" type="text" id="pseudo" name="pseudo" size="20" placeholder="Baobab" value="<?php if (!empty($pseudo)) {
                        echo $pseudo;
                    } ?>" required>
                    <span class="redInput spanPseudo">
                        <?= isset($errors["spanPseudo"]) ? $errors["spanPseudo"] : "" ?>
                    </span>
                </label>
                <label class="labelSignup" for="entreprise">
                    <p class="labelUnderline">Entreprise<sup class="redInput">*</sup> :</p>
                    <select class="selectField" name="entreprise" id="entreprise">
                        <option value="" selected disabled>-- Veuillez choisir une option --</option>
                        <?php foreach (Entreprise::getAllEntreprise() as $entreprise) { ?>
                            <option value="<?= $entreprise['ID_Entreprise'] ?>" <?= isset($_POST["entreprise"]) && $_POST["entreprise"] == $entreprise['ID_Entreprise'] ? 'selected' : "" ?>>
                                <?= $entreprise['name_entreprise'] ?>
                            </option>
                        <?php } ?>
                    </select>
                    <div class="redInput spanEntreprise">
                        <?= isset($errors["spanEntreprise"]) ? $errors["spanEntreprise"] : "" ?>
                    </div>
                </label>
                <label class="labelSignup" for="birthdate">
                    <p class="labelUnderline">Date de naissance<sup class="redInput">* </sup> :</p>
                    <input class="inputField" type="date" id="birthdate" name="birthdate" value="<?php if (!empty($birthdate)) {
                        echo $birthdate;
                    } ?>" required>
                    <span class="redInput spanBirthdate">
                        <?= isset($errors["spanBirthdate"]) ? $errors["spanBirthdate"] : "" ?>
                    </span>
                </label>
                <label class="labelSignup" for="mail">
                    <p class="labelUnderline">Adresse mail<sup class="redInput">* </sup> :</p>
                    <input class="inputField" type="text" id="mail" name="mail" size="25" placeholder="JohnDoe@gmail.com"
                        value="<?php if (!empty($mail)) {
                            echo $mail;
                        } ?>" required>
                    <span class="redInput spanEmail">
                        <?= isset($errors["spanEmail"]) ? $errors["spanEmail"] : "" ?>
                    </span>
                </label>
                <label class="labelSignup" for="password">
                    <p class="labelUnderline">Mot de passe<sup class="redInput">* </sup> :</p>
                    <input class="inputField" type="password" id="password" name="password" size="20" required>
                    <span class="redInput spanPassword">
                        <?= isset($errors["spanPassword"]) ? $errors["spanPassword"] : "" ?>

                    </span>
                </label>
                <label class="labelSignup" for="confirmPass" class="inputConfirm">
                    <p class="labelUnderline">Confirmation du mot de passe<sup class="redInput">* </sup> :</p>
                    <input class="inputField" type="password" id="confirmPass" name="confirmPass" size="20" required>
                    <span class="redInput spanConfirm">
                        <?= isset($errors["spanConfirm"]) ? $errors["spanConfirm"] : "" ?>

                    </span>
                </label>
                <label class="labelSignup" for="cgu">
                    <input type="checkbox" class="cguCheckbox" id="cgu" name="cgu" required>
                    <p class="cguRedirection">Pour vous inscrire, veuillez accepter les <a
                            href="../views/view-cgu.php">CGU</a><sup class="redInput">* </sup> !</p>
                    <span class="redInput spanCgu">
                        <?= isset($errors["spanCgu"]) ? $errors["spanCgu"] : "" ?>
                    </span>
                </label>
                <p class="requis"><sup class="redInput">*</sup> Requis</p>
                <input class="btn-signup" type="submit" id="btn-check" value="S'enregistrer">

            </form>
            <span class="spanDirectionSignup">Vous avez déjà un compte ? <a href="controller-signin.php">Connectez-vous
                    !</a></span>
        </div>
    <?php } else { ?>


        <!-- A faire apparaitre quand le formulaire est soumit -->
        <div id="divMessage">
            <h1>Inscription reussie</h1>
            <p> Vous pouvez à present vous connecter.</p>
            <a href="../controllers/controller-signin.php"><button class="btn-signup">Connexion</button></a>
        </div>
    <?php } ?>
    <!-- <footer>
        <?php
        include 'templates/footer.php';
        ?>
    </footer> -->
    <script src="../js/script.js"></script>
</body>

</html>