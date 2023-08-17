<!-- plugin js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@6.1.8/index.global.min.js'></script>
<script>
    $(document).ready(function() {
    // Initialize FullCalendar
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        selectable: true,
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        events: [
            // You can add your events here
            {
                id: '1',
                title: 'New Theme Release',
                start: '2023-08-15',
                className: 'bg-success'
            },
            {
                id: '2',
                title: 'My Event',
                start: '2023-08-20',
                className: 'bg-info'
            },
            {
                id: '3',
                title: 'Meet manager',
                start: '2023-08-25',
                className: 'bg-warning'
            }
        ],
        // Add event click handler
        eventClick: function(info) {
            $('#event-modal').modal('show');
            // Populate the modal with event data
            $('#event-modal .modal-body').html(`
                <form id="edit-event-form">
                    <div class="form-group">
                        <label class="control-label">Topic</label>
                        <input class="form-control" type="text" name="topic" value="${info.event.title}"/>
                    </div>
                    <!-- ... (add more form fields) ... -->
                </form>
            `);
        }
    });

    calendar.render();

    // Save event handler
    $('.save-event').on('click', function() {
        var eventData = $('#edit-event-form').serializeArray();
        calendar.addEvent({
            title: eventData[0].value,
            start: eventData[1].value,
            // Add more event properties
        });
        $('#event-modal').modal('hide');
    });
});

</script>