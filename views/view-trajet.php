<?php
require_once "../controllers/controller-trajet.php"
    ?>
<!DOCTYPE html>
<html lang="fr">
<?php
include 'templates/head.php';
?>

<body>
    <h1>Trajet</h1>

    <div class="divFormulaire">
        <form method="POST" action="" novalidate>
            <label for="date_trajet">Date du trajet :
                <input class="inputField" type="date" id="date_trajet" name="date_trajet" size="25" value="<?php if (!empty($date)) {
                    echo $date;
                } ?>" required>
                <span class="redInput spanEmail">
                    <?= isset($errors["spanDateTrajet"]) ? $errors["spanDateTrajet"] : "" ?>
                </span>
            </label>
            <label for="traveltime_trajet"> Temps de trajet (en minutes):
                <input class="inputField" type="time" id="traveltime_trajet" name="traveltime_trajet" size="20" required>
                <span class="redInput spanTempsTrajet">
                    <?= isset($errors["spanTempsTrajet"]) ? $errors["spanTempsTrajet"] : "" ?>
                </span>
            </label>
            <label for="distance_trajet"> Distance parcourue (en Km) :
                <input class="inputField" type="number" id="distance_trajet" name="distance_trajet" size="20" required>
                <span class="redInput spanDistance">
                    <?= isset($errors["spanDistance"]) ? $errors["spanDistance"] : "" ?>
                </span>
            </label>
            <label for="transport"> Mode de transport :
                <select name="transport" id="transport">
                    <option value="">--Please choose an option--</option>
                    <option value="1">Vélo</option>
                    <option value="2">Marche à pied</option>
                    <option value="3">Skate</option>
                    <option value="4">Trotinette</option>
                    <option value="5">Roller</option>
                </select>
                <span class="redInput spanModeTransport">
                    <?= isset($errors["spanModeTransport"]) ? $errors["spanModeTransport"] : "" ?>
                </span>
            </label>
            <input class="btn-signup" type="submit" id="btn-check" value="Enregistrer">
        </form>
        <a href="../controllers/controller-historique.php"><button class="btn-signup">Historique</button></a>
        <a href="../controllers/controller-home.php"><button class="btn-signup">Retour Home</button></a>
    </div>
    <footer>
        <?php
        include 'templates/footer.php';
        ?>
    </footer>
</body>

</html>