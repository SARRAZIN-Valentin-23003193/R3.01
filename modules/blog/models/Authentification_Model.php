<?php
namespace blog\models;
use PDO;
use PDOException;

class Authentification_Model {
    private $db; // pour la connexion à la base de données

    public function __construct()
    {
        try {
            // Connexion à la base de données
            $this->db = new PDO('mysql:host=mysql-tenrac45.alwaysdata.net;
            dbname=tenrac45_1;
            charset=utf8',
                'tenrac45',
                'projetwebtenrac');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // défini le mode d'erreur
        } catch (PDOException $e) {
            // En cas d'erreur, affiche un message et arrête le programme
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function test_Pass($identifiant, $password)
    {
        $stmt = $this->db->prepare("SELECT * FROM Utilisateur WHERE mail = :identifiant");
        $stmt->bindParam(':identifiant', $identifiant);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérifie si l'utilisateur existe et si le mot de passe correspond
        if ($result && password_verify($password, $result['mdp'])) {
            return $result;
        }

        return false;
    }
}