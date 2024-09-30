<?php
require 'blocModel.php';

function connectDB(){
    $host = 'mysql-gallou.alwaysdata.net';
    $user = 'gallou';
    $pwd = 'Bluestorm13.';
    $db = 'gallou_bd_test';

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
    $result = mysqli_query($dbLink, 'SELECT COUNT(*) as count FROM POSTS');
    $row = mysqli_fetch_assoc($result);
    $totalPosts = (int)$row['count'];

    // Calculate the offset
    $offset = ($currentPage - 1) * $postsPerPage;

    // Fetch the posts for the current page
    $query = 'SELECT IdPost, TITRE, LIEU, TEXTE FROM POSTS LIMIT ' . $postsPerPage . ' OFFSET ' . $offset;
    $result = mysqli_query($dbLink, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $idpost = $row['IdPost'];
        $titre = $row['TITRE'];
        $lieu = $row['LIEU'];
        $texte = $row['TEXTE'];

        initBloc($titre, $lieu, $texte, $idpost);
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