<?php

function ajouterClub($nom, $lieux) {
    $host = "mysql-tenrac45.alwaysdata.net";
    $username = "tenrac45";
    $password = "projetwebtenrac";
    $dbname = "tenrac45_1";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO Club (Nom_C, Adresse_C, Codepere) VALUES (:nom, :lieux, 1)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':lieux', $lieux);

        // Exécuter la requête
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }



    header('location:https://tenrac45.alwaysdata.net/modules/blog/views/structure.php/');
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $nom = $_POST['nomclub'];
    $lieux = $_POST['adressclub'];


    // Appeler la fonction pour ajouter les données
    ajouterClub($nom, $lieux);
}

