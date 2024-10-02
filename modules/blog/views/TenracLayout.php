<?php

function initLigne($Nom_T, $NumTel, $Courriel, $Adresse_T, $Grade, $Titre, $Rang, $Dignite) {
    ?>
    <tr>
        <th class="Nom_T"><?php echo(String) $Nom_T ?></th>
        <th class="NumTel"><?php echo(String) $NumTel ?></th>
        <th class="Courriel"><?php echo(String) $Courriel ?></th>
        <th class="Adresse_T"><?php echo(String) $Adresse_T ?></th>
        <th class="Grade"><?php echo(String) $Grade ?></th>
        <th class="Titre"><?php echo(String) $Titre ?></th>
        <th class="Rang"><?php echo(String) $Rang ?></th>
        <th class="Dignite"><?php echo(String) $Dignite ?></th>
    </tr>
        <?php
}
?>
