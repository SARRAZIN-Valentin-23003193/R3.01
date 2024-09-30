<?php
require '/home/tenrac45/www/modules/blog/models/blocModel.php';

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

function drawBloc($currentPage = 1, $postsPerPage = 5){
    $dbLink = connectDB();

    // Get the total number of posts
    $result = mysqli_query($dbLink, 'SELECT COUNT(*) as count FROM Club');
    $row = mysqli_fetch_assoc($result);
    $totalPosts = (int)$row['count'];

    // Calculate the offset
    $offset = ($currentPage - 1) * $postsPerPage;

    // Fetch the posts for the current page
    $query = 'SELECT Clubid, Nom_C, Adresse_C FROM Club LIMIT ' . $postsPerPage . ' OFFSET ' . $offset;
    $result = mysqli_query($dbLink, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $idClub = $row['Clubid'];
        $nomClub = $row['Nom_C'];
        $adresse = $row['Adresse_C'];

        initBloc($idClub, $nomClub, $adresse);
    }

    // Generate pagination links
    $totalPages = ceil($totalPosts / $postsPerPage);
    for ($i = 1; $i <= $totalPages; $i++) {
        echo '<a href="?page=' . $i . '">' . $i . '</a> ';
    }

    // Close the connection
    mysqli_close($dbLink);
}
?>