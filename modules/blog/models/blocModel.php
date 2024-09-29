<?php
function initBloc($titre, $lieu, $texte, $Idpost){
    ?>

    <section class="bloc">
        <h2 class="titre"><?php echo(string) $titre; ?></h2>
        <p class="lieu"><?php echo(string) $lieu; ?></p>
        <p class="texte"><?php echo(string) $texte; ?></p>
        <section class="boutonfin">
            <button id="<?php echo(string) $Idpost; ?>" class="boutonsuprr">Supprimer</button>
            <button id="<?php echo(string) $Idpost; ?>" class="boutonmodif">Modifier</button>
        </section>
    </section>
    <?php
}
?>