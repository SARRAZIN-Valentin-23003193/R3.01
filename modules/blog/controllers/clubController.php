<?php
require 'modules/blog/models/clubModel.php';
require 'modules/blog/models/connectDataBaseModel.php';

function drawClub($currentPage = 1, $postsPerPage = 5){
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

        initClub($idClub, $nomClub, $adresse);
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