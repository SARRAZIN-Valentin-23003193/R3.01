<?php
function connectDB(){
    $pwd = "projetwebtenrac";
    $user = "tenrac45";
    $host = "mysql-tenrac45.alwaysdata.net";
    $db = "tenrac45_1";

    // Verifie la connection
    $dbLink = mysqli_connect($host, $user, $pwd)
    or die('Erreur de connexion au serveur : ' . mysqli_connect_error());

    // Choix de la base
    mysqli_select_db($dbLink , $db)
    or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));
    return $dbLink;
}
?>