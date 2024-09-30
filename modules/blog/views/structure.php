<?php
require __DIR__ . '/HtmlLayout.php';
start_page("L'ordre des tenracs");
addHeader();
?>
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

