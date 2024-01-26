<?php

class Trajet
{
    /**
     * @param int $id_trajet ID du trajet de l'utilisateur
     * @param string $date date du trajet de l'utilisateur
     * @param string $distance distance du trajet de l'utilisateur
     * @param string $travel temps de trajet de l'utilisateur
     * @param int $id_modetransport mode de transport de l'utilisateur
     * @param int $id_utilisateur ID de l'utilsateur
     *  
     * @return void 
     
    */
    public static function create(int $id_trajet, string $date, string $distance, string $travel, int $id_modetransport, int $id_utilisateur)
    {
        // try and catch
        try {
            // Création d'un objet $db selon la classe PDO 
            // Connextion à la bdd
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSER, DBPASSWORD);
            // stockage de la requete dans une variable
            $sql = "INSERT INTO `trajet` (`id_trajet`,`date_trajet`,`distance_trajet`,`traveltime_trajet`,`id_modedetransport`,`id_utilisateur`,`id_trajet`) VALUES(:id_trajet, :date_trajet, :distance_trajet, :traveltime_trajet, :id_modedetransport, :id_utilisateur )";

            $query = $db->prepare($sql);

            // on relie les valeurs à nos marqueurs à l'aide d'un bindValue
            $query->bindValue(':id_trajet', $id_trajet, PDO::PARAM_INT);
            $query->bindValue(':date_trajet', $date, PDO::PARAM_STR);
            $query->bindValue(':distance_trajet', $distance, PDO::PARAM_STR);
            $query->bindValue(':traveltime_trajet', $travel, PDO::PARAM_STR);
            $query->bindValue(':id_modedetransport', $id_modetransport, PDO::PARAM_INT);
            $query->bindValue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);

            $query->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }

    }

    public static function getAllTrajets(string $id_utilisateur): array
    {
        // le try and catch permet de gérer les erreurs, nous allons l'utiliser pour gérer les erreurs liées à la base de données
        try {
            // Création d'un objet $db selon la classe PDO
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSER, DBPASSWORD);

            // stockage de ma requete dans une variable
            $sql = "SELECT *, DATE_FORMAT(`date_trajet`, '%d/%m/%Y') AS date_FR FROM `trajet` NATURAL JOIN `modedetransport` WHERE `id_utilisateur` = :id_utilisateur";

            // je prepare ma requête pour éviter les injections SQL
            $query = $db->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':id_utilisateur', $id_utilisateur, PDO::PARAM_STR);

            // on execute la requête
            $query->execute();

            // on récupère le résultat de la requête dans une variable
            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }
    public static function deleteTrajet(string $id_trajet)
    {
        try {
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSER, DBPASSWORD);

            $sql = "DELETE FROM `trajet` WHERE `id_trajet` = :id_trajet";
            $query = $db->prepare($sql);
            $query->bindValue(':id_trajet', $id_trajet, PDO::PARAM_INT);
            $query->execute();
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }
}

