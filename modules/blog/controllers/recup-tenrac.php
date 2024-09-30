<?php

function insertLigne(){
    $pwd = "projetwebtenrac";
    $user = "tenrac45";
    $host = "mysql-tenrac45.alwaysdata.net";
    $db = "tenrac45_1";

    //Verifie la connection
    $dbLink = mysqli_connect($host, $user, $pwd)
    or die('Erreur de connexion au serveur : ' . mysqli_connect_error());

    //Choix de la base
    mysqli_select_db($dbLink , $db)
    or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink)
    );

    $result = mysqli_query($dbLink, 'SELECT COUNT(*) as count FROM Tenracs');
    $row = mysqli_fetch_assoc($result);
    $count = (int)$row['count'];

    $i = 1;
    while($i < ($count+1)){
        $qnom = 'SELECT Nom_T FROM Tenracs WHERE Tenracid = ' . $i;
        $nomResult = mysqli_query($dbLink, $qnom);
        $nomRow = mysqli_fetch_assoc($nomResult);
        $nom = isset($row['nom']) ? $row['nom'] : '';

        $qnum = 'SELECT NumTel FROM Tenracs WHERE Tenracid = ' . $i;
        $numResult = mysqli_query($dbLink, $qnum);
        $numRow = mysqli_fetch_assoc($numResult);
        $num = isset($row['num']) ? $row['num'] : '';

        $qmail = 'SELECT Courriel FROM Tenracs WHERE Tenracid = ' . $i;
        $mailResult = mysqli_query($dbLink, $qmail);
        $mailRow = mysqli_fetch_assoc($mailResult);
        $mail = isset($row['mail']) ? $row['mail'] : '';

        $qadresse = 'SELECT Adresse_T FROM Tenracs WHERE Tenracid = ' . $i;
        $adresseResult = mysqli_query($dbLink, $qadresse);
        $adresseRow = mysqli_fetch_assoc($adresseResult);
        $adresse = isset($row['adresse']) ? $row['adresse'] : '';

        $qgrade = 'SELECT Grade FROM Tenracs WHERE Tenracid = ' . $i;
        $gradeResult = mysqli_query($dbLink, $qgrade);
        $gradeRow = mysqli_fetch_assoc($gradeResult);
        $grade = isset($row['grade']) ? $row['grade'] : '';

        $qtitre = 'SELECT Titre FROM Tenracs WHERE Tenracid = ' . $i;
        $titreResult = mysqli_query($dbLink, $qtitre);
        $titreRow = mysqli_fetch_assoc($titreResult);
        $titre = isset($row['titre']) ? $row['titre'] : '';

        $qrang = 'SELECT Rang FROM Tenracs WHERE Tenracid = ' . $i;
        $rangResult = mysqli_query($dbLink, $qrang);
        $rangRow = mysqli_fetch_assoc($rangResult);
        $rang = isset($row['rang']) ? $row['rang'] : '';

        $qdignite = 'SELECT Dignite FROM Tenracs WHERE Tenracid = ' . $i;
        $digniteResult = mysqli_query($dbLink, $qdignite);
        $digniteRow = mysqli_fetch_assoc($digniteResult);
        $dignite = isset($row['dignite']) ? $row['dignite'] : '';

        $i++;

        initLigne($nom, $num, $mail, $adresse, $grade, $titre, $rang, $dignite);
    }
}

function initLigne($nom, $num, $mail, $adresse, $grade, $titre, $rang, $dignite){
    ?>
    <table class="tableau">
        <tr>
            <th class="nom"><?php echo(string) $nom; ?></th>
            <th class="num"><?php echo(string) $num; ?></th>
            <th class="mail"><?php echo(string) $mail; ?></th>
            <th class="adresse"><?php echo(string) $adresse; ?></th>
            <th class="grade"><?php echo(string) $grade; ?></th>
            <th class="titre"><?php echo(string) $titre; ?></th>
            <th class="rang"><?php echo(string) $rang; ?></th>
            <th class="dignite"><?php echo(string) $dignite; ?></th>
        </tr>
    </table>
    <?php
}
?>