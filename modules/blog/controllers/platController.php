<?php
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

function drawPlat($currentPage = 1, $postsPerPage = 5){
    $dbLink = connectDB();

    $result = mysqli_query($dbLink, 'SELECT COUNT(*) as count FROM Plat');
    $row = mysqli_fetch_assoc($result);
    $totalPosts = (int)$row['count'];

    $offset = ($currentPage - 1) * $postsPerPage;

    $query = 'SELECT Plat.Plat_id, Plat.Nom_P, Sauce.Sauce_id, Sauce.Nom_S, Ingredient.Nom_I
                FROM Plat
                JOIN Sauce ON Plat.Plat_id = Sauce.Plat_id
                JOIN Sauce_Accompagnement ON Sauce.Sauce_id = Sauce_Accompagnement.Sauce_id
                JOIN Ingredient ON Sauce_Accompagnement.Ingredient_id = Ingredient.Ingredient_id
                LIMIT ' . $postsPerPage . ' OFFSET ' . $offset;
    $result = mysqli_query($dbLink, $query);

    $currentPlat = null;
    $currentSauce = null;

    while ($row = mysqli_fetch_assoc($result)) {
        if ($currentPlat !== $row['Plat_id']) {
            if ($currentPlat !== null) {
                echo '</ul></ul>';
            }
            $currentPlat = $row['Plat_id'];
            echo '<h2>' . htmlspecialchars($row['Nom_P']) . '</h2>';
            echo '<ul>';
        }

        if ($currentSauce !== $row['Sauce_id']) {
            if ($currentSauce !== null) {
                echo '</ul>';
            }
            $currentSauce = $row['Sauce_id'];
            echo '<li>' . htmlspecialchars($row['Nom_S']) . '<ul>';
        }

        echo '<li>' . htmlspecialchars($row['Nom_I']) . '</li>';
    }

    if ($currentPlat !== null) {
        echo '</ul></ul>';
    }

    $totalPages = ceil($totalPosts / $postsPerPage);
    for ($i = 1; $i <= $totalPages; $i++) {
        echo '<a href="?page=' . $i . '">' . $i . '</a> ';
    }

    mysqli_close($dbLink);
}
?>