<?php

class platsModel{
    public function connectDB(){
        $pwd = "projetwebtenrac";
        $user = "tenrac45";
        $host = "mysql-tenrac45.alwaysdata.net";
        $db = "tenrac45_1";

        // Verifie la connection
        $dbLink = mysqli_connect($host, $user, $pwd)
        or die('Erreur de connexion au serveur : ' . mysqli_connect_error());

        // Choix de la base
        mysqli_select_db($dbLink, $db)
        or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));
        return $dbLink;
    }

//affiche les plats avec leur sauce, accompagnements et ingredients
    public function drawPlat($currentPage = 1, $postsPerPage = 5) {
        $dbLink = connectDB();
        //nombre total de plats
        $result = mysqli_query($dbLink, 'SELECT COUNT(*) as count FROM Plat');
        $row = mysqli_fetch_assoc($result);
        $totalPosts = (int)$row['count'];

        $offset = ($currentPage - 1) * $postsPerPage;
        //récupération des plats, sauces et ingrédients
        $query = 'SELECT Plat.Nom_P, Sauce_Accompagnement.Nom_S, Ingredient.Nom_I, Accompagnement.Nom_Accomp
                FROM Plat
                JOIN Accompagne ON Plat.Plat_id = Accompagne.Plat_id
                JOIN Accompagnement ON Accompagne.Accomp_id = Accompagnement.Accomp_id
                JOIN Sauce ON Plat.Plat_id = Sauce.Plat_id
                JOIN Sauce_Accompagnement ON Sauce.Sauce_id = Sauce_Accompagnement.Sauce_id
                JOIN Ingredient ON Sauce_Accompagnement.Ingredient_id = Ingredient.Ingredient_id
                LIMIT ' . $postsPerPage . ' OFFSET ' . $offset;
        $result = mysqli_query($dbLink, $query);

        $currentPlat = null;
        $currentSauce = null;
        $currentAccomp = null;
        //affiche les plats avec sauces, ingrédients et accompagnements
        while ($row = mysqli_fetch_assoc($result)) {
            if ($currentPlat != $row['Nom_P']) {
                $currentPlat = $row['Nom_P'];
                echo '<h2>' . htmlspecialchars($row['Nom_P']) . '</h2>';

            }

            if ($currentSauce !== $row['Nom_S']) {

                $currentSauce = $row['Nom_S'];
                if ($row['Nom_S']) {
                    echo '<li>Sauce: ' . htmlspecialchars($row['Nom_S']) . '</li>';
                } else {
                    echo '<li>Sauce: aucune</li>';
                }
            }

            if ($row['Nom_I']) {
                echo '<li>Ingredients: ' . htmlspecialchars($row['Nom_I']) . '</li>';
            }

            if ($currentAccomp !== $row['Nom_Accomp']) {

                $currentAccomp = $row['Nom_Accomp'];
                if ($row['Nom_Accomp']) {
                    echo '<li>Accompagnement: ' . htmlspecialchars($row['Nom_Accomp']) . '</li>';
                } else {
                    echo '<li>Accompagnement: aucun</li>';
                }
            }
        }


        $totalPages = ceil($totalPosts / $postsPerPage);
        for ($i = 1; $i <= $totalPages; $i++) {
            echo '<a href="?page=' . $i . '">' . $i . '</a> ';
        }

        mysqli_close($dbLink);
    }


}


