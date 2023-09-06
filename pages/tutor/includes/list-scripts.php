<!-- plugin js -->
<script src="../../assets/libs/moment/moment.min.js"></script>
<script src="../../assets/libs/jquery-ui/jquery-ui.min.js"></script>
<script src="../../assets/libs/fullcalendar/fullcalendar.min.js"></script>

<!-- Calendar init -->
<script>
    $(document).ready(function() {
        // hide f2f and online div
        $('#f2f').hide();
        $('#online').hide();

        // check the mode of learning select if online or f2f
        $('#mode').change(function() {
            if ($(this).val() === 'online') {
                $('#f2f').hide();
                $('#online').show();
            } else {
                $('#f2f').show();
                $('#online').hide();
            }
        });

        // if user click rules on picking place a href
        $('#place-rules').click(function() {
            Swal.fire({
                title: 'Place Selection Rules',
                html: `
            <p><strong>1. Choose a Suitable Location:</strong> Select a place that is comfortable and free from distractions.</p>
            <p><strong>2. Respect Shared Spaces:</strong> If you're in a shared environment, be considerate of others.</p>
            <p><strong>3. Ensure Good Lighting:</strong> Make sure you have adequate lighting for your tasks.</p>
            <p><strong>4. Stay Organized:</strong> Keep your workspace tidy and organized.</p>
            <p><strong>5. Minimize Noise:</strong> Reduce background noise that may disturb your concentration.</p>
        `,
                icon: 'info',
                confirmButtonText: 'Got it!',
                confirmButtonColor: '#007BFF',
                customClass: {
                    title: 'swal-title',
                },
            });
        });
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
                        schedid = event.id;
                        console.log(event.id);
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
                    },
                    dayClick: function(date, jsEvent, view) {
                        $('#add-category').modal('show'); // Open the modal
                        $('input[name="date"]').val(date.format('YYYY-MM-DD')); // Set the date value
                        $('input[name="topic"]').focus(); // Set focus on the first input field
                    },
                    eventClick: function(event) {
                        // open edit schedule modal
                        $('#edit-schedule-modal').modal('show');
                        // hide online and f2f div

                        // set the values of the form
                        $('#edit-schedule-modal input[name="sched_id"]').val(event.id);
                        $('#edit-schedule-modal input[name="edit-topic"]').val(event.title);
                        $('#edit-schedule-modal textarea[name="edit-description"]').val(event.description);
                        $('#edit-schedule-modal input[name="edit-date"]').val(event.date);

                        var edit_mode = event.mode;
                        var startTime = moment(event.start).format('HH:mm');
                        console.log(event.date);

                        if (edit_mode == 0) {
                            // hide the online div
                            $('#edit-online').hide();
                            // show the f2f div
                            $('#edit-f2f').show();

                            // get the start time on start


                            // set the values of the f2f div
                            $('#edit-schedule-modal select[name="edit-mode"]').val("f2f");
                            $('#edit-schedule-modal input[name="edit-max"]').val(event.max);
                            $('#edit-schedule-modal input[name="edit-place"]').val(event.place);
                            $('#edit-schedule-modal input[name="edit-start-f2f"]').val(startTime);
                            $('#edit-schedule-modal input[name="edit-duration-f2f"]').val(event.duration);

                        } else if (edit_mode == 1) {
                            // hide the f2f div
                            $('#edit-f2f').hide();
                            // show the online div
                            $('#edit-online').show();

                            // set the values of the online div
                            $('#edit-schedule-modal select[name="edit-mode"]').val("online");
                            $('#edit-schedule-modal input[name="edit-max"]').val(event.max);
                            $('#edit-schedule-modal select[name="edit-platform"]').val(event.platform);
                            $('#edit-schedule-modal input[name="edit-link"]').val(event.link);
                            $('#edit-schedule-modal input[name="edit-start-online"]').val(startTime);
                            $('#edit-schedule-modal input[name="edit-duration-online"]').val(event.duration);
                        }

                    }
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

        // get the values of the form and save it to the database
        $('#edit-event-btn').click(function() {
            // get the values of the form
            var sched_id = $('#edit-schedule-modal input[name="sched_id"]').val();
            var topic = $('#edit-schedule-modal input[name="edit-topic"]').val();
            var description = $('#edit-schedule-modal textarea[name="edit-description"]').val();
            var date = $('#edit-schedule-modal input[name="edit-date"]').val();
            var mode = $('#edit-schedule-modal select[name="edit-mode"]').val();
            var max = $('#edit-schedule-modal input[name="edit-max"]').val();

            if (mode == 'online') {
                var platform = $('#edit-schedule-modal select[name="edit-platform"]').val();
                var link = $('#edit-schedule-modal input[name="edit-link"]').val();
                var start = $('#edit-schedule-modal input[name="edit-start-online"]').val();
                var duration = $('#edit-schedule-modal input[name="edit-duration-online"]').val();
                var place = '';
            } else {
                var place = $('#edit-schedule-modal input[name="edit-place"]').val();
                var start = $('#edit-schedule-modal input[name="edit-start-f2f"]').val();
                var duration = $('#edit-schedule-modal input[name="edit-duration-f2f"]').val();
                var platform = '';
                var link = '';
            }

            // add swal confirmation first
            swal.fire({
                title: 'Are you sure?',
                text: 'You are about to edit this schedule',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-confirm mt-2',
                cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
                confirmButtonText: 'Yes, edit it!'
            }).then(function(result) {
                if (result.value) {
                    // if ok button clicked, send the data to the database
                    var eventData = {
                        sched_id: sched_id,
                        title: topic,
                        description: description,
                        place: place,
                        mode: mode,
                        platform: platform,
                        link: link,
                        date: date,
                        duration: duration,
                        start: start,
                        max_tutee: max
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
                }
            });
        });

        // when delete button clicked, delete the event from the database
        $('#delete-event-btn').click(function() {
            console.log(schedid);
            $.ajax({
                url: '../../server/tutor/delete-schedule.php',
                type: 'POST',
                data: {
                    id: schedid
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        // get the response and get the message, use swal, refresh the calendar, and close the modal
                        swal.fire({
                            title: 'Success',
                            text: response.message,
                            icon: 'success'
                        }).then(function() {
                            // Refresh the calendar
                            $('#calendar').fullCalendar('refetchEvents');
                            // Close the modal if open
                            $('#event-details-form').modal('hide');
                        });
                    } else {
                        // Handle error, show an error message
                        swal.fire({
                            title: 'Error',
                            text: response.message,
                            icon: 'error'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    // Handle AJAX error, show an error message
                    swal.fire({
                        title: 'Error',
                        text: 'There was an error deleting the schedule',
                        icon: 'error'
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
                id: schedid,
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
        $("#add-event-btn").click(function() {
            var topic = $("input[name='topic']").val();
            var description = $("textarea[name='description']").val();
            var date = $("input[name='date']").val();
            // get the value on select mode
            var mode = $('#mode').val();
            var max = $("input[name='max']").val();

            // add validation for the form
            switch (true) {
                case topic === '':
                    validationMsg('Topic');
                    return false;
                case description === '':
                    validationMsg('Description');
                    return false;
                case date === '':
                    validationMsg('Date');
                    return false;
                case mode === 'online' && $("input[name='online']").val() === '':
                    validationMsg('Online Link');
                    return false;
                case mode === 'f2f' && $("input[name='f2f']").val() === '':
                    validationMsg('Place');
                    return false;
                case max === '':
                    validationMsg('Max Students');
                    return false;
            }

            if (mode === 'online') {
                var platform = $("select[name='platform']").val();
                var link = $("input[name='link']").val();
                var start = $("input[name='start-online']").val();
                var duration = $("input[name='duration-online']").val();
                var place = '';

                switch (true) {
                    case platform === '':
                        validationMsg('Platform');
                        return false;
                    case link === '':
                        validationMsg('Link');
                        return false;
                    case start === '':
                        validationMsg('Start Time');
                        return false;
                    case duration === '':
                        validationMsg('Duration');
                        return false;
                }
            } else {
                var place = $("input[name='place']").val();
                var start = $("input[name='start-f2f']").val();
                var duration = $("input[name='duration-f2f']").val();
                var platform = '';
                var link = '';

                switch (true) {
                    case place === '':
                        validationMsg('Place');
                        return false;
                    case start === '':
                        validationMsg('Start Time');
                        return false;
                    case duration === '':
                        validationMsg('Duration');
                        return false;
                }
            }
            // var topic = $("input[name='topic']").val();
            // var description = $("textarea[name='description']").val();
            // var place = $("input[name='place']").val();
            // var start = $("input[name='start']").val();
            // var duration = $("input[name='duration']").val();
            // var date = $("input[name='date']").val();

            // Create an object with the schedule data
            var eventData = {
                title: topic,
                description: description,
                place: place,
                mode: mode,
                platform: platform,
                link: link,
                date: date,
                duration: duration,
                start: start,
                max_tutee: max
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
    $(document).keyup(function(e) {
        if (e.key === "Escape" && $('#add-category').hasClass('show')) {
            $('#add-category').modal('hide');
        }
    });
    // validation message
    function validationMsg(topic) {
        // use swal
        swal.fire({
            title: 'Error',
            text: topic + ' is required',
            icon: 'error',
            confirmButtonClass: 'btn btn-confirm mt-2'
        });
    };
</script>