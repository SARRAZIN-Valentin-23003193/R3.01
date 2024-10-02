<?php

namespace blog\models;
use PDO;
use PDOException;
class RechercheTenracModel
{
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

    public function rechercheTenracBD($recherche)
    {
        $sql = "SELECT *
        FROM Tenracs
        WHERE Code_T LIKE '%$recherche%'
        OR Nom_T LIKE '%$recherche%'
        OR Courriel LIKE '%$recherche%'
        OR NumTel LIKE '%$recherche%'
        OR Adresse_T LIKE '%$recherche%'
        OR Grade LIKE '%$recherche%'
        OR Titre LIKE '%$recherche%'
        OR Rang LIKE '%$recherche%'
        OR Dignite LIKE '%$recherche%'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        while ($row = mysqli_fetch_assoc($result)) {
            $nom = $row['Nom_T'];
            $num = $row['NumTel'];
            $mail = $row['Courriel'];
            $adresse = $row['Adresse_T'];
            $grade = $row['Grade'];
            $titre = $row['Titre'];
            $rang = $row['Rang'];
            $dignite = $row['Dignite'];

            initLigne($nom, $num, $mail, $adresse, $grade, $titre, $rang, $dignite);
        }
    }
}