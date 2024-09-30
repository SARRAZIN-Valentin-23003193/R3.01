<?php
// calendrier.php (Vue)

// En-tête de la page
require_once 'HtmlLayout.php';
start_page('Calendrier des Repas');
addHeader();
?>

    <!-- Inclusion des styles FullCalendar -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.4/index.global.min.css" rel="stylesheet" />

    <!-- Conteneur du calendrier -->
    <div id="calendar"></div>

    <!-- Inclusion du script FullCalendar -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.4/index.global.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'fr',
                firstDay: 1,
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: <?php echo json_encode($events); ?>,
                eventContent: function(arg) {
                    return {
                        html: `<b>${arg.event.title}</b><br>${arg.event.extendedProps.description}`
                    };
                }
            });
            calendar.render();
        });
    </script>

<?php
// Pied de page
addFooter();
end_page();
?>