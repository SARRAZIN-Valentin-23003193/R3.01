<?php

namespace blog\controllers;

use ClubModel;

require 'modules/blog/models/ClubModel.php'; // Inclure le modèle Club
require 'modules/blog/views/ClubView.php';

class ClubController {

    private $clubModel;

    // Constructeur qui initialise le modèle
    public function __construct() {
        $this->clubModel = new ClubModel();  // Instanciation du modèle Club
    }

    public function execute() : void
    {
        (new \blog\views\clubView())->show();
    }

    public function drawClub($currentPage = 1, $postsPerPage = 5) {
        require_once 'modules/blog/views/ClubGenerator.php';
        $clubModel = new ClubModel();
        list($clubs, $totalPosts) = $clubModel->fetchClubs($currentPage, $postsPerPage);
        $totalPages = ceil($totalPosts / $postsPerPage);
        renderClubs($clubs, $totalPages);
    }

    // Méthode pour ajouter un club
    public function ajouterClub() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nom = $_POST['nomclub'];
            $lieux = $_POST['adressclub'];

            if (!empty($nom) && !empty($lieux)) {
                $this->clubModel->ajouterClub($nom, $lieux);
                header('Location: https://tenrac45.alwaysdata.net/index.php/?action=clubs');
                exit();
            } else {
                echo "Veuillez remplir tous les champs.";
            }
        }
    }

    // Méthode pour modifier un club
    public function modifierClub() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $idModif = $_POST['Clubid'];
            $ClubNom = $_POST['ClubNom'];
            $ClubAdresse = $_POST['ClubAdresse'];

            if (!empty($idModif) && !empty($ClubNom) && !empty($ClubAdresse)) {
                $this->clubModel->modifierClub($idModif, $ClubAdresse, $ClubNom);
            } else {
                echo "Veuillez remplir tous les champs.";
            }
        }
    }


    // Méthode pour supprimer un club
    public function supprimerClub() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $idSup = $_POST['Clubid'];

            if (!empty($idSup)) {
                $this->clubModel->supprimerClub($idSup);
                header('Location: https://tenrac45.alwaysdata.net/index.php/?action=clubs');
                exit();
            } else {
                //echo "Identifiant club manquant.";
            }
        }
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $club = new ClubModel();

    if (isset($_POST['ajouter'])) {
        $nom = $_POST['nomclub'];
        $lieux = $_POST['adressclub'];
        $club->ajouterClub($nom, $lieux);
    } elseif (isset($_POST['modifier'])) {
        $idModif = $_POST['Clubid'];
        $ClubNom = $_POST['ClubNom'];
        $ClubAdresse = $_POST['ClubAdresse'];
        $club->modifierClub($idModif, $ClubAdresse, $ClubNom);
    } elseif (isset($_POST['supprimer'])) {
        $idSup = $_POST['Clubid'];
        $club->supprimerClub($idSup);
    }
}