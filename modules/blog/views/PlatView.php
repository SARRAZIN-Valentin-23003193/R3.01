<?php

namespace blog\views;

use blog\controllers\PlatController;


class PlatView {


    public function show() : void {
        ob_start();
?>
        <?php
        if(isset($_SESSION['suid'])) {
            ?>
            <form action="?action=ajouterPlat" method="post">
                <label>nom du Club <input type="text" name="nomPlat" required></label>
                <label>Adresse <input type="text" name="adressPlat" required></label>
                <button type="submit">envoyer</button>
            </form>
            <?php
        }
        ?>

        <main>
            <section id="bloc">
                <?php
                if (class_exists('blog\controllers\PlatController')) {
                    $controller = new PlatController();
                    $parsedUrl = parse_url($_SERVER['REQUEST_URI']);
                    parse_str($parsedUrl['query'], $queryParams);
                    $currentPage = isset($queryParams['page']) ? (int)$queryParams['page'] : 1;
                    $postsPerPage = 3;
                    $controller->drawPlat($currentPage, $postsPerPage);
                } else {
                    echo "Erreur : La classe PlatController n'existe pas.";
                }
                ?>
            </section>
        </main>
<?php
        (new HtmlLayout("Plats", ob_get_clean()))->show();
    }
}
?>
