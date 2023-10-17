<script>
    $(document).ready(function() {
        $.ajax({
            url: '../../server/tutee/get-requests.php',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                console.log(data);

                $('#request-list').DataTable({
                    responsive: true,
                    language: {
                        search: "_INPUT_",
                        searchPlaceholder: "Search requests",
                    },
                    data: data,
                    columns: [{
                            data: 'tutorName',
                            title: 'Tutor Name'
                        },
                        {
                            data: 'subject',
                            title: 'Subject/Topic'
                        },
                        {
                            data: 'date',
                            title: 'Date'
                        },
                        {
                            data: 'time',
                            title: 'Time'
                        },
                        {
                            data: 'status',
                            title: 'Status'
                        },
                        {
                            data: 'action',
                            title: 'Action'
                        },
                    ],
                    "order": [
                        [4, "asc"]
                    ],
                    "columnDefs": [{
                        "targets": [0, 1, 2, 3, 4, 5],
                        "className": "text-center"
                    }],
                    "drawCallback": function(settings) {
                        $('[data-toggle="tooltip"]').tooltip();
                    }
                });

                // cancel request button
                $('#request-list tbody').on('click', '#cancel-request', function() {
                    var data = $('#request-list').DataTable().row($(this).parents('tr')).data();
                    var tutorName = data['tutorName'];
                    var subject = data['subject'];
                    var date = data['date'];
                    var time = data['time'];
                    var status = data['status'];
                    var request = data['request_id'];

                    swal.fire({
                        title: "Are you sure?",
                        text: "You are about to cancel your request to " + tutorName + " for " + subject + " on " + date + " at " + time + ".",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, cancel it!",
                        cancelButtonText: "No, don't cancel it!"
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url: '../../server/tutee/cancel-request.php',
                                method: 'POST',
                                data: {
                                    request_id: request
                                },
                                success: function(data) {
                                    swal.fire({
                                        title: "Success!",
                                        text: "Your request has been cancelled.",
                                        icon: "success",
                                        confirmButtonText: "Ok"
                                    }).then((result) => {
                                        if (result.value) {
                                            location.reload();
                                        }
                                    });
                                },
                                error: function(xhr, status, error) {
                                    swal.fire({
                                        title: "Error!",
                                        text: error,
                                        icon: "error",
                                        confirmButtonText: "Ok"
                                    })
                                }
                            });
                        } else {
                            swal.fire({
                                title: "Cancelled",
                                text: "Your request is safe.",
                                icon: "error",
                                confirmButtonText: "Ok"
                            })
                        }
                    });
                });
            },
            error: function(xhr, status, error) {
                swal.fire({
                    title: "Error!",
                    text: error,
                    icon: "error",
                    confirmButtonText: "Ok"
                })
            }
        });
    });
</script>