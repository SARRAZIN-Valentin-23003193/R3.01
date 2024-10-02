<?php

namespace blog\controllers;

use blog\views\calendrierView;
use CalendrierModel;

require 'modules/blog/views/CalendrierView.php';
require_once 'modules/blog/models/CalendrierModel.php';

class CalendrierController {
    private $model; // sert à stocker l'instance du modèle

    public function __construct() {
        $this->model = new CalendrierModel(); // Initialisation du modèle
    }

    public function execute() : void {
        // récupère les repas depuis le modèle
        $repas = $this->model->getRepasWithPlats();

        // Préparation des data pour le calendrierView
        $events = [];
        foreach ($repas as $repas_item) {
            $events[] = [
                'title' => 'Repas à ' . $repas_item['Adresse_Partenaire'], // Titre de l'événement
                'description' => 'Plats : ' . $repas_item['Plats'], // Description de l'événement
                'start' => $repas_item['Date_R'], // Date du repas
                'allDay' => true // On part du principe que l'évènement dure toute la journée
            ];
        }
        (new calendrierView($events))->show();
    }

    public function afficherCalendrier() {
        // récupère les repas depuis le modèle
        $repas = $this->model->getRepasWithPlats();

        // Préparation des data pour le calendrierView
        $events = [];
        foreach ($repas as $repas_item) {
            $events[] = [
                'title' => 'Repas à ' . $repas_item['Adresse_Partenaire'], // Titre de l'événement
                'description' => 'Plats : ' . $repas_item['Plats'], // Description de l'événement
                'start' => $repas_item['Date_R'], // Date du repas
                'allDay' => true // On part du principe que l'évènement dure toute la journée
            ];
        }

        // appel la vue
        require '../views/CalendrierView.php'; // Charge la vue CalendrierView.php
    }
}
?>
