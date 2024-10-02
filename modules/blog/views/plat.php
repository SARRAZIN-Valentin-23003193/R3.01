<?php

namespace blog\views;

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
