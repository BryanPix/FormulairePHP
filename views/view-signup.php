<?php 

?>
<!DOCTYPE html>
<html lang="fr">
        <!-- recup le head a partir de template/head.php -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Formulaire php</title>
</head>
<body>

    <h1>Inscription</h1>
   
    <div class="divFormulaire">
    <form action="../assets/controllers/controller-signup.php">
        <label for="" aria-placeholder="">Nom : 
            <input type="text" id="nom" name="nom" value="" size="20">
        </label>
        <label for="" aria-placeholder="">Prénom : 
            <input type="text" id="nom" name="nom" value="" size="20">
        </label>
        <label for="" aria-placeholder="">Date de naissance : 
            <input type="text" id="nom" name="nom" value="" size="20">
        </label>
        <label for="" aria-placeholder="">Courriel : 
            <input type="text" id="nom" name="nom" value="" size="20">
        </label>
        <label for="" aria-placeholder="">Mot de passe : 
            <input type="text" id="nom" name="nom" value="" size="20">
        </label>
        <label for="" aria-placeholder="">Confirmation du mot de passe : 
            <input type="text" id="nom" name="nom" value="" size="20">
        </label>
            <input class="btn-signup" type="submit" value="S'enregistrer">
    </form>
    </div>
<!-- recup le footer a partir de template/footer.php -->
    <footer>
        &copy; 2024 Company, Inc
    </footer>
</body>
</html>