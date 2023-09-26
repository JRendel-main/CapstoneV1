<script>
    $(document).ready(function() {
        $.ajax({
            url: "../../server/moderator/get-testimonial-request.php",
            type: "GET",
            success: function(data) {
                $('#request-list').DataTable({
                    responsive: true,
                    language: {
                        search: "_INPUT_",
                        searchPlaceholder: "Search requests",
                    },
                    columns: [
                        {
                            title: "Peer Name",
                            data: "fullname"
                        },
                        {
                            title: "Message",
                            data: "message",
                            width: "30%"
                        },
                        {
                            title: "Action",
                            data: "testimonial_id"
                        }
                    ],
                    data: JSON.parse(data),
                    "columnDefs": [
                        {
                            "targets": 2,
                            "data": "testimonial_id",
                            "render": function ( data, type, row, meta ) {
                                return '<button type="button" class="btn btn-primary btn-sm" id="approve" data-toggle="modal" data-target="#approveModal" data-id="' + data + '">Approve</button> <button type="button" class="btn btn-danger btn-sm" id="reject" data-toggle="modal" data-target="#rejectModal" data-id="' + data + '">Reject</button>';
                            }
                        }
                    ],
                    "initComplete": function(settings, json) {
                        $('#request-list').wrap('<div class="table-responsive"></div>');
                    }
                });

                // Approve testimonial
                $('#request-list').on('click', '#approve', function() {
                    var testimonial_id = $(this).data('id');
                    swal.fire({
                        title: 'Are you sure?',
                        text: "You are about to approve this testimonial request.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#4fa7f3',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, approve it!'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url: "../../server/moderator/approve-testimonial.php",
                                type: "POST",
                                data: {
                                    testimonial_id: testimonial_id
                                },
                                success: function(data) {
                                    // if success on data
                                    var data = JSON.parse(data);
                                    console.log(data);
                                    if (data === 'success') {
                                        swal.fire({
                                            title: 'Success!',
                                            text: 'Testimonial request has been approved.',
                                            icon: 'success',
                                            confirmButtonColor: '#4fa7f3'
                                        }).then((result) => {
                                            if (result.value) {
                                                location.reload();
                                            }
                                        });
                                    } else {
                                        swal.fire({
                                            title: 'Error!',
                                            text: 'Testimonial request has not been approved.',
                                            icon: 'error',
                                            confirmButtonColor: '#4fa7f3'
                                        });
                                    }
                                },
                                error: function(data) {
                                    console.log(data);
                                }
                            });
                        }
                    });
                    
                });

                // Reject testimonial
                $('#request-list').on('click', '#reject', function() {
                    var testimonial_id = $(this).data('id');
                    swal.fire({
                        title: 'Are you sure?',
                        text: "You are about to reject this testimonial request.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#4fa7f3',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, reject it!'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url: "../../server/moderator/reject-testimonial.php",
                                type: "POST",
                                data: {
                                    testimonial_id: testimonial_id
                                },
                                success: function(data) {
                                    // if success on data
                                    var data = JSON.parse(data);
                                    console.log(data);
                                    if (data === 'success') {
                                        swal.fire({
                                            title: 'Success!',
                                            text: 'Testimonial request has been rejected.',
                                            icon: 'success',
                                            confirmButtonColor: '#4fa7f3'
                                        }).then((result) => {
                                            if (result.value) {
                                                location.reload();
                                            }
                                        });
                                    } else {
                                        swal.fire({
                                            title: 'Error!',
                                            text: 'Testimonial request has not been rejected.',
                                            icon: 'error',
                                            confirmButtonColor: '#4fa7f3'
                                        });
                                    }
                                },
                                error: function(data) {
                                    console.log(data);
                                }
                            });
                        }
                    });
                    
                });
            },
            error: function(data) {
                console.log(data);
            }
        });
    });
</script>