<?php
require_once 'modules/blog/views/PlatLayout.php';
function renderPlat(array $plats, int $totalPages) {
    foreach ($plats as $plat) {
        initPlat($plat['Plat_id'], $plat['Nom_P'], $plat['Nom_S'], $plat['Nom_I'], $plat['Nom_Accomp']);
    }

    // Generate pagination links
    for ($i = 1; $i <= $totalPages; $i++) {
        echo '<a href="?action=plats&page=' . $i . '">' . $i . '</a> ';
    }
}
?>