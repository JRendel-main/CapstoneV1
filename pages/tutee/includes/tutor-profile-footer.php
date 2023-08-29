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
                if (data.success) {
                    var tutor = data.tutor;
                    var fullname = tutor.fullname;
                    var department = tutor.department;
                    var about = tutor.about;
                    var bio = tutor.bio;
                    var rating = tutor.rating;
                    var expertise = tutor.expertise;
                    var tutee_count = tutor.tutee_count;
                    var status = tutor.status;
                    var message_to_tutor = tutor.message_to_tutor;
                    var profile_status = '';
                    var tutor_id = tutor.tutor_id;
                    if (status == 0) {
                        profile_status = 'Available';
                    } else if (status == 1) {
                        profile_status = 'Not Available';
                    } else if (status == 2) {
                        profile_status = 'Pending';
                    }

                    $('#tutor-name').html(toCamelCase(fullname));
                    $('#tutor-department').html(department);
                    $('#tutor-about').html(tutor.about);
                    $('#fullname').html(toCamelCase('<b>Name: </b>' + fullname));
                    $('#contactnum').html('<b>Contact Number: </b>' + tutor.contactnum);
                    $('#email').html('<b>Email: </b>' + tutor.email);

                    // pack the schedule data into an array
                    var schedule = [];

                    if (data.schedules.length > 0) {
                        data.schedules.forEach(function(scheduleItem) {
                            var scheduleEvent = {
                                sched_id: scheduleItem.sched_id,
                                title: scheduleItem.title,
                                start: scheduleItem.date + 'T' + scheduleItem.start,
                                end: scheduleItem.date + 'T' + scheduleItem.end,
                                description: scheduleItem.description,
                                place: scheduleItem.place,
                                duration: scheduleItem.duration,
                                max_tutee: scheduleItem.max_tutee,
                                date: scheduleItem.date,
                                tutor_id: scheduleItem.tutor_id
                            };
                            schedule.push(scheduleEvent);
                        });
                    }


                    // check if the schedule array is emtpy
                    if (schedule.length > 0) {
                        // Hide the no message text
                        $('#no-sched-message').hide();
                        $('#calendar').show();

                        // Initialize the FullCalendar
                        $('#calendar').fullCalendar({
                            responsive: true,
                            editable: false,
                            eventLimit: true,
                            events: schedule,
                            eventClick: function(info) {
                                function formatDate(date) {
                                    // make the date more readable to users make it more user friendly\
                                    var date = new Date(date);
                                    var month = date.getMonth() + 1;
                                    var day = date.getDate();
                                    var year = date.getFullYear();
                                    var formattedDate = year + '-' + month + '-' + day;
                                    return formattedDate;
                                }
                                // Show the modal
                                $('#schedule-modal').modal('show');

                                $('#modal-title').html('Request Schedule to ' + info.title);
                                $('#modal-date').val(formatDate(info.start));
                                $('#modal-time').val(info.start);
                                $('#modal-topic').val(info.title);
                                $('#modal-description').val(info.description);
                                $('#modal-place').val(info.place);
                                $('#modal-duration').val(info.duration);
                                $('#modal-max-tutee').val(info.max_tutee)

                                // for button, check if the schedule is already requested, full based on max tutee and if the schedule is already past
                                $.ajax({
                                    url: '../../server/tutee/check-schedule.php',
                                    type: 'POST',
                                    data: {
                                        sched_id: info.sched_id,
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
                                            } else if (status == 1) {
                                                // schedule is already requested
                                                $('#request-schedule').hide();
                                                $('#cancel-request').show();
                                                $('#schedule-full').hide();
                                                $('#schedule-past').hide();
                                            } else if (status == 2) {
                                                // schedule is already full
                                                $('#request-schedule').hide();
                                                $('#cancel-request').hide();
                                                $('#schedule-full').show();
                                                $('#schedule-past').hide();
                                            } else if (status == 3) {
                                                // schedule is already past
                                                $('#request-schedule').hide();
                                                $('#cancel-request').hide();
                                                $('#schedule-full').hide();
                                                $('#schedule-past').show();
                                            }
                                            // if the user clicks the request schedule button
                                            $('#request-schedule').click(function() {
                                                // get the schedule_id
                                                var sched_id = info.sched_id;
                                                console.log(tutor_id);
                                                // send the request to the server
                                                $.ajax({
                                                    url: '../../server/tutee/request-schedule.php',
                                                    type: 'POST',
                                                    data: {
                                                        sched_id: info.sched_id,
                                                        tutor_id: tutor_id
                                                    },
                                                    success: function(response) {
                                                        var data = JSON.parse(response);
                                                        if (data.success) {
                                                            swal.fire({
                                                                icon: 'success',
                                                                title: 'Success!',
                                                                text: 'Schedule request sent successfully!'
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
                                            });
                                            var request_id = data.request_id;
                                            // if the user clicks the cancel request button
                                            $('#cancel-request').click(function() {
                                                // get the schedule_id
                                                var sched_id = info.sched_id;
                                                console.log(request_id);

                                                // send the request to the server
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
                                                                text: 'Schedule request cancelled successfully!'
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
                                            });
                                        }
                                    }
                                });
                            }
                        });
                    } else {
                        // hide the calendar
                        $('#calendar').hide();
                    }
                } else {
                    swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong! Please try again later.'
                    });
                }
            }
        });
    });
</script>