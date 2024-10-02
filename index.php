<?php


require 'modules/blog/controllers/HomepageController.php';
require 'modules/blog/controllers/ClubController.php';
require 'modules/blog/controllers/TenracController.php';
require 'modules/blog/controllers/CalendrierController.php';
require 'modules/blog/controllers/AuthentificationController.php';
require 'modules/blog/controllers/PlatController.php';

session_start();


try {
    if (filter_input(INPUT_GET, 'action')) {
        $action = filter_input(INPUT_GET, 'action');
        switch ($action) {
            case 'homepage':
                (new blog\controllers\HomepageController())->execute();
                break;
            case 'clubs':
                (new blog\controllers\ClubController())->execute();
                break;
            case 'ajouterClub':
                (new blog\controllers\ClubController())->ajouterClub();
                break;
            case 'supClub':
                (new blog\controllers\ClubController())->supprimerClub();
                break;
            case 'tenracView':
                (new blog\controllers\TenracController())->execute();
                break;
            case 'ajoutTenrac':
                (new blog\controllers\TenracController())->ajoutTenrac();
                break;
            case 'calendrierView':
                (new \blog\controllers\CalendrierController())->execute();
                break;
            case 'plats':
                (new blog\controllers\platController())->execute();
                break;
            case 'authentification':
                (new blog\controllers\AuthentificationController())->execute();
                break;
            case 'login':
                (new blog\controllers\AuthentificationController())->connexion();
                break;
            case 'logout':
                (new blog\controllers\AuthentificationController())->deconnexion();
                break;
            default:
                (new blog\controllers\HomepageController())->execute();
        }
    }else {
        (new blog\controllers\HomepageController())->execute();
    }
} catch (\Exception $e) {
    echo $e->getMessage();
}

?>
