<?php

require 'modules/blog/controllers/Homepage.php';

session_start();


try {
    if (filter_input(INPUT_GET, 'action')) {
        $action = filter_input(INPUT_GET, 'action');
        switch ($action) {
            case 'homepage':
                (new blog\controllers\Homepage())->execute();
        }
    }
    (new blog\controllers\Homepage())->execute();
} catch (\Exception $e) {
    echo $e->getMessage();
}

?>
