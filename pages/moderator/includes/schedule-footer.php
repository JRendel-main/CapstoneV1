<script>
    $(document).ready(function() {
        $(document).ready(function() {
            // Send an AJAX request to your PHP backend to fetch schedules
            $.ajax({
                url: '../../server/moderator/get-schedule.php', // Replace with the correct URL
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.length > 0) {
                        // Iterate through the retrieved data and append it to the HTML
                        $.each(data, function(index, schedule) {
                            var scheduleHTML = '<div class="col-md-4">' +
                                '<div class="card-box project-box">' +
                                '<div class="dropdown float-right">' +
                                '<a href="#" class="dropdown-toggle card-drop arrow-none" data-toggle="dropdown" aria-expanded="false">' +
                                '<i class="mdi mdi-dots-horizontal m-0 text-muted h3"></i>' +
                                '</a>' +
                                '<div class="dropdown-menu dropdown-menu-right">' +
                                '<a class="dropdown-item" href="#" id="disable-sched" data-id=' + schedule.sched_id + '><strong>Disable Schedule</strong></a>' +
                                '</div>' +
                                '</div>' +
                                '<h4 class="mt-0"><a href="javascript: void(0);" class="text-dark">' + schedule.title + '</a></h4>' +
                                '<p class="text-muted text-uppercase"><i class="mdi mdi-account-circle"></i> <small>' + schedule.fullname + '</small></p>' +
                                '<div class="mb-3">' + schedule.status + '</div>' +
                                '<p class="text-muted font-13 mb-3 sp-line-2">' + schedule.description + '</p>' +
                                '<p class="mb-1 font-weight-bold">Schedule Details:</p>' +
                                // number of enrolled students
                                '<p class="mb-1">' +
                                '<span class="pr-2 text-nowrap mb-2 d-inline-block">' +
                                '<i class="mdi mdi-account-multiple text-muted"></i>' +
                                '<b> Enrolled Students:</b> ' + schedule.count + '</span>' +
                                '</p>' +
                                '<p class="mb-1">' +
                                '<span class="pr-2 text-nowrap mb-2 d-inline-block">' +
                                '<i class="mdi mdi-calendar-clock text-muted"></i>' +
                                '<b> Start Time:</b> ' + schedule.start + '</span>' +
                                '<span class="text-nowrap mb-2 d-inline-block">' +
                                '<i class="mdi mdi-calendar-clock text-muted"></i>' +
                                '<b> End Time:</b> ' + schedule.end + '</span>' +
                                '</p>' +
                                // schedule date
                                '<p class="mb-1">' +
                                '<span class="pr-2 text-nowrap mb-2 d-inline-block">' +
                                '<i class="mdi mdi-calendar text-muted"></i>' +
                                '<b> Date:</b> ' + schedule.date + '</span>' +
                                '</p>' +
                                '<p class="mb-1">' +
                                ((schedule.place !== '') ?
                                    '<span class="pr-2 text-nowrap mb-2 d-inline-block">' +
                                    '<i class="mdi mdi-map-marker text-muted"></i>' +
                                    '<b> Location:</b> ' + schedule.place + '</span>' :
                                    '<span class="pr-2 text-nowrap mb-2 d-inline-block">' +
                                    '<i class="mdi mdi-laptop text-muted"></i>' +
                                    '<b> Platform:</b> ' + schedule.platform + '</span>' +
                                    '<span class="text-nowrap mb-2 d-inline-block">' +
                                    '<i class="mdi mdi-link text-muted"></i>' +
                                    '<b> Link:</b> ' + schedule.link + '</span>'
                                ) +
                                '</p>'
                            '</div></div></div>';
                            $(document).on('click', '#disable-sched', function(event) {
                                event.preventDefault(); // Prevent the default link behavior

                                // Get the schedule ID from the data attribute
                                var scheduleId = $(this).data('id');
                                console.log(scheduleId);

                                // add swal here to confirm and add text area for reason
                                swal.fire({
                                    title: 'Are you sure you want to disable this schedule?',
                                    text: "This action cannot be undone.",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Yes, disable it!',
                                    // add text area for reason
                                    input: 'textarea',
                                    inputPlaceholder: 'Please state your reason for disabling this schedule.',
                                    inputAttributes: {
                                        'aria-label': 'Please state your reason for disabling this schedule.'
                                    }
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        $.ajax({
                                            url: '../../server/moderator/disable-schedule.php', // Replace with the correct URL
                                            method: 'POST',
                                            data: {
                                                id: scheduleId,
                                                reason: result.value
                                            },
                                            dataType: 'json',
                                            success: function(data) {
                                                // Handle a successful response from the server
                                                if (data.status === 'success') {
                                                    swal.fire(
                                                        'Disabled!',
                                                        'The schedule has been disabled.',
                                                        'success')
                                                    // Reload the page
                                                    location.reload();
                                                } else {
                                                    swal.fire(
                                                        'Error!',
                                                        'There was an error disabling the schedule.',
                                                        'error')
                                                }
                                            },
                                            error: function(xhr, status, error) {
                                                console.error('Failed to disable schedule:', error);
                                                
                                            }
                                        });
                                    }
                                })
                            });

                            $('#schedule-list').append(scheduleHTML);
                            // Handle click events for "View Students" links
                            $('.view-students-link').click(function() {
                                // Get the schedule data for the clicked link (replace with actual data retrieval logic)
                                var schedule = schedules[0]; // Change index accordingly

                                // Populate the "View Students" modal with schedule-specific data
                                var studentsList = schedule.tutees.map(function(tutee) {
                                    return '<li>' + tutee + '</li>';
                                }).join('');

                                $('#viewStudentsModalLabel').text('Students for ' + schedule.tutorName);
                                $('#studentList').html(studentsList);
                            });

                            // Handle click events for "View Location/Link" links
                            $('.view-location-link').click(function() {
                                // Get the schedule data for the clicked link (replace with actual data retrieval logic)
                                var schedule = schedules[0]; // Change index accordingly

                                // Populate the "View Location/Link" modal with schedule-specific data
                                $('#viewLocationLinkModalLabel').text('Location and Link for ' + schedule.title);
                                $('#schedulePlace').text(schedule.place);
                                $('#schedulePlatform').text(schedule.platform);
                                $('#scheduleLink').val(schedule.link);
                            });
                        });
                    } else {
                        // Handle the case where no schedules were found
                        $('#schedule-list').html('<p>No schedules available.</p>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Failed to fetch schedules:', error);
                    $('#schedule-list').html('<p>Error loading schedules.</p>');
                }
            });
        });
    });
</script>