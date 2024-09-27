<?php

require 'modules\blog\controllers\homepage.php';


try {
    if (filter_input(INPUT_GET, 'action')) {
        $action = filter_input(INPUT_GET, 'action');
        switch ($action) {
            case 'homepage':
                (new Blog\Controllers\Homepage\Homepage())->execute();
        }
    }
    (new Blog\Controllers\Homepage\Homepage())->execute();
} catch (\Exception $e) {
    echo $e->getMessage();
}

?>
