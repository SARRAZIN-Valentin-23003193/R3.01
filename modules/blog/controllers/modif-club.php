<?php

function modifClub($idModif,$ClubAdresse,$ClubNom) {
    $host = "mysql-tenrac45.alwaysdata.net";
    $username = "tenrac45";
    $password = "projetwebtenrac";
    $dbname = "tenrac45_1";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE `Club` SET `Nom_C`= :ClubNom,`Adresse_C`= :ClubAdresse WHERE Clubid = :idModif";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idModif', $idModif);
        $stmt->bindParam(':ClubAdresse', $ClubAdresse);
        $stmt->bindParam(':ClubNom', $ClubNom);


        // Exécuter la requête
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }

    header('location:https://tenrac45.alwaysdata.net/modules/blog/views/structure.php/');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $idModif = $_POST['Clubid'];
    $ClubNom = $_POST['ClubNom'];
    $ClubAdresse = $_POST['ClubAdresse'];

    // Appeler la fonction pour ajouter les données
    modifClub($idModif,$ClubAdresse,$ClubNom);
}


