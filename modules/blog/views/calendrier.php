<?php
// Appel du Layout
require_once 'HtmlLayout.php';
start_page('Calendrier des Repas'); // Démarre la page avec le titre
addHeader(); // ajoute l'en-tête
?>

<!-- APPEL FullCalendar depuis un CDN -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.4/index.global.min.css" rel="stylesheet" />

<!-- Appel de mon css perso pour le calendrier -->
<link href="../../../_assets/styles/Calendrier.css" rel="stylesheet" />

<!-- Conteneur du calendrier -->
<div id="calendar"></div>

<!-- script pour FullCalendar-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.4/index.global.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Récupère le DOM qui va contenir le calendrier
        var calendarEl = document.getElementById('calendar');

        // Initialisation du calendrier
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth', // affichage initial en mensuel
            locale: 'fr', // mettre la langue en français
            firstDay: 1, // Commence la semaine par lundi
            showNonCurrentDates: false, // Pour ne pas afficher les dates du mois précédent ou du mois suivant
            fixedWeekCount: false, // gère la hauteur du calendrier selon le nombre de semaines dans le mois actuelle
            headerToolbar: { // Configuration de la barre d'outils en haut du calendrier
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay' // Boutons à droite pour changer de le calendrier en mois / semaine / jour
            },
            buttonText: { // Change le texte des boutons en français
                today: 'Aujourd\'hui',
                month: 'Mois',
                week: 'Semaine',
                day: 'Jour',
                list: 'Liste'
            },
            events: <?php echo json_encode($events); ?>, // Mettre les événements récupérés du contrôleur en JSON
            eventContent: function(arg) {
                return {
                    html: `<b>${arg.event.title}</b><br>${arg.event.extendedProps.description}` // Gère l'affichage du contenu de l'événement dans le calendrier
                };
            }
        });
        calendar.render(); // Affiche le calendrier dans le DOM
    });
</script>

<?php
// ajoute le pied de page
addFooter();
end_page(); // Fonction pour terminer la page
?>
