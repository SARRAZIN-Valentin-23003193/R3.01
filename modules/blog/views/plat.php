<?php

namespace blog\views;

use blog\controllers\platController;


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
                if (class_exists('blog\controllers\platController')) {
                    $controller = new platController();
                    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                    $postsPerPage = 6;
                    $controller->drawPlat($currentPage, $postsPerPage);
                } else {
                    echo "Erreur : La classe platController n'existe pas.";
                }
                ?>
            </section>
        </main>
<?php
        (new HtmlLayout("plats", ob_get_clean()))->show();
    }
}
?>
