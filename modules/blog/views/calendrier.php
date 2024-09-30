<?php
require_once 'HtmlLayout.php';
// Démarrer la page
start_page('Calendrier des Repas');

// Ajouter l'en-tête
addHeader();

// Préparation des événements pour FullCalendar
$events = [];
if (!empty($repas)) {
    foreach ($repas as $repas_item) {
        $events[] = [
            'title' => $repas_item['Nom_P'],
            'start' => $repas_item['Date_R'],
            'allDay' => true
        ];
    }
}

require_once '../controllers/Controller_Calendrier.php'

?>

<!-- FullCalendar CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.4/index.global.min.css" rel="stylesheet" />

<div id="calendar"></div>

<!-- FullCalendar JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.4/index.global.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');

        // Initialisation du calendrier
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'fr', // Mettre le calendrier en français
            firstDay: 1, // Commencer le calendrier le lundi
            showNonCurrentDates: false, // Ne pas afficher les jours en dehors du mois actuel
            fixedWeekCount: false, // Ne pas afficher plus de lignes que nécessaire
            buttonText: {
                today: 'Aujourd\'hui', // Changer "today" en "Aujourd'hui"
                month: 'Mois',
                week: 'Semaine',
                day: 'Jour',
                list: 'Liste'
            },
            events: <?php echo json_encode($events); ?>, // Ajout des événements
        });

        // Affichage du calendrier
        calendar.render();
    });
</script>

<?php
// Ajouter le pied de page
addFooter();

// Terminer la page
end_page();
?>
