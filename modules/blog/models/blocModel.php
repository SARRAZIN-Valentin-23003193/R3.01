<?php
function initBloc($titre, $lieu, $texte){
    ?>
    <section class="bloc">
        <h2 class="titre"><?php echo(string) $titre; ?></h2>
        <p class="lieu"><?php echo(string) $lieu; ?></p>
        <p class="texte"><?php echo(string) $texte; ?></p>
        <section class="boutonfin">
            <button href="#" class="boutonsuprr">Supprimer</button>
            <button href="#" class="boutonmodif">Modifier</button>
        </section>
    </section>
    <?php
}
?>