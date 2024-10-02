<?php

namespace blog\views;


use blog\controllers\ClubController;

class structure {

    public function show() {
        ob_start();
?>
        <?php
        if(isset($_SESSION['suid'])) {
            ?>
            <form action="?action=ajouterClub" method="post">
                <label>nom du Club <input type="text" name="nomclub" required></label>
                <label>Adresse <input type="text" name="adressclub" required></label>
                <button type="submit">envoyer</button>
            </form>
            <?php
        }
        ?>

    <main>
        <link rel="stylesheet" href="<?php echo base_url('_assets/styles/clubStyle.css'); ?>">
        <section id="bloc">
            <?php
            if (class_exists('blog\controllers\ClubController')) {
                $controller = new ClubController();
                $parsedUrl = parse_url($_SERVER['REQUEST_URI']);
                parse_str($parsedUrl['query'], $queryParams);
                $currentPage = isset($queryParams['page']) ? (int)$queryParams['page'] : 1;
                $postsPerPage = 3;
                $controller->drawClub($currentPage, $postsPerPage);
            } else {
                echo "Erreur : La classe ClubController n'existe pas.";
            }
            ?>
        </section>
    </main>
<?php
        (new HtmlLayout("Clubs" ,ob_get_clean()))->show();
    }
}
?>