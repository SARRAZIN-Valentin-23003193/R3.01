<?php

namespace Blog\Controllers\Homepage;


class Homepage {
    public function execute() : void {
        (new \Blog\Views\Homepage())->show();
    }
}