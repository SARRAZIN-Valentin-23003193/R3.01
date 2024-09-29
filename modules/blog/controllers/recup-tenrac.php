<?php

function insertLigne(){
    $pwd = "Super_Pershing";
    $user = "sarrazin";
    $host = "mysql-sarrazin.alwaysdata.net";
    $db = "sarrazin_database";

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
        $nom = $nomRow['nom'];

        $qnum = 'SELECT NumTel FROM Tenracs WHERE Tenracid = ' . $i;
        $numResult = mysqli_query($dbLink, $qnum);
        $numRow = mysqli_fetch_assoc($numResult);
        $num = $numRow['num'];

        $qmail = 'SELECT Courriel FROM Tenracs WHERE Tenracid = ' . $i;
        $mailResult = mysqli_query($dbLink, $qmail);
        $mailRow = mysqli_fetch_assoc($mailResult);
        $mail = $mailRow['mail'];

        $qadresse = 'SELECT Adresse_T FROM Tenracs WHERE Tenracid = ' . $i;
        $adresseResult = mysqli_query($dbLink, $qadresse);
        $adresseRow = mysqli_fetch_assoc($adresseResult);
        $adresse = $adresseRow['adresse'];

        $qgrade = 'SELECT Grade FROM Tenracs WHERE Tenracid = ' . $i;
        $gradeResult = mysqli_query($dbLink, $qgrade);
        $gradeRow = mysqli_fetch_assoc($gradeResult);
        $grade = $gradeRow['grade'];

        $qtitre = 'SELECT Titre FROM Tenracs WHERE Tenracid = ' . $i;
        $titreResult = mysqli_query($dbLink, $qtitre);
        $titreRow = mysqli_fetch_assoc($titreResult);
        $titre = $titreRow['titre'];

        $qrang = 'SELECT Rang FROM Tenracs WHERE Tenracid = ' . $i;
        $rangResult = mysqli_query($dbLink, $qrang);
        $rangRow = mysqli_fetch_assoc($rangResult);
        $rang = $rangRow['rang'];

        $qdignite = 'SELECT Dignite FROM Tenracs WHERE Tenracid = ' . $i;
        $digniteResult = mysqli_query($dbLink, $qdignite);
        $digniteRow = mysqli_fetch_assoc($digniteResult);
        $dignite = $digniteRow['dignite'];

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