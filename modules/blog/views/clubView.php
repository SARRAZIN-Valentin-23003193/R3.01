<?php
function renderClubs($clubs, $totalPages) {
    foreach ($clubs as $club) {
        initClub($club['Clubid'], $club['Nom_C'], $club['Adresse_C']);
    }

    // Generate pagination links
    for ($i = 1; $i <= $totalPages; $i++) {
        echo '<a href="?page=' . $i . '">' . $i . '</a> ';
    }
}
?>