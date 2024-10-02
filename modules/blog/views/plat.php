<?php

namespace blog\views;


class plat {

    public function show() : void {
        ob_start();
?>
        <form action="?action=ajouterPlat" method="post">
            <label>Plat : <input type="text" name="nomplat" required></label>
            <button type="submit">envoyer</button>
        </form>

        <main>
            <section id="bloc">
                <?php

                //$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                //$postsPerPage = 6;
                //drawPlat($currentPage, $postsPerPage);
                ?>
            </section>
        </main>
<?php
        (new HtmlLayout("plats", ob_get_clean()))->show();
    }
}
?>
