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
            <label for="traveltime_trajet"> Temps de trajet (en heures):
                <input class="inputField" type="time" id="traveltime_trajet" name="traveltime_trajet" size="20"
                    required>
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
                <select name="transport" class="selectField" id="transport">
                    <option value="" selected disabled>--Please choose an option--</option>
                    <?php foreach (Transport::getAllTransport() as $transport) { ?>
                            <option value="<?= $transport['id_modedetransport'] ?>" <?= isset($_POST["transport"]) && $_POST["transport"] == $transport['id_modedetransport'] ? 'selected' : "" ?>>
                                <?= $transport['Type_modedetransport'] ?>
                            </option>
                        <?php } ?>

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
    <script src="../assets/js/view-trajet.js"></script>
</body>

</html>