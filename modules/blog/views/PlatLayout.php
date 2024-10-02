<?php
function initPlat($Plat_id, $Nom_P, $Nom_S, $Nom_I, $Nom_Accomp){
    ?>

    <section class="Plat">
        <h2 class="Plat"><?php echo(string) $Nom_P; ?></h2>
        <h2 class="Sauce_Accompagnement"><?php echo(string) $Nom_S; ?></h2>
        <h2 class="Ingredient"><?php echo(string) $Nom_I; ?></h2>
        <h2 class="Accompagnement"><?php echo(string) $Nom_Accomp; ?></h2>
        <section class="boutonfin">

            <form method="POST" action="?action=supPlat">
                <input type="hidden" name="Plat_id" value="<?php echo (int) $Plat_id; ?>">
                <button type="submit" class="boutonsuprr">Supprimer</button>
            </form>


            <form method="POST" action="modifPlat.php">
                <input type="hidden" name="Plat_id" value="<?php echo (int) $Plat_id; ?>">
                <button type="submit" class="boutonmodif">Modifier</button>
            </form>
        </section>
    </section>
    <?php
}
?>