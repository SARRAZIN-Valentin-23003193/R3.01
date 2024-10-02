<?php

namespace blog\controllers;

use blog\views\plat;
use blog\models\platsModel;

require 'modules/blog/models/platsModel.php';
require 'modules/blog/views/plat.php';

class platController {
    private $platModel; // sert à stocker l'instance du modèle

    public function __construct() {
        $this->platModel = new platsModel(); // Initialisation du modèle
    }


    function drawPlat($currentPage = 1, $postsPerPage = 5) {
        $platModel = new platsModel();
        list($plats, $totalPosts) = $platModel->fetchPlats($currentPage, $postsPerPage);
        $totalPages = ceil($totalPosts / $postsPerPage);
        renderClubs($plats, $totalPages);
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


    public function execute() : void {
        (new plat())->show();
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $plat = new platsModel();

    if (isset($_POST['ajouter'])) {
        $nom = $_POST['nomplat'];
        $plat->ajouterPLat($nom);
    } elseif (isset($_POST['modifier'])) {
        $idModif = $_POST['PLat_id'];
        $PlatNom = $_POST['PLatNom'];
        $plat->modifierPLat($idModif, $PlatNom);
    } elseif (isset($_POST['supprimer'])) {
        $idSup = $_POST['PLat_id'];
        $plat->supprimerPlat($idSup);
    }
}