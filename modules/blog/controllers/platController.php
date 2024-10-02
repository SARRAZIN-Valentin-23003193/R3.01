<?php

namespace blog\controllers;

use platsModel;

require 'modules/blog/models/platsModel.php'; // Inclure le modèle plat
require 'modules/blog/views/plat.php';

class platController {

    private $platmodel; // sert à stocker l'instance du modèle

    public function __construct() {
        $this->platmodel = new platsModel(); // Initialisation du modèle plat
    }

    public function execute() : void
    {
        (new \blog\views\plat())->show();
    }

    function drawPLat($currentPage = 1, $postsPerPage = 5) {
        $platModel = new platsModel();
        list($plat, $totalPosts) = $platModel->fetchPLats($currentPage, $postsPerPage);

        $totalPages = ceil($totalPosts / $postsPerPage);
        renderClubs($plat, $totalPages);
    }

    //ajout des plats
    public function ajouterPlat() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nom = $_POST['nomplat'];

            if (!empty($nom)) {
                $this->platsModel->ajouterPlat($nom);
            } else {
                echo "Veuillez remplir tous les champs.";
            }
        }
    }

    // modification des plats
    public function modifierClub() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $idModif = $_POST['Plat_id'];
            $PlatNom = $_POST['PlatNom'];
            if (!empty($idModif) && !empty($Platnom)) {
                $this->platsModel->modifierPlat($idModif, $PlatNom);
            } else {
                echo "Veuillez remplir tous les champs.";
            }
        }
    }

    //destruction des plats
    public function supprimerPlat() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $idSup = $_POST['Plat_id'];

            if (!empty($idSup)) {
                $this->platsModel->supprimerPlat($idSup);
            } else {
                echo "Identifiant club manquant.";
            }
        }
    }

    public function fetchPlats($currentPage = 1, $postsPerPage = 5) {
        // Get the total number of posts
        $result = mysqli_query($this->conn, 'SELECT COUNT(*) as count FROM Plat');
        $row = mysqli_fetch_assoc($result);
        $totalPosts = (int)$row['count'];

        // Calculate the offset
        $offset = ($currentPage - 1) * $postsPerPage;

        // Fetch the posts for the current page
        $query = 'SELECT Plat.Nom_P, Sauce_Accompagnement.Nom_S, Ingredient.Nom_I, Accompagnement.Nom_Accomp
                FROM Plat
                JOIN Accompagne ON Plat.Plat_id = Accompagne.Plat_id
                JOIN Accompagnement ON Accompagne.Accomp_id = Accompagnement.Accomp_id
                JOIN Sauce ON Plat.Plat_id = Sauce.Plat_id
                JOIN Sauce_Accompagnement ON Sauce.Sauce_id = Sauce_Accompagnement.Sauce_id
                JOIN Ingredient ON Sauce_Accompagnement.Ingredient_id = Ingredient.Ingredient_id LIMIT ' . $postsPerPage . ' OFFSET ' . $offset;
        $result = mysqli_query($this->conn, $query);

        $plats = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $plats[] = $row;
        }

        return [$plats, $totalPosts];

    }
}
