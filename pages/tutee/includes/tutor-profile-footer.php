<!-- plugin js -->
<script src="../../assets/libs/moment/moment.min.js"></script>
<script src="../../assets/libs/jquery-ui/jquery-ui.min.js"></script>
<script src="../../assets/libs/fullcalendar/fullcalendar.min.js"></script>
<script>
    $(document).ready(function() {
        function toCamelCase(input) {
            return input.replace(/\w+/g, function(match) {
                return match.charAt(0).toUpperCase() + match.slice(1).toLowerCase();
            });
        }
        // get the peer_id from link
        var peer_id = <?php echo $peer_id; ?>;
        console.log(peer_id);

        // get the tutor profile use ajax
        $.ajax({
            url: '../../server/tutee/get-tutorprofile.php',
            type: 'POST',
            data: {
                peer_id: peer_id
            },
            success: function(response) {
                var data = JSON.parse(response);
                console.log(data);

                var sched_id = data.schedules.sched_id;
                var tutorname = data.tutor.firstname + " " + data.tutor.lastname;
                var tutorbio = data.tutor.bio;
                var tutoraboutme = data.tutor.about_me;
                var tutorcontactnum = data.tutor.contactnum;
                var tutorcourse = data.tutor.course;
                var tutoryear = data.tutor.year;
                var tutoremail = data.tutor.email;
                var peer_id = data.tutor.peer_id;
                var tutorrating = data.tutor.rating;

                $('#tutor-name').html(tutorname);
                $('#tutor-department').html(tutorcourse);
                $('#tutor-about').html(tutoraboutme);
                $('#fullname').html('<strong>Full Name :</strong> <span class="ml-2">' + tutorname);
                $('#contactnum').html('<strong>Contact Number :</strong> <span class="ml-2">' + tutorcontactnum);
                $('#email').html('<strong>Email :</strong> <span class="ml-2">' + tutoremail);

                // check if schedules array is empty 
                if (data.schedules.length == 0) {} else {
                    var schedules = [];
                    // loop through the schedules array
                    for (var i = 0; i < data.schedules.length; i++) {
                        // store the schedule in a variable
                        var schedule = data.schedules[i];

                        // Format the start and end dates 
                        var start = moment(schedule.date + ' ' + schedule.start).format('YYYY-MM-DD HH:mm:ss');
                        var end = moment(schedule.date + ' ' + schedule.end).format('YYYY-MM-DD HH:mm:ss');

                        schedules.push({
                            sched_id: schedule.sched_id,
                            tutor_id: schedule.peer_id,
                            date: schedule.date,
                            title: schedule.title,
                            description: schedule.description,
                            start: start,
                            end: end,
                            scheduleid: schedule.sched_id,
                            mode: schedule.mode,
                            max_tutee: schedule.max_tutee
                        });
                        console.log(schedules);
                    }
                    // hide the no schedule message
                    $('#no-sched-message').hide();
                    // open the fullcalendar
                    $('#calendar').fullCalendar({
                        responsive: true,
                        navLinks: true, // can click day/week names to navigate views
                        editable: true,
                        eventLimit: true, // allow "more" link when too many events
                        events: schedules,
                        eventClick: function(event) {
                            // open a modal
                            $('#schedule-modal').modal('show');
                            var sched_id = event.scheduleid;
                            var title = event.title;
                            var description = event.description;
                            var start = event.start;
                            var end = event.end;
                            var date = event.date;
                            var start = moment(start).format('hh:mm A');
                            var end = moment(end).format('hh:mm A');
                            var date = moment(date).format('MMMM DD, YYYY');
                            var tutor_id = event.peer_id;
                            console.log(event.tutor_id);
                            $('#schedule-title').html(title);
                            $('#schedule-description').html(description);
                            $('#schedule-date').html(date);
                            $('#schedule-time').html(start + '-' + end);
                            if (event.mode == 0) {
                                $('#schedule-mode').html('Face to Face');
                            } else {
                                $('#schedule-mode').html('Online Tutoring');
                            }
                            $('#schedule-capacity').html(event.max_tutee + ' tutee(s)');

                            // for button, check if the schedule is already requested, full based on max tutee and if the schedule is already past
                            $.ajax({
                                url: '../../server/tutee/check-schedule.php',
                                type: 'POST',
                                data: {
                                    sched_id: event.sched_id,
                                    peer_id: peer_id
                                },
                                success: function(response) {
                                    var data = JSON.parse(response);
                                    if (data.success) {
                                        var status = data.status;
                                        console.log(status);
                                        if (status == 0) {
                                            // schedule is not yet requested
                                            $('#request-schedule').show();
                                            $('#cancel-request').hide();
                                            $('#schedule-full').hide();
                                            $('#schedule-past').hide();
                                            $('#schedule-enrolled').hide();
                                            $('#request-sent').hide();
                                            $('#request-cancelled').hide();
                                            $('#request-schedule').html('Enroll ' + data.slot);
                                        } else if (status == 1) {
                                            // schedule is already requested
                                            $('#request-schedule').hide();
                                            $('#cancel-request').show();
                                            $('#schedule-full').hide();
                                            $('#schedule-past').hide();
                                            $('#schedule-enrolled').hide();
                                            $('#request-cancelled').hide();
                                        } else if (status == 2) {
                                            // schedule is already full
                                            $('#request-schedule').hide();
                                            $('#cancel-request').hide();
                                            $('#schedule-full').show();
                                            $('#schedule-past').hide();
                                            $('#schedule-enrolled').hide();
                                            $('#request-sent').hide();
                                            $('#request-cancelled').hide();
                                        } else if (status == 3) {
                                            // schedule is already past
                                            $('#request-schedule').hide();
                                            $('#cancel-request').hide();
                                            $('#schedule-full').hide();
                                            $('#schedule-past').show();
                                            $('#schedule-enrolled').hide();
                                            $('#request-sent').hide();
                                            $('#request-cancelled').hide();
                                        } else if (status == 4) {
                                            // already enrolled
                                            $('#request-schedule').hide();
                                            $('#schedule-full').hide();
                                            $('#schedule-past').hide();
                                            $('#schedule-enrolled').show();
                                            $('#request-sent').hide();
                                            $('#request-cancelled').hide();
                                        } else if (status == 5) {
                                            // request cancelled
                                            $('#request-schedule').hide();
                                            $('#schedule-full').hide();
                                            $('#schedule-past').hide();
                                            $('#schedule-enrolled').hide();
                                            $('#request-sent').hide();
                                            $('#cancel-request').hide();
                                        } else {
                                            // hide all buttons
                                            $('#request-schedule').hide();
                                            $('#cancel-request').hide();
                                            $('#schedule-full').hide();
                                            $('#schedule-past').hide();
                                            $('#schedule-enrolled').hide();
                                            $('#request-cancelled').hide();
                                        }
                                        // if the date is on past add done button
                                        var today = moment().format('YYYY-MM-DD');
                                        if (today > event.date) {
                                            $('#request-schedule').hide();
                                            $('#cancel-request').hide();
                                            $('#schedule-full').hide();
                                            $('#schedule-past').hide();
                                            $('#schedule-past').show();
                                            $('#schedule-enrolled').hide();
                                            $('#request-sent').hide();
                                            $('#request-cancelled').hide();
                                        }
                                        // if the user clicks the request schedule button
                                        $('#request-schedule').click(function() {
                                            // get the schedule_id
                                            var sched_id = event.sched_id;
                                            console.log(peer_id);
                                            // add confirmation to the request schedule swal
                                            swal.fire({
                                                icon: 'warning',
                                                title: 'Are you sure?',
                                                text: 'You are about to request this schedule',
                                                showCancelButton: true,
                                                confirmButtonText: 'Yes, request it!',
                                                cancelButtonText: 'No, cancel!',
                                                confirmButtonColor: '#3085d6',
                                                cancelButtonColor: '#d33',
                                            }).then((result) => {
                                                if (result.value) {
                                                    // send the request to the server
                                                    $.ajax({
                                                        url: '../../server/tutee/request-schedule.php',
                                                        type: 'POST',
                                                        data: {
                                                            sched_id: sched_id,
                                                            tutor_id: peer_id
                                                        },
                                                        success: function(response) {
                                                            var data = JSON.parse(response);
                                                            if (data.success) {
                                                                swal.fire({
                                                                    icon: 'success',
                                                                    title: 'Success!',
                                                                    text: 'Schedule requested successfully!'
                                                                }).then(function() {
                                                                    location.reload();
                                                                });
                                                            } else {
                                                                swal.fire({
                                                                    icon: 'error',
                                                                    title: 'Oops...',
                                                                    text: 'Something went wrong! Please try again later.'
                                                                });
                                                            }
                                                        }
                                                    });
                                                }
                                            });
                                        });
                                        var request_id = data.request_id;
                                        // if the user clicks the cancel request button
                                        $('#cancel-request').click(function() {
                                            // add also confirmation to the cancel request swal
                                            swal.fire({
                                                icon: 'warning',
                                                title: 'Are you sure?',
                                                text: 'You are about to cancel your request, YOU NO LONGER CANNOT REQUEST FOR THIS SCHEDULE',
                                                showCancelButton: true,
                                                confirmButtonText: 'Yes, cancel it!',
                                                cancelButtonText: 'No, cancel!',
                                                confirmButtonColor: '#3085d6',
                                                cancelButtonColor: '#d33',
                                            }).then((result) => {
                                                if (result.value) {
                                                    // send the cancel request to the server
                                                    $.ajax({
                                                        url: '../../server/tutee/cancel-request.php',
                                                        type: 'POST',
                                                        data: {
                                                            request_id: request_id
                                                        },
                                                        success: function(response) {
                                                            var data = JSON.parse(response);
                                                            if (data.success) {
                                                                swal.fire({
                                                                    icon: 'success',
                                                                    title: 'Success!',
                                                                    text: 'Request cancelled successfully!'
                                                                }).then(function() {
                                                                    location.reload();
                                                                });
                                                            } else {
                                                                swal.fire({
                                                                    icon: 'error',
                                                                    title: 'Oops...',
                                                                    text: 'Something went wrong! Please try again later.'
                                                                });
                                                            }
                                                        }
                                                    });
                                                }
                                            });
                                        });
                                    }
                                }
                            });
                        },

                    });

                }
            }
        });
    });
</script>