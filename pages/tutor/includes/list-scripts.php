<!-- plugin js -->
<script src="../../assets/libs/moment/moment.min.js"></script>
<script src="../../assets/libs/jquery-ui/jquery-ui.min.js"></script>
<script src="../../assets/libs/fullcalendar/fullcalendar.min.js"></script>

<!-- Calendar init -->
<script>
    $(document).ready(function() {
        $('#calendar').fullCalendar({
            // Set the initial view
            defaultView: 'month',
            editable: true,
            droppable: true,
            selectable: true,
            selectHelper: true,
            eventLimit: true,
            eventDrop: function(event) {
                if (!checkConflicts(event)) {
                    updateEvent(event);
                    $('#calendar').fullCalendar('refetchEvents');
                }
            },
            eventResize: function(event) {
                if (!checkConflicts(event)) {
                    updateEvent(event);
                    $('#calendar').fullCalendar('refetchEvents');
                }
            },
            eventClick: function(event) {
                // edit the event


            },
            dateClick: function(info) {
                console.log(date);
                alert('Clicked on: ' + info.dateStr);
                alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
                alert('Current view: ' + info.view.type);
            },
            // add dummy event
            events: [{
                title: 'All Day Event',
                start: new Date(2023, 08, 1),
                backgroundColor: '#1abc9c', //primary
                borderColor: '#1abc9c' //primary
            }],
        });

        function checkConflicts(event) {
            // Implement your conflict checking logic here
        }

        function updateEvent(event) {
            // Implement your event updating logic here
        }
    });
</script>