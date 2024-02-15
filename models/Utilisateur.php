<?php

class Utilisateur
{
    /**
     * @param string $name Nom de l'utilisateur
     * @param string $prenom Prénom de l'utilisateur
     * @param string $pseudo Pseudo de l'utilisateur
     * @param string $birthdate Date de naissance de l'utilisateur
     * @param string $mail Adresse mail de l'utilsateur
     * @param string $password Mot de passe de l'utilisateur
     * @param string $entreprise ID de l'entreprise de l'utilisateur
     * 
     * @return void 
     
    */

    public static function create(string $name, string $prenom, string $pseudo, string $birthdate, string $mail, string $password, string $entreprise)
    {
        // try and catch
        try {
            // Création d'un objet $db selon la classe PDO 
            // Connextion à la bdd
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSER, DBPASSWORD);
            // stockage de la requete dans une variable
            $sql = "INSERT INTO `Utilisateur` (`lastname_utilisateur`,`firstname_utilisateur`,`nickname_utilisateur`,`birthdate_utilisateur`,`email_utilisateur`,`password_utilisateur`,`ID_Entreprise`) VALUES (:lastname_utilisateur, :firstname_utilisateur, :nickname_utilisateur, :birthdate_utilisateur, :email_utilisateur, :password_utilisateur, :ID_Entreprise)";
            $query = $db->prepare($sql);

            // on relie les valeurs à nos marqueurs à l'aide d'un bindValue
            $query->bindValue(':lastname_utilisateur', htmlspecialchars($name), PDO::PARAM_STR);
            $query->bindValue(':firstname_utilisateur', htmlspecialchars($prenom), PDO::PARAM_STR);
            $query->bindValue(':nickname_utilisateur', htmlspecialchars($pseudo), PDO::PARAM_STR);
            $query->bindValue(':birthdate_utilisateur', $birthdate, PDO::PARAM_STR);
            $query->bindValue(':email_utilisateur', $mail, PDO::PARAM_STR);
            $query->bindValue(':password_utilisateur', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
            $query->bindValue(':ID_Entreprise', $entreprise, PDO::PARAM_INT);
            
            $query->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }

    }
    /**
     * Methode permettant de récupérer les informations d'un utilisateur avec son mail comme paramètre
     * 
     * @param string $mail Adresse mail de l'utilisateur
     * 
     * @return bool
     */
    public static function checkMailExists(string $mail): bool
    {
        // le try and catch permet de gérer les erreurs, nous allons l'utiliser pour gérer les erreurs liées à la base de données
        try {
            // Création d'un objet $db selon la classe PDO
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSER, DBPASSWORD);

            // stockage de ma requete dans une variable
            $sql = "SELECT * FROM `utilisateur` WHERE `email_utilisateur` = :email_utilisateur";

            // je prepare ma requête pour éviter les injections SQL
            $query = $db->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':email_utilisateur', $mail, PDO::PARAM_STR);

            // on execute la requête
            $query->execute();

            // on récupère le résultat de la requête dans une variable
            $result = $query->fetch(PDO::FETCH_ASSOC);

            // on vérifie si le résultat est vide car si c'est le cas, cela veut dire que le mail n'existe pas
            if (empty($result)) {
                return false;
            } else {
                return true;
            }
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }

    /**
     * Methode permettant de récupérer les infos d'un utilisateur avec son mail comme paramètre
     * 
     * @param string $mail Adresse mail de l'utilisateur
     * 
     * @return array Tableau associatif contenant les infos de l'utilisateur
     */
    public static function getInfos(string $mail): array
    {
        try {
            // Création d'un objet $db selon la classe PDO
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSER, DBPASSWORD);

            // stockage de ma requete dans une variable
            $sql = "SELECT *, DATE_FORMAT(`birthdate_utilisateur`, '%d/%m/%Y') AS birthdate_FR FROM `utilisateur` WHERE `email_utilisateur` = :email_utilisateur";

            // je prepare ma requête pour éviter les injections SQL
            $query = $db->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':email_utilisateur', $mail, PDO::PARAM_STR);

            // on execute la requête
            $query->execute();

            // on récupère le résultat de la requête dans une variable
            $result = $query->fetch(PDO::FETCH_ASSOC);

            // on retourne le résultat
            return $result;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }



    /**
     * Methode permettant de récupérer les infos d'un utilisateur avec son mail comme paramètre
     * 
     * @param string $imageUser Image de l'utilisateur
     * @param string $name Nom de l'utilisateur
     * @param string $prenom Prénom de l'utilisateur
     * @param string $pseudo Pseudo de l'utilisateur
     * @param string $birthdate Date de naissance de l'utilisateur
     * @param string $mail Adresse mail de l'utilsateur
     * @param string $description description de l'utilisateur
     * 
     * @return void
     */
    
    public static function updateUtilisateur(string $imageUser, string $name, string $prenom, string $pseudo, string $birthdate, string $mail, string $description)
    {
        // try and catch
        try {
            // Création d'un objet $db selon la classe PDO 
            // Connextion à la bdd
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSER, DBPASSWORD);
            // stockage de la requete dans une variable
            $sql = "UPDATE `Utilisateur` 
            SET `Image_utilisateur` = :Image_utilisateur,
             `lastname_utilisateur` = :lastname_utilisateur,
             `firstname_utilisateur` = :firstname_utilisateur, 
             `nickname_utilisateur` = :nickname_utilisateur, 
             `birthdate_utilisateur` = :birthdate_utilisateur, 
             `email_utilisateur` = :email_utilisateur, 
             `description_utilisateur` = :description_utilisateur 
             WHERE `email_utilisateur` = :email_utilisateur";

            $query = $db->prepare($sql);
    
            // on relie les valeurs à nos marqueurs à l'aide d'un bindValue
            $query->bindValue(':Image_utilisateur', $imageUser, PDO::PARAM_STR);
            $query->bindValue(':lastname_utilisateur', $name, PDO::PARAM_STR);
            $query->bindValue(':firstname_utilisateur', $prenom, PDO::PARAM_STR);
            $query->bindValue(':nickname_utilisateur', $pseudo, PDO::PARAM_STR);
            $query->bindValue(':birthdate_utilisateur', $birthdate, PDO::PARAM_STR);
            $query->bindValue(':email_utilisateur', $mail, PDO::PARAM_STR);
            $query->bindValue(':description_utilisateur', $description, PDO::PARAM_STR);
    
            $query->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    
    }


     /**
     * Methode permettant de récupérer les infos d'un utilisateur avec son mail comme paramètre
     * 
     * @param int $idUser id de l'utilisateur
     * 
     * @return void
     */
    public static function deleteUtilisateur(int $idUser)
    {
        // try and catch
        try {
            // Création d'un objet $db selon la classe PDO 
            // Connextion à la bdd
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSER, DBPASSWORD);
            // stockage de la requete dans une variable
            $sql = "DELETE FROM `utilisateur`
            WHERE `id_utilisateur` = :id_utilisateur";

            $query = $db->prepare($sql);
            
            // on relie les valeurs à nos marqueurs à l'aide d'un bindValue
            $query->bindValue(':id_utilisateur', $idUser, PDO::PARAM_INT);
    
            $query->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }
}