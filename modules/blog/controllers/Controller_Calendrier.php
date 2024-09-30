<?php
// Controller_Calendrier.php

require_once '../models/Model_Calendrier.php';

class Controller_Calendrier {
    private $model;

    public function __construct() {
        $this->model = new Model_Calendrier();
    }

    public function afficherCalendrier() {
        // Récupération des repas depuis le modèle
        $repas = $this->model->getRepasWithPlats();

        // Préparation des données pour le calendrier
        $events = [];
        foreach ($repas as $repas_item) {
            $events[] = [
                'title' => 'Repas à ' . $repas_item['Adresse_Partenaire'],
                'description' => 'Plats : ' . $repas_item['Plats'],
                'start' => $repas_item['Date_R'],
                'allDay' => true
            ];
        }

        // Affichage de la vue
        require '../views/calendrier.php';
    }
}

// Instanciation du contrôleur et appel de la méthode d'affichage
$controller = new Controller_Calendrier();
$controller->afficherCalendrier();
?>