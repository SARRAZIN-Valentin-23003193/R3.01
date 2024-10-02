<?php

class Model_Calendrier {
    private $db; // pour la connexion à la base de données

    public function __construct() {
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

    public function getRepasWithPlats() {
        try {
            // requête pour récupérer les repas avec leurs plats avec comme date maximal demain
            $query = $this->db->prepare("
                SELECT r.Repas_id, r.Date_R, r.Adresse_Partenaire, GROUP_CONCAT(p.Nom_P SEPARATOR ', ') AS Plats
                FROM Repas r
                LEFT JOIN PlatRepas pr ON r.Repas_id = pr.Repas_id
                LEFT JOIN Plat p ON pr.Plat_id = p.Plat_id
                WHERE r.Date_R <= SYSDATE() + INTERVAL 1 DAY
                GROUP BY r.Repas_id, r.Date_R, r.Adresse_Partenaire
                ORDER BY r.Date_R
            ");

            // Execute de la requête
            $query->execute();

            // récupère les résultats en forme de tableau
            $results = $query->fetchAll(PDO::FETCH_ASSOC);

            // return les résultats de la requete
            return $results;
        } catch (PDOException $e) {
            // En cas d'erreur, affiche un message et arrête le programme aussi
            die('Erreur : ' . $e->getMessage());
        }
    }
}
?>
