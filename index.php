<?php


require 'modules/blog/controllers/Homepage.php';
require 'modules/blog/controllers/ClubController.php';

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
        }
    }else {
        (new blog\controllers\Homepage())->execute();
    }
} catch (\Exception $e) {
    echo $e->getMessage();
}

?>
