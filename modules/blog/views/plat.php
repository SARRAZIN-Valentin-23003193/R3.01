<?php
require '/home/tenrac45/www/modules/blog/controllers/platModel.php';
require __DIR__ . '/HtmlLayout.php';
start_page("L'ordre des tenracs");
addHeader();
?>
    <main>
        <section id="ensemble_Plat">
            <?php
            drawPlat();
            ?>
        </section>
    </main>
<?php
addFooter();
end_page();

?>
