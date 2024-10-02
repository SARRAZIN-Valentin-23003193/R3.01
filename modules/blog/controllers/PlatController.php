<?php

namespace blog\controllers;

use PlatModel;

require 'modules/blog/models/PlatModel.php';
require 'modules/blog/views/PlatView.php';

class PlatController {
    private $PlatModel; // sert à stocker l'instance du modèle

    public function __construct() {
        $this->PlatModel = new PlatModel(); // Initialisation du modèle
    }

    public function execute() : void
    {
        (new \blog\views\PlatView())->show();
    }

    public function drawPlat($currentPage = 1, $postsPerPage = 5) {
        require_once 'modules/blog/views/PlatGenerator.php';
        $platModel = new PlatModel();
        list($plats, $totalPosts) = $platModel->fetchPlat($currentPage, $postsPerPage);
        $totalPages = ceil($totalPosts / $postsPerPage);
        renderPlat($plats, $totalPages);
    }
}