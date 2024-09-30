<?php
class Model_Calendrier {
    private $db;

    public function __construct() {
        try {
            // Connexion à la base de données
            $this->db = new PDO('mysql:host=mysql-tenrac45.alwaysdata.net;
            dbname=tenrac45_1;charset=utf8',
                'tenrac45',
                'projetwebtenrac');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
            exit;
        }
    }

    // Récupère les repas et les plats associés
    public function getRepasWithPlats() {
        try {
            $query = $this->db->prepare("
                SELECT r.Date_R, p.Nom_P 
                FROM Repas r
                JOIN PlatRepas pr ON r.Repas_id = pr.Repas_id
                JOIN Plat p ON pr.Plat_id = p.Plat_id
                ORDER BY r.Date_R
            ");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des repas : " . $e->getMessage();
            return [];
        }
    }
}
?>
