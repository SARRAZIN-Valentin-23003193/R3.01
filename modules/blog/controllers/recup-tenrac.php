<?php
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

    //Requête SQL
    $query = 'SELECT nom, num, mail, adresse FROM tenrac';

    //Envoie de la requête
    if(!($dbResult = mysqli_query($dbLink, $query)))
    {
        echo 'Erreur de requête<br>';
        // Affiche le type d'erreur.
        echo 'Erreur : ' . mysqli_error($dbLink) . '<br>';
        // Affiche la requête envoyée.
        echo 'Requête : ' . $query . '<br>';
        exit();
    }

    //Récupère le résultat de la requête
    while($dbRow = mysqli_fetch_assoc($dbResult)) {
        $nom = $dbRow['nom'] . ' ';
        echo $dbRow['num'] . ' ';
        echo $dbRow['mail'] . ' ';
        echo $dbRow['adresse'] . ' ';
        echo '<br><br>';
    }
?>