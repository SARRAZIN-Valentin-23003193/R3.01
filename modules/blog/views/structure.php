<?php
require '/home/tenrac45/www/modules/blog/controllers/clubController.php';
require __DIR__ . '/HtmlLayout.php';
start_page("L'ordre des tenracs");
addHeader();
?>
    <main>
        <section id="ensembleClub">
            <?php
            drawClub();
            ?>
        </section>
    </main>
<?php
addFooter();
end_page();
?>