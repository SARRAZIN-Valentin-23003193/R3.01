<?php

class Model_Calendrier {
    private $db;

    public function __construct() {
        try {
            // Connexion à la base de données
            $this->db = new PDO('mysql:host=mysql-tenrac45.alwaysdata.net;dbname=tenrac45_1;charset=utf8', 'tenrac45', 'projetwebtenrac');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function getRepasWithPlats() {
        try {
            // Préparation de la requête
            $query = $this->db->prepare("
                SELECT r.Repas_id, r.Date_R, r.Adresse_Partenaire, GROUP_CONCAT(p.Nom_P SEPARATOR ', ') AS Plats
                FROM Repas r
                LEFT JOIN PlatRepas pr ON r.Repas_id = pr.Repas_id
                LEFT JOIN Plat p ON pr.Plat_id = p.Plat_id
                WHERE r.Date_R <= SYSDATE() + INTERVAL 1 DAY
                GROUP BY r.Repas_id, r.Date_R, r.Adresse_Partenaire
                ORDER BY r.Date_R
            ");

            // Exécution de la requête
            $query->execute();

            // Récupération des résultats
            $results = $query->fetchAll(PDO::FETCH_ASSOC);

            // Retour des résultats
            return $results;
        } catch (PDOException $e) {
            // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : ' . $e->getMessage());
        }
    }
}
?>