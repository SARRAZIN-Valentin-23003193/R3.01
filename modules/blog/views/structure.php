<?php
require '/home/tenrac45/www/modules/blog/controllers/blocController.php';
require __DIR__ . '/HtmlLayout.php';
start_page("L'ordre des tenracs");
addHeader();
?>
<main>
    <section id="bloc">
        <?php
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $postsPerPage = 2;
        drawBloc($currentPage, $postsPerPage);
        ?>
    </section>
</main>
<?php
addFooter();
end_page();

?>

