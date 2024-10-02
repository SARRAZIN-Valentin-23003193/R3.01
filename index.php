<?php


require 'modules/blog/controllers/Homepage.php';
require 'modules/blog/controllers/ClubController.php';
require 'modules/blog/controllers/TenracController.php';

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
            case 'tenrac':
                (new blog\controllers\TenracController())->execute();
                break;
        }
    }else {
        (new blog\controllers\Homepage())->execute();
    }
} catch (\Exception $e) {
    echo $e->getMessage();
}

?>
