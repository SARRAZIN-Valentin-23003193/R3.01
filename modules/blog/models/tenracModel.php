<?php
function initLigne($nom, $num, $mail, $adresse, $grade, $titre, $rang, $dignite){
    ?>
    <table class="tableau">
        <tr>
            <th class="nom"><?php echo $nom; ?></th>
            <th class="num"><?php echo $num; ?></th>
            <th class="mail"><?php echo $mail; ?></th>
            <th class="adresse"><?php echo $adresse; ?></th>
            <th class="grade"><?php echo $grade; ?></th>
            <th class="titre"><?php echo $titre; ?></th>
            <th class="rang"><?php echo $rang; ?></th>
            <th class="dignite"><?php echo $dignite; ?></th>
        </tr>
    </table>
    <?php
}
?>