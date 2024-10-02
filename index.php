<?php


require 'modules/blog/controllers/Homepage.php';
require 'modules/blog/controllers/ClubController.php';
require 'modules/blog/controllers/TenracController.php';
require 'modules/blog/controllers/Controller_Calendrier.php';
require 'modules/blog/controllers/platController.php';

session_start();


try {
    if (filter_input(INPUT_GET, 'action')) {
        $action = filter_input(INPUT_GET, 'action');
        switch ($action) {
            case 'homepage':
                (new blog\controllers\Homepage())->execute();
                break;
            case 'clubs':
                (new blog\controllers\ClubController())->execute();
                break;
            case 'ajouterClub':
                (new blog\controllers\ClubController())->ajouterClub();
                break;
            case 'tenrac':
                (new blog\controllers\TenracController())->execute();
                break;
            case 'calendrier':
                (new \blog\controllers\Controller_Calendrier())->execute();
                break;
            case 'plats':
                (new blog\controllers\platController())->execute();
                break;
            default:
                (new blog\controllers\Homepage())->execute();
        }
    }else {
        (new blog\controllers\Homepage())->execute();
    }
} catch (\Exception $e) {
    echo $e->getMessage();
}

?>
