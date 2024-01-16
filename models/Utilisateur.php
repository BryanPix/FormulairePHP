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
     * @param string $enterprise ID de l'entreprise de l'utilisateur
    */ 
    public function create(string $name,string $prenom,string $pseudo,string $birthdate,string $mail,string $password,string $enterprise,int $valid)
    {
        // try and catch
        try {
            // Création d'un objet $db selon la classe PDO 
            // Connextion à la bdd
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSER, DBPASSWORD);
            // stockage de la requete dans une variable
            $sql = "INSERT INTO `utilisateur` (`lastname_utilisateur`,`firstname_utilisateur`,`nickname_utilisateur`,`birthdate_utilisateur`,`email_utilisateur`,`password_utilisateur`, `ID_Entreprise`) VALUES(:lastname_utilisateur, :firstname_utilisateur, :nickname_utilisateur, :birthdate_utilisateur, :email_utilisateur, :password_utilisateur, :ID_Entreprise,)";

            $query = $db->prepare($sql);

            // on relie les valeurs à nos marqueurs à l'aide d'un bindValue
            $query->bindValue(':lastname_utilisateur', htmlspecialchars($name), PDO::PARAM_STR);
            $query->bindValue(':firstname_utilisateur', htmlspecialchars($prenom), PDO::PARAM_STR);
            $query->bindValue(':nickname_utilisateur', htmlspecialchars($pseudo), PDO::PARAM_STR);
            $query->bindValue(':birthdate_utilisateur', $birthdate, PDO::PARAM_STR);
            $query->bindValue(':email_utilisateur', $mail, PDO::PARAM_STR);
            $query->bindValue(':password_utilisateur',password_hash($password ,PASSWORD_DEFAULT), PDO::PARAM_STR);
            $query->bindValue(':ID_Entreprise', $enterprise, PDO::PARAM_INT);

            $query->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }

    }
}
