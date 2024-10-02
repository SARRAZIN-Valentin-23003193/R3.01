<?php

namespace blog\controllers;

use blog\models\RechercheTenracModel;

class RechercheTenracController
{
    private $rechercheModel;

    public function __construct() {
        $this->rechercheModel = new RechercheTenracModel(); // Initialisation du modèle
    }

    public function execute() : void {
        (new \blog\views\AuthentificationView())->show();
    }

    public function drawResult()
    {
        require_once 'modules/blog/views/TenracLayout.php';

    }

    public function rechercheTenrac()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $recherche = $_POST['recherche'];

            if (!empty($recherche)) {
                $this->rechercheModel->rechercheTenracBD($recherche);
            } else {
                echo "Veuillez remplir tous les champs.";
            }
        }
    }
}