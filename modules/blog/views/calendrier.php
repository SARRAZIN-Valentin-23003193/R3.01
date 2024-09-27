<?php
require "HtmlLayout.php";
start_page("L'ordre des tenracs");
addHeader();
?>

<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css' rel='stylesheet' />
<link rel="stylesheet" type="text/css" href="">
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/locales/fr.js'></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'fr', // Ajoutez cette ligne pour définir le calendrier en français
            events: [
                <?php
                // Paramètres de connexion à la base de données
                $pwd = "projetwebtenrac";
                $user = "tenrac45";
                $host = "mysql-tenrac45.alwaysdata.net";
                $db = "tenrac45_1";

                // Connexion à la base de données
                $dbLink = mysqli_connect($host, $user, $pwd, $db);

                // Vérification de la connexion
                if (!$dbLink) {
                    die('Erreur de connexion : ' . mysqli_connect_error());
                }

                // Requête pour récupérer les repas
                $query = 'SELECT Repas.Repas_id, Repas.Adresse_Partenaire, Repas.Date_R 
                  FROM Repas
                  INNER JOIN Date_R ON Repas.Date_R = Date_R.Date_R WHERE Date_R.Date_R <= (SYSDATE() +1)';

                // Exécute la requête
                $dbResult = mysqli_query($dbLink, $query);

                // Vérifie si la requête a échoué
                if (!$dbResult) {
                    die('Erreur lors de la récupération des repas : ' . mysqli_error($dbLink));
                }

                // Parcourt les résultats de la requête
                $events = [];
                while ($dbRow = mysqli_fetch_assoc($dbResult)) {
                    echo "{\n";
                    echo "  id: '" . $dbRow['Repas_id'] . "',\n";
                    echo "  title: 'Repas à " . $dbRow['Adresse_Partenaire'] . "',\n";
                    echo "  start: '" . $dbRow['Date_R'] . "'\n";
                    echo "},\n";
                }

                // Fermeture de la connexion
                mysqli_close($dbLink);
                ?>
            ]
        });

        calendar.render();
    });
</script>

<body>
<div id='calendar'></div>
</body>
</html>
