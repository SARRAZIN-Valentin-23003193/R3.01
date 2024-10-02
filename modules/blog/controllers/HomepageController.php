<?php

namespace blog\controllers;

require 'modules/blog/views/HomepageView.php';


class HomepageController {
    public function execute() : void {
        (new \blog\views\HomepageView())->show();
    }
}