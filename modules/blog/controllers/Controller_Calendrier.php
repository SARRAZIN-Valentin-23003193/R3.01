<?php
require_once '../models/Model_Calendrier.php';

class Controller_Calendrier {
    private $model;

    public function __construct() {
        $this->model = new Model_Calendrier();
    }

    public function afficherCalendrier() {
        // Récupération des repas
        $repas = $this->model->getRepasWithPlats();

        // Tester la récupération des données
        if (empty($repas)) {
            echo "Aucun repas trouvé."; // Affiche ce message si aucune donnée n'est trouvée
        } else {
            echo "<pre>";
            print_r($repas); // Vérifie les données récupérées
            echo "</pre>";
        }

        // Inclure la vue du calendrier
        include 'modules/blog/views/calendrier.php';
    }
}

// Instanciation du contrôleur
$controller = new Controller_Calendrier();
$controller->afficherCalendrier();
?>
