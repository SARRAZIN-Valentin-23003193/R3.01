<?php
require_once '../models/ClubModel.php'; // Inclure le modèle Club

class ClubController {

    private $clubModel;

    // Constructeur qui initialise le modèle
    public function __construct() {
        $this->clubModel = new ClubModel();  // Instanciation du modèle Club
    }

    // Méthode pour ajouter un club
    public function ajouterClub() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nom = $_POST['nomclub'];
            $lieux = $_POST['adressclub'];

            if (!empty($nom) && !empty($lieux)) {
                $this->clubModel->ajouterClub($nom, $lieux);
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
            } else {
                echo "Identifiant club manquant.";
            }
        }
    }
}
