<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/5.16.0/d3.min.js" integrity="sha512-FHsFVKQ/T1KWJDGSbrUhTJyS1ph3eRrxI228ND0EGaEp6v4a/vGwPWd3Dtd/+9cI7ccofZvl/wulICEurHN1pg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/c3/0.7.20/c3.min.js" integrity="sha512-+IpCthlNahOuERYUSnKFjzjdKXIbJ/7Dd6xvUp+7bEw0Jp2dg6tluyxLs+zq9BMzZgrLv8886T4cBSqnKiVgUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $('#profile').hide();
        $.ajax({
            url: '../../server/admin-dashboard/get-tutor-list.php',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                // if data is not empty
                if (data != '') {
                    // Initialize DataTable with the retrieved data
                    $('#tutor-lists').DataTable({
                        processing: true,
                        columns: [{
                                title: 'ID',
                                data: 'tutor_id'
                            },
                            {
                                title: 'Name',
                                data: 'tutor_name'
                            },
                            {
                                title: 'Course',
                                data: 'tutor_course'
                            },
                            {
                                title: 'Year',
                                data: 'tutor_year'
                            },
                            {
                                title: 'Action',
                                data: 'action'
                            }
                        ],
                        "order": [
                            [0, "asc"]
                        ],
                        "language": {
                            "emptyTable": "No data available in table"
                        },
                        data: data, // Use the retrieved data here
                        responsive: true,
                        // remove show entries
                        "bLengthChange": false
                    });
                } else {
                    // Initialize DataTable with the retrieved data
                $('#tutor-lists').DataTable({
                    processing: true,
                    columns: [{
                            title: 'ID',
                            data: 'tutor_id'
                        },
                        {
                            title: 'Name',
                            data: 'tutor_name'
                        },
                        {
                            title: 'Course',
                            data: 'tutor_course'
                        },
                        {
                            title: 'Year',
                            data: 'tutor_year'
                        },
                        {
                            title: 'Action',
                            data: 'action'
                        }
                    ],
                    "order": [
                        [0, "asc"]
                    ],
                    "language": {
                        "emptyTable": "No data available in table"
                    },
                    responsive: true,
                    // remove show entries
                    "bLengthChange": false
                });
                }

            }
        });
        // generate dummy data for c-3 chart
        var chart = c3.generate({
            bindto: '#chart',
            data: {
                columns: [
                    ['1', 30],
                    ['2', 120],
                ],
                type: 'pie',
                colors: {
                    '1': '#f1b44c',
                    '2': '#34c38f',
                },
                names: {
                    '1': 'Tutor',
                    '2': 'Student',
                }
            },
        });
        // if view tutor clicked get the data from the table
        $('#tutor-lists tbody').on('click', '.view-tutor', function() {
            var row = $(this).closest('tr');
            var data = $('#tutor-lists').DataTable().row(row).data();
            var tutor_id = data['tutor_id'];
            var tutor_name = data['tutor_name'];
            var tutor_course = data['tutor_course'];
            var tutor_year = data['tutor_year'];
            var tutor_profile = data['tutor_profile'];
            var expertise = data['expertise'];
            var disable = data['disable'];

            // put card to the right side
            $('#alert').hide();
            $('#profile').show();

            // put the data to the card
            $('#name').html(tutor_name);
            // seperate the expertise by comma
            var expertise = expertise.split(',');
            var expertise_list = '';
            for (var i = 0; i < expertise.length; i++) {
                expertise_list += '<span class="badge badge-primary">' + expertise[i] + '</span> ';
            }
            $('#expertise').html(expertise_list);
            $('#disable').html(disable);
            // change the profile image
            $('#profile').attr('src', tutor_profile);
        });
        $('#disable').on('click', '.disable-tutor', function() {
            var tutor_id = $(this).attr('id');
            console.log('clicked');

            // use swal to ask the reason of disable the user
            swal.fire({
                    text: "Are you sure you want to disable this tutor?",
                    icon: "warning",
                    title: "Disable Tutor",
                    showCancelButton: true,
                    confirmButtonColor: "#556ee6",
                    cancelButtonColor: "#f46a6a",
                    confirmButtonText: "Yes, decline it!",
                    input: "text", // Add a text input field
                    inputPlaceholder: "Reason for declining",
                    inputValidator: (value) => {
                        // Validate the reason field
                        if (!value) {
                            return "You must provide a reason for disabling.";
                        }
                    },
                }).then((result) => {
                    // if the user click the confirm button
                    if (result.isConfirmed) {
                        // get the reason
                        var reason = result.value;
                        // send the data to the server
                        $.ajax({
                            url: '../../server/admin-dashboard/disable-tutor.php',
                            method: 'POST',
                            data: {
                                tutor_id: tutor_id,
                                reason: reason
                            },
                            success: function(response) {
                                swal.fire({
                                    text: "Tutor has been disabled!",
                                    icon: "success",
                                    title: "Success",
                                    confirmButtonColor: "#556ee6",
                                });
                                location.reload();
                            }
                        });
                    }
                })  
                // if the user click the cancel button
                .catch((error) => {
                    console.log(error);
                });
        });
    });
</script>