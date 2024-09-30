<?php
require '/home/tenrac45/www/modules/blog/controllers/clubController.php';
require __DIR__ . '/HtmlLayout.php';
require '../controllers/ajout-club.php';

start_page("L'ordre des tenracs");
addHeader();
?>
    <form action="../controllers/ajout-club.php" method="post">
        <label>nom du Club <input type="text" name="nomclub"></label>
        <label>Adresse <input type="text" name="adressclub"></label>
        <button type="submit">envoyer</button>
    </form>

    <main>
        <section id="bloc">
            <?php
            $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $postsPerPage = 2;
            drawClub($currentPage, $postsPerPage);
            ?>
        </section>
    </main>
<?php
addFooter();
end_page();

?>