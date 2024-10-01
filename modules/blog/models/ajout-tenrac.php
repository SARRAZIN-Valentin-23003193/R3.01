<?php
function ajouterTenrac($nom, $num, $mail, $adresse, $grade, $titre, $rang, $dignite) {
    // Connexion à la base de données (adapter les valeurs de connexion)
    $host = 'mysql-tenrac45.alwaysdata.net';
    $dbname = 'tenrac45_1';
    $username = 'tenrac45';
    $password = 'projetwebtenrac';

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Préparation de la requête d'insertion
        $sql = "INSERT INTO Tenracs (Nom_T, NumTel, Courriel, Adresse_T, Grade, Titre, Rang, Dignite) VALUES (:nom, :num, :mail, :adresse, :grade, :titre, :rang, :dignite)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':num', $num);
        $stmt->bindParam(':mail', $mail);
        $stmt->bindParam(':adresse', $adresse);
        $stmt->bindParam(':grade', $grade);
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':rang', $rang);
        $stmt->bindParam(':dignite', $dignite);

        // Exécuter la requête
        $stmt->execute();
        // echo "Pizza ajoutée avec succès !";
    } catch(PDOException $e) {
        // echo "Erreur : " . $e->getMessage();
    }
    header('location:https://tenrac45.alwaysdata.net/modules/blog/views/tenrac.php');
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $nom = $_POST['nom'];
    $num = $_POST['num'];
    $mail = $_POST['mail'];
    $adresse = $_POST['adresse'];
    $grade = $_POST['grade'];
    $titre = $_POST['titre'];
    $rang = $_POST['rang'];
    $dignite = $_POST['dignite'];

    // Appeler la fonction pour ajouter les données
    ajouterTenrac($nom, $num, $mail, $adresse, $grade, $titre, $rang, $dignite);
}
