<?php
require '/home/tenrac45/www/modules/blog/controllers/blocController.php';
require __DIR__ . '/HtmlLayout.php';
require '../controllers/ajout-club.php';

start_page("L'ordre des tenracs");
addHeader();
?>
    <form action="../../controllers/ajout-club.php" method="post">
        <label>nom du Club <input type="text" name="nomclub"></label>
        <label>Adresse <input type="text" name="adressclub"></label>
        <button type="submit">envoyer</button>
    </form>

    <main>
        <section id="bloc">
            <?php
            drawBloc();
            ?>
        </section>
    </main>
<?php
addFooter();
end_page();

?>