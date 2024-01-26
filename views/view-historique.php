<?php
require_once "../controllers/controller-historique.php"
    ?>

<!DOCTYPE html>
<html lang="fr">
<?php
include 'templates/head.php';
?>

<body>


    <!-- Main -->
    <h1>Historique</h1>
    <div class="divFormulaire">
        <!-- Popup confirmation dialog (outside the loop) -->
        <div id="popupConfirm" class="popup-confirm">
            <div class="popup-content">
                <p>Voulez-vous vraiment supprimer ce trajet?</p>
                <form id="deleteForm" action="../controllers/controller-historique.php" method="POST">
                    <input type="hidden" name="id_trajet" id="id_trajet" value="">
                    <button id="btn-accept" type="submit">Oui</button>
                    <button id="btn-cancel">Non</button>
                </form>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Distance</th>
                    <th>Durée</th>
                    <th>Moyen de transport</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($trajetData as $value) { ?>
                    <tr>
                        <td>
                            <?= $value['date_FR'] ?>
                        </td>
                        <td>
                            <?= $value['distance_trajet'] . 'kms' ?>
                        </td>
                        <td>
                            <?= $value['traveltime_trajet'] ?>
                        </td>
                        <td>
                            <?= $value['Type_modedetransport'] ?>
                        </td>
                        <!-- Add unique identifier to each row or delete button -->
                        <td><button class="btn-delete" data-row-id="<?= $value['id_trajet'] ?>"><i
                                    class="fa-solid fa-trash-can"></i></button></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="../controllers/controller-home.php"><button class="btn-signup">Retour Home</button></a>
    </div>
    <footer>
        <?php
        include 'templates/footer.php';
        ?>
    </footer>
    <script src="../assets/js/view-historique.js"></script>
</body>

</html>