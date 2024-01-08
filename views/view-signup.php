<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") { // Si le bouton post a été cliquer effectue la verification
    $name = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $birthdate = $_POST['birthdate'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    $confirmPass = $_POST['confirmPass'];
    if (empty($name)) {
        echo "Name is missing ! <br>";
    } else {
        echo "Nom : " . $name . "<br>";
    }
    if (empty($prenom)) {
        echo "prenom is missing ! <br>";
    } else {
        echo "Prénom : " . $prenom . "<br>";
    }
    if (empty($birthdate)) {
        echo "birthdate is missing ! <br>";
    } else {
        echo "Date de naissance : " . $birthdate . "<br>";
    }
    if (empty($mail)) {
        echo "mail is missing ! <br>";
    } else {
        echo "addresse mail : " . $mail . "<br>";
    }
    if (empty($password)) {
        echo "password is missing ! <br>";
    } else {
        echo "Merci <br>";
    }
    if (empty($confirmPass)) {
        echo "Password needs to be similar ! <br>";
    } else {
        echo "Merci <br>";
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<?php
include 'templates/head.php';
?>

<body>
    <h1>Inscription</h1>

    <div class="divFormulaire">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" novalidate>
            <label for="nom">Nom :
                <input type="text" id="nom" name="nom" size="20" placeholder="Ex:Doe"
                    value="<?php if (!empty($name)) {
                        echo $name;
                    } ?>" required>
            </label>
            <label for="prenom" >Prénom :
                <input type="text" id="prenom" name="prenom" size="20" placeholder="Ex:John"
                    value="<?php if (!empty($prenom)) {
                        echo $prenom;
                    } ?>">
            </label>
            <label for="birthdate" >Date de naissance :
                <input type="date" id="birthdate" name="birthdate" size="20"
                    value="<?php if (!empty($birthdate)) {
                        echo $birthdate;
                    } ?>">
            </label>
            <label for="mail" >Courriel :
                <input type="text" id="mail" name="mail" size="20" placeholder="Ex:JohnDoe@gmail.com"
                    value="<?php if (!empty($mail)) {
                        echo $mail;
                    } ?>">
            </label>
            <label for="password">Mot de passe :
                <input type="password" id="password" name="password" size="20" placeholder="KaminiMarlyGomont"
                    value="<?php if (!empty($password)) {
                        echo 'correct';
                    } ?>">
            </label>
            <label for="confirmPass" >Confirmation du mot de passe :
                <input type="password" id="confirmPass" name="confirmPass" size="20" placeholder="KaminiMarlyGomont"
                    value="<?php if (!empty($confirmPass)) {
                        echo 'correct';
                    } ?>">
            </label>
            <input class="btn-signup" type="submit" value="S'enregistrer">
        </form>


        <!-- créer une condition if else pour afficher deux div differentes au cas ou le bouton s'enregistrer est cliqué -->
        <?php

        ?>

    </div>
    <footer>
        <?php
        include 'templates/footer.php';
        ?>
    </footer>
    <script src="../js/script.js"></script>
</body>

</html>