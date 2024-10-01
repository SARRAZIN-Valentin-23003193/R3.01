<?php
function initClub($Clubid, $Nom_C, $Adresse_C){
    ?>

    <section class="club">
        <h2 class="Nom"><?php echo(string) $Nom_C; ?></h2>
        <p class="Adresse"><?php echo(string) $Adresse_C; ?></p>
        <section class="boutonfin">
            <form method="POST" action="../../controllers/sup-club.php">
                <input type="hidden" name="Clubid" value="<?php echo (int) $Clubid; ?>">
                <button type="submit" class="boutonsuprr">Supprimer</button>
            </form>
            <button id="<?php echo(string) $Clubid; ?>" class="boutonmodif">Modifier</button>
        </section>
    </section>
    <?php
}
?>