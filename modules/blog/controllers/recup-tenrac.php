<?php
require '/home/tenrac45/www/modules/blog/models/tenracModel.php';
require '../models/connectDataBaseModel.php';
function insertLigne($currentPage = 1, $tenracsPerPage = 10){
    $dbLink = connectDB();

    // Get the total number of posts
    $result = mysqli_query($dbLink, 'SELECT COUNT(*) as count FROM Tenracs');
    $row = mysqli_fetch_assoc($result);
    $totalPosts = (int)$row['count'];

    // Calculate the offset
    $offset = ($currentPage - 1) * $tenracsPerPage;

    // Fetch the posts for the current page
    $query = 'SELECT Nom_T, NumTel, Courriel, Adresse_T, Grade, Titre, Rang, Dignite FROM Tenracs LIMIT ' . $tenracsPerPage . ' OFFSET ' . $offset;
    $result = mysqli_query($dbLink, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $nom = $row['Nom_T'];
        $num = $row['NumTel'];
        $mail = $row['Courriel'];
        $adresse = $row['Adresse_T'];
        $grade = $row['Grade'];
        $titre = $row['Titre'];
        $rang = $row['Rang'];
        $dignite = $row['Dignite'];

        initLigne($nom, $num, $mail, $adresse, $grade, $titre, $rang, $dignite);
    }

    // Generate pagination links
    $totalPages = ceil($totalPosts / $tenracsPerPage);
    for ($i = 1; $i <= $totalPages; $i++) {
        echo '<a href="?page=' . $i . '">' . $i . '</a> ';
    }

    // Close the connection
    mysqli_close($dbLink);
}