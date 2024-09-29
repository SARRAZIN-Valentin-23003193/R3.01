<?php
function ajouterTenrac($nom, $num, $mail, $adresse) {
    // Connexion à la base de données (adapter les valeurs de connexion)
    $host = 'mysql-sarrazin.alwaysdata.net';
    $dbname = 'sarrazin_database';
    $username = 'sarrazin';
    $password = 'Super_Pershing';

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Préparation de la requête d'insertion
        $sql = "INSERT INTO tenrac (nom, num, mail, adresse) VALUES (:nom, :num, :mail, :adresse)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':num', $num);
        $stmt->bindParam(':mail', $mail);
        $stmt->bindParam(':adresse', $adresse);

        // Exécuter la requête
        $stmt->execute();
        // echo "Pizza ajoutée avec succès !";
    } catch(PDOException $e) {
        // echo "Erreur : " . $e->getMessage();
    }
    header('location:http://sarrazin.alwaysdata.net/');
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $nom = $_POST['nom'];
    $num = $_POST['num'];
    $mail = $_POST['mail'];
    $adresse = $_POST['adresse'];

    // Appeler la fonction pour ajouter les données
    ajouterTenrac($nom, $num, $mail, $adresse);
}
