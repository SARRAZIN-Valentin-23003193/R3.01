<?php
require_once 'modules/blog/views/TenracLayout.php';
    function renderTenracs(array $tenracs, int $totalPages) {
        foreach ($tenracs as $tenracs) {
            initLigne($tenracs['Nom_T'], $tenracs['NumTel'], $tenracs['Courriel'], $tenracs['Adresse_T'], $tenracs['Grade'], $tenracs['Titre'], $tenracs['Rang'], $tenracs['Dignite']);
        }

    // Generate pagination links
        for ($i = 1; $i <= $totalPages; $i++) {
            echo '<a href="?page=' . $i . '">' . $i . '</a> ';
        }
    }
?>
