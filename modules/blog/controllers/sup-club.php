<?php

function SupClub($idSup) {
    $host = "mysql-tenrac45.alwaysdata.net";
    $username = "tenrac45";
    $password = "projetwebtenrac";
    $dbname = "tenrac45_1";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM `Club` WHERE Clubid = :idSup";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idSup', $idSup);


        // Exécuter la requête
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }



    header('location:https://tenrac45.alwaysdata.net/modules/blog/views/structure.php/');
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $idSup = $_POST['Clubid'];


    // Appeler la fonction pour ajouter les données
    supClub($idSup);
}


