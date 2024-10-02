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
            $nom = $_POST['nom'];
            $num = $_POST['num'];
            $mail = $_POST['mail'];
            $adresse = $_POST['adresse'];
            $grade = $_POST['grade'];
            $titre = $_POST['titre'];
            $rang = $_POST['rang'];
            $dignite = $_POST['dignite'];

            if (!empty($nom) && !empty($num) && !empty($mail) && !empty($adresse) && !empty($grade) && !empty($titre) && !empty($rang) && !empty($dignite)) {
                $this->tenracModel->ajouterTenrac($nom, $num, $mail, $adresse, $grade, $titre, $rang, $dignite);
                header('Location: https://tenrac45.alwaysdata.net/index.php/?action=tenracView');
                exit();
            } else {
                header('Location: https://tenrac45.alwaysdata.net/index.php/?action=tenracView');
                exit();
                //echo "Veuillez remplir tous les champs.";
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
        require_once 'modules/blog/views/TenracGenerator.php';
        $clubModel = new TenracModel();
        list($clubs, $totalPosts) = $clubModel->recupTenrac($currentPage, $postsPerPage);
        $totalPages = ceil($totalPosts / $postsPerPage);
        renderTenracs($clubs, $totalPages);
    }


}
?>



