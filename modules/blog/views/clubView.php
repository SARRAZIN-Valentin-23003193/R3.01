<?php
require_once 'modules/blog/views/clubLayout.php';
function renderClubs(array $clubs, int $totalPages) {
    foreach ($clubs as $club) {
        initClub($club['Clubid'], $club['Nom_C'], $club['Adresse_C']);
    }

    // Generate pagination links
    for ($i = 1; $i <= $totalPages; $i++) {
        echo '<a href="?action=clubs&page=' . $i . '">' . $i . '</a> ';
    }
}
?>