<?php
function initClub($Clubid, $Nom_C, $Adresse_C){
    ?>

    <section class="club">
        <h2 class="Nom"><?php echo(string) $Nom_C; ?></h2>
        <p class="Adresse"><?php echo(string) $Adresse_C; ?></p>
        <section class="boutonfin">
            <button id="<?php echo(string) $Clubid; ?>" class="boutonsuprr">Supprimer</button>
            <button id="<?php echo(string) $Clubid; ?>" class="boutonmodif">Modifier</button>
        </section>
    </section>
    <?php
}
?>