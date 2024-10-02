<?php

namespace blog\views;


class structure {

    public function show() {
        ob_start();
?>
    <form action="<?php base_url('modules\blog\models\ajout-tenrac.php') ?>" method="post">
        <label>nom du Club <input type="text" name="nomclub"></label>
        <label>Adresse <input type="text" name="adressclub"></label>
        <button type="submit">envoyer</button>
    </form>

    <main>
        <link rel="stylesheet" href="<?php echo base_url('_assets/styles/clubStyle.css'); ?>">
        <section id="bloc">
            <?php
            //$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            //$postsPerPage = 6;
            //drawClub($currentPage, $postsPerPage);
            ?>
        </section>
    </main>
<?php
        (new HtmlLayout("Clubs" ,ob_get_clean()))->show();
    }
}
?>