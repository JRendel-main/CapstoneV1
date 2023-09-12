<script>
    $(document).ready(function() {
        $('#schedule_title').hide();
        // Define the form submit event handler
        $.ajax({
            url: '../../server/tutee/get-schedule.php',
            type: 'GET',
            success: function(response) {
                if (response === '') {
                    $('#schedule_title').hide();
                    $('#schedule_name').html('');
                    $('#schedule_table').html('<h3 class="text-center">No Schedule</h3>');
                } else {
                    $('#documentation').DataTable({
                        columnDefs: [{
                            orderable: false,
                            targets: [2, 3]
                        }],
                        columns: [{
                                title: "Title",
                                data: "title"
                            },
                            {
                                title: "Date",
                                data: "date"
                            },
                            {
                                title: "Time",
                                data: "time"
                            },
                            {
                                title: "Tutor Name",
                                data: "tutor_name"
                            },
                            {
                                title: "Status",
                                data: "status"
                            },
                            {
                                title: "Action",
                                data: "action"
                            }
                        ],
                        responsive: true,
                        data: JSON.parse(response),
                    });

                    // when the add button is clicked
                    $('#documentation tbody').on('click', '#add-docu', function() {
                        var data = $('#documentation').DataTable().row($(this).parents('tr')).data();
                        // get the title of the schedule
                        $('#schedule_name').data('id', data.id);
                        // show the schedule title
                        $('#schedule_name').html(data.title);
                        $('#schedule_title').show();
                    });
                }
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });

    });
</script>