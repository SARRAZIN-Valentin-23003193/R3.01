<?php

namespace blog\views;

require '/home/tenrac45/www/modules/blog/controllers/platController.php';

class plat {

    public function show() : void {
        ob_start();

?>
    <main>
        <section id="ensemble_Plat">
            <h2> </h2>
        </section>
    </main>
<?php
        (new HtmlLayout("Plats", ob_get_clean()))->show();
    }
}
?>
