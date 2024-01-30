<?php 

class Entreprise
{



    public static function getAllEntreprise(): array
    {
        try {
            // Création d'un objet $db selon la classe PDO
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSER, DBPASSWORD);

            // stockage de ma requete dans une variable
            $sql = "SELECT * FROM `entreprise`";

            // je prepare ma requête pour éviter les injections SQL
            $query = $db->prepare($sql);

            // on execute la requête
            $query->execute();

            // on récupère le résultat de la requête dans une variable
            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            // on retourne le résultat
            return $result;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }

}