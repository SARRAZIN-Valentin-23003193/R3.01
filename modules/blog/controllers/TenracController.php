<?php

namespace blog\controllers;

//Appel du modèle TenracModel
use TenracModel;

require 'modules/blog/models/TenracModel.php';
require 'modules/blog/views/TenracView.php';

class TenracController {
    private $tenracModel; //Stock le modèle

    public function __construct(){
        $this->tenracModel = new TenracModel(); //Initialise le modèle
    }

    public function execute() : void {
        (new \blog\views\TenracView())->show();
    }

    public function ajoutTenrac() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tenrac = new TenracModel();

            if (isset($_POST['ajouter'])) {
                $nom = $_POST['nom'];
                $num = $_POST['num'];
                $mail = $_POST['mail'];
                $adresse = $_POST['adresse'];
                $grade = $_POST['grade'];
                $titre = $_POST['titre'];
                $rang = $_POST['rang'];
                $dignite = $_POST['dignite'];
                $tenrac->ajouterTenrac($nom, $num, $mail, $adresse, $grade, $titre, $rang, $dignite);
            }
        }
    }

    public function modifierTenrac() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tenrac = new TenracModel();

            if (isset($_POST['modifier'])) {
                $idModif = $_POST['Tenracid'];
                $Nom = $_POST['Nom'];
                $Num = $_POST['Num'];
                $Mail = $_POST['Mail'];
                $Adresse = $_POST['Adresse'];
                $Grade = $_POST['Grade'];
                $Titre = $_POST['Titre'];
                $Rang = $_POST['Rang'];
                $Dignite = $_POST['Dignite'];
                $tenrac->modifierTenrac($idModif, $Nom, $Num, $Mail, $Adresse, $Grade, $Titre, $Rang, $Dignite);
            }
        }
    }

    public function supprimerTenrac() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tenrac = new TenracModel();

            if (isset($_POST['supprimer'])) {
                $idSup = $_POST['Tenracid'];
                $tenrac->supprimerTenrac($idSup);
            }
        }
    }

    public function afficherTenrac($currentPage = 1, $postsPerPage = 5) {
        require_once 'modules/blog/views/TenracInit.php';
        $clubModel = new TenracModel();
        list($clubs, $totalPosts) = $clubModel->recupTenrac($currentPage, $postsPerPage);
        $totalPages = ceil($totalPosts / $postsPerPage);
        renderTenracs($clubs, $totalPages);
    }


}
?>



