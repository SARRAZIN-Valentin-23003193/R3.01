<?php
function initPlat($Plat_id, $Nom_P, $Nom_S, $Nom_I, $Nom_Accomp){
    ?>

    <section class="Plat">
        <h2 class="Nom_Plat"><?php echo(string) $Nom_P; ?></h2>
        <h2 class="Sauce_Accompagnement"><?php echo(string) $Nom_S; ?></h2>
        <h2 class="Ingredient"><?php echo(string) $Nom_I; ?></h2>
        <h2 class="Accompagnement"><?php echo(string) $Nom_Accomp; ?></h2>
        <?php
        if(isset($_SESSION['suid'])){
            ?>
            <section class="boutonfin">

                <form method="POST" action="">
                    <input type="hidden" name="Platid" value="<?php echo (int) $Plat_id; ?>">
                    <button type="submit" class="boutonsuprr">Supprimer</button>
                </form>


                <form method="POST" action="">
                    <input type="hidden" name="Platid" value="<?php echo (int) $Plat_id; ?>">
                    <button type="submit" class="boutonmodif">Modifier</button>
                </form>
            </section>
            <?php
        }
        ?>
    </section>
    <?php
}
?>