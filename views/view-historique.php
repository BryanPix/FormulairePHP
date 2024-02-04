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
        <!-- Popup confirmation suppression -->
        <div id="popupConfirm" class="popup-confirm">
            <div class="popup-content">
                <p id="deleteText"></p>
                <form id="deleteForm" action="../controllers/controller-historique.php" method="POST">
                    <input type="hidden" name="id_trajet" id="id_trajet" value="">
                    <button id="btn-accept" type="submit">Oui</button>
                </form>
                <button id="btn-cancel">Non</button>
            </div>
        </div>


        
        <table >
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Distance</th>
                    <th>Durée</th>
                    <th>Moyen de transport</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody class="tb-content" >
                <?php foreach ($trajetData as $value) { ?>
                    <tr>
                        <td>
                            <?= $value['date_FR'] ?>
                        </td>
                        <td>
                            <?= $value['distance_trajet'] . ' km' ?>
                        </td>
                        <td>
                            <?= $value['traveltime_trajet'] ?>
                        </td>
                        <td>
                            <?= $value['Type_modedetransport'] ?>
                        </td>
                        <td>
                            <button class="btn-delete trashbin" data-row-id="<?= $value['id_trajet'] ?>" 
                                    data-row-date="<?= $value['date_FR'] ?>" 
                                    data-row-distance="<?= $value['distance_trajet'] . ' km' ?>">
                                <i class="fa-solid fa-trash-can trashbin"></i>
                            </button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <button class="btn-secondary"><a href="../controllers/controller-home.php">Retour Home</a></button>
        <button class="btn-secondary"><a href="../controllers/controller-trajet.php">Ajouter un trajet</a></button>
    </div>
    <footer>
        <?php
        include 'templates/footer.php';
        ?>
    </footer>
    <script src="../assets/js/view-historique.js"></script>
</body>

</html>