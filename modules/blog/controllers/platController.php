<?php

//appel modèle platsModel
require '../models/platsModel.php';

class platController {
    private $model; // sert à stocker l'instance du modèle

    public function __construct() {
        $this->model = new platsModel(); // Initialisation du modèle
    }

    public function afficherPLat() {
        // récupère les plats depuis le modèle
        $repas = $this->model->drawPlat();

        // Préparation des data pour l'affichage de chaque plats
        foreach ($repas as $repas_item) {
            $events[] = [
                'title' => 'Repas à ' . $repas_item['Adresse_Partenaire'], // Titre de l'événement
                'description' => 'Plats : ' . $repas_item['Plats'], // Description de l'événement
                'start' => $repas_item['Date_R'], // Date du repas
                'allDay' => true // On part du principe que l'évènement dure toute la journée
            ];
        }

        // appel la vue
        require '../views/plat.php';
    }
}

// l'instance "controller" prends la valeur du contrôleur calendrier et appel de la méthode d'affichage
$controller = new Controller_Calendrier();
$controller->afficherCalendrier();
?>
