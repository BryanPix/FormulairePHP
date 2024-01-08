<!DOCTYPE html>
<html lang="fr">
<?php 
    include 'templates/head.php';
?>
<body>

    <h1>Inscription</h1>
   
    <div class="divFormulaire">
    <form action="../assets/controllers/controller-signup.php" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="nom" aria-placeholder="">Nom : 
            <input type="text" id="nom" name="nom" value="" size="20">
        </label>
        <label for="prenom" aria-placeholder="">Prénom : 
            <input type="text" id="prenom" name="prenom" value="" size="20">
        </label>
        <label for="birthdate" aria-placeholder="">Date de naissance : 
            <input type="date" id="birthdate" name="birthdate" value="" size="20">
        </label>
        <label for="mail" aria-placeholder="">Courriel : 
            <input type="text" id="mail" name="mail" value="" size="20">
        </label>
        <label for="password" aria-placeholder="">Mot de passe : 
            <input type="password" id="password" name="password" value="" size="20">
        </label>
        <label for="confirmPass" aria-placeholder="">Confirmation du mot de passe : 
            <input type="password" id="confirmPass" name="confirmPass" value="" size="20">
        </label>
            <input class="btn-signup" type="submit" value="S'enregistrer">
    </form>
    </div>
    <footer>
    <?php 
        include 'templates/footer.php';
    ?>
    </footer>
</body>
</html>