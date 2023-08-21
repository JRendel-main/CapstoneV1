<!-- plugin js -->
<script src="../../assets/libs/moment/moment.min.js"></script>
<script src="../../assets/libs/jquery-ui/jquery-ui.min.js"></script>
<script src="../../assets/libs/fullcalendar/fullcalendar.min.js"></script>

<!-- Calendar init -->
<script>
    $(document).ready(function() {
        // get the list of events to ajax
        var events = [];
        $.ajax({
            url: '../../server/tutor/get-schedule.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                events = data;
                $('#calendar').fullCalendar({
                    // Set the initial view
                    defaultView: 'month',
                    editable: true,
                    droppable: true,
                    selectable: true,
                    selectHelper: true,
                    eventLimit: true,
                    events: events,
                    // when event clicked show the event details to form
                    eventClick: function(event, jsEvent, view) {
                        $('#event-details-form').removeClass('d-none');
                        $('#event-details-form').addClass('d-block');
                        $('#event-title').val(event.title);
                        $('#event-description').val(event.description);
                        $('#event-place').val(event.place);
                        $('#event-date').val(event.date);
                        // include the start time and end time by adding the duration by hour to the start time
                        var startTime = moment(event.start).format('HH:mm');
                        var endTime = moment(event.start).add(event.duration, 'hours').format('HH:mm');
                        $('#event-time').val(startTime + ' - ' + endTime);
                        $('#edit-event-btn').removeClass('d-none');
                        $('#save-event-btn').addClass('d-none');
                        $('#delete-event-btn').addClass('d-none');

                        // when edit button clicked, show the edit form
                        $('#edit-event-btn').click(function() {
                            $('#event-title').prop('disabled', false);
                            $('#event-description').prop('disabled', false);
                            $('#event-place').prop('disabled', false);
                            $('#event-date').prop('disabled', false);
                            $('#event-time').prop('disabled', false);
                            $('#edit-event-btn').addClass('d-none');
                            $('#save-event-btn').removeClass('d-none');
                            $('#delete-event-btn').removeClass('d-none');
                        });

                        // when delete button clicked, delete the event from the database
                        $('#delete-event-btn').click(function() {
                            $.ajax({
                                url: '../../server/tutor/delete-schedule.php',
                                type: 'POST',
                                data: {
                                    id: event.id
                                },
                                dataType: 'json',
                                success: function(response) {
                                    if (response.status === 'success') {
                                        // get teh response and get the message use swal and refresh the calendar and close modal if ok button clicked
                                        swal.fire({
                                            title: 'Success',
                                            text: response.message,
                                            icon: 'success'
                                        }).then(function() {
                                            $('#calendar').fullCalendar('refetchEvents');
                                            $('#event-details-form').removeClass('d-block');
                                            $('#event-details-form').addClass('d-none');
                                        });
                                    } else {
                                        // Handle error, e.g., show an error message
                                        swal.fire({
                                            title: 'Error',
                                            text: response.message,
                                            icon: 'error',
                                            confirmButtonClass: 'btn btn-confirm mt-2'
                                        });
                                    }
                                },
                                error: function(xhr, status, error) {
                                    // Handle AJAX error, e.g., show an error message
                                    swal.fire({
                                        title: 'Error',
                                        text: 'There was an error deleting the schedule',
                                        icon: 'error',
                                        confirmButtonClass: 'btn btn-confirm mt-2'
                                    });
                                }
                            });
                        });

                        // when save button clicked, save the changes to the database
                        $('#save-event-btn').click(function() {
                            var topic = $('#event-title').val();
                            var description = $('#event-description').val();
                            var place = $('#event-place').val();
                            var date = $('#event-date').val();
                            var time = $('#event-time').val();
                            var duration = time.split('-')[1].trim() - time.split('-')[0].trim();
                            var eventData = {
                                id: event.id,
                                title: topic,
                                description: description,
                                place: place,
                                date: date,
                                duration: duration
                            };
                            $.ajax({
                                url: '../../server/tutor/edit-schedule.php',
                                type: 'POST',
                                data: eventData,
                                dataType: 'json',
                                success: function(response) {
                                    if (response.status === 'success') {
                                        // get teh response and get the message use swal and refresh the calendar and close modal if ok button clicked
                                        swal.fire({
                                            title: 'Success',
                                            text: response.message,
                                            icon: 'success'
                                        }).then(function() {
                                            $('#calendar').fullCalendar('refetchEvents');
                                            $('#event-details-form').removeClass('d-block');
                                            $('#event-details-form').addClass('d-none');
                                        });
                                    } else {
                                        // Handle error, e.g., show an error message
                                        swal.fire({
                                            title: 'Error',
                                            text: response.message,
                                            icon: 'error',
                                            confirmButtonClass: 'btn btn-confirm mt-2'
                                        });
                                    }
                                },
                                error: function(xhr, status, error) {
                                    // Handle AJAX error, e.g., show an error message
                                    swal.fire({
                                        title: 'Error',
                                        text: 'There was an error editing the schedule',
                                        icon: 'error',
                                        confirmButtonClass: 'btn btn-confirm mt-2'
                                    });
                                }
                            });
                        });
                    },
                    // when empty space clicked, show the add event form
                    
                });

                function checkConflicts(event) {
                    return false;
                }
            },
            error: function(xhr, status, error) {
                // replace the calendar with text indicating there was no schedule yet start adding by clicking the button
                $('#calendar').html('<h5 class="text-center">You have no schedule yet. Start adding by clicking the button below.</h5>');
                // add animateio
            }
        });
        $("#add-event-btn").click(function() {
            var topic = $("input[name='topic']").val();
            var description = $("textarea[name='description']").val();
            var place = $("input[name='place']").val();
            var start = $("input[name='start']").val();
            var duration = $("input[name='duration']").val();
            var date = $("input[name='date']").val();

            // Create an object with the schedule data
            var eventData = {
                title: topic,
                description: description,
                place: place,
                start: start,
                duration: duration,
                date: date
            };

            // Use AJAX to send the schedule data to your PHP server
            $.ajax({
                url: "../../server/tutor/add-schedule.php",
                type: "POST",
                data: eventData,
                dataType: "json",
                success: function(response) {
                    if (response.status === "success") {
                        // get teh response and get the message use swal and refresh the calendar and close modal if ok button clicked
                        swal.fire({
                            title: "Success",
                            text: response.message,
                            icon: "success"
                        }).then(function() {
                            // refresh the page
                            location.reload();
                        });
                    } else {
                        // Handle error, e.g., show an error message
                        swal.fire({
                            title: "Error",
                            text: response.message,
                            icon: "error",
                            confirmButtonClass: "btn btn-confirm mt-2"
                        });
                    }
                },
                error: function(xhr, status, error) {
                    // Handle AJAX error, e.g., show an error message
                    swal.fire({
                        title: "Error",
                        text: "There was an error adding the schedule",
                        icon: "error",
                        confirmButtonClass: "btn btn-confirm mt-2"
                    });
                }
            });
        });

        // add functionality to save button to save the changes to the database

    });
</script>