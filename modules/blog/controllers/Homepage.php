<?php

namespace blog\controllers;

require 'modules/blog/views/homepage.php';


class Homepage {
    public function execute() : void {
        (new \blog\views\Homepage())->show();
    }
}