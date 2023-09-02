<?php
$peer_id = $_SESSION['peer_id'];
?>
<script>
    $(document).ready(function() {
        var dataTableInitialized = {
            'pending': false,
            'approved': false,
            'declined': false,
            'all': false
        };

        $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
            var targetTable = $(e.target).attr('href');

            if (targetTable === '#pending' && !dataTableInitialized.pending) {
                loadPendingTable();
                dataTableInitialized.pending = true;
            } else if (targetTable === '#approved' && !dataTableInitialized.approved) {
                loadApprovedTable();
                dataTableInitialized.approved = true;
            } else if (targetTable === '#declined' && !dataTableInitialized.declined) {
                loadDeclinedTable();
                dataTableInitialized.declined = true;
            } else if (targetTable === '#all' && !dataTableInitialized.all) {
                loadAllTable();
                dataTableInitialized.all = true;
            }
        });
    });

    function loadPendingTable() {
        $.ajax({
            url: '../../server/tutor/request-list.php',
            method: 'POST',
            data: {
                peer_id: <?php echo $peer_id; ?>
            },
            dataType: 'json',
            success: function(data) {
                // fetch every data from the database
                var sched_id = data.sched_id;
                var tutee_id = data.tutee_id;
                var title = data.title;
                var description = data.description;
                var date = data.date;
                var start = data.start;
                var max_tutee = data.max_tutee;
                var availableSlot = data.availableSlot;
                var status = data.status;
                var pending = data.pending;
                var enrolled = data.enrolled;
                var max_tutee = data.max_tutee;
                $('#pending-table').DataTable({
                    responsive: true,
                    columns: [{
                            data: 'title'
                        },
                        {
                            data: 'date'
                        },
                        {
                            data: 'time'
                        },
                        {
                            data: 'availableSlot'
                        },
                        {
                            data: 'status'
                        },
                        {
                            data: 'pending'
                        }
                    ],
                    data: data

                });
                // if the view button is clicked
                $('#pending-table').on('click', '.btn-view', function() {
                    var sched_id = $(this).data('sched_id');
                    var enrolled = $(this).data('enrolled');
                    var max_tutee = $(this).data('max-tutee');
                    console.log(enrolled);
                    // open a modal
                    $('#view-request').modal('show');

                    $.ajax({
                        url: '../../server/tutor/list-requested.php',
                        method: 'POST',
                        data: {
                            sched_id: sched_id,
                            enrolled: enrolled,
                            max_tutee: max_tutee
                        },
                        dataType: 'json',
                        success: function(data) {
                            // display the users info using card on modal if the data array is empty, display alert
                            if (data.length == 0) {
                                $('.modal-body').html('<div class="alert alert-danger" role="alert">No request yet.</div>');
                            } else {
                                var html = '';
                                // now fetch the data using card and button
                                html += '<div class="table-responsive">';
                                html += '<table class="table table-centered table" id="tutor-requests-table">';
                                html += '<thead>';
                                html += '<tr>';
                                html += '<th style="width: 20px;">';
                                html += '<div class="custom-control custom-checkbox">';
                                html += '<input type="checkbox" class="custom-control-input" id="customCheck1">';
                                html += '<label class="custom-control-label" for="customCheck1">&nbsp;</label>';
                                html += '</div>';
                                html += '</th>';
                                html += '<th>Name</th>';
                                html += '<th>Email</th>';
                                html += '<th>Contact</th>';
                                html += '<th>Course</th>';
                                html += '<th>Year</th>';
                                html += '<th>Status</th>';
                                html += '<th style="width: 85px;">Action</th>';
                                html += '</tr>';
                                html += '</thead>';
                                html += '<tbody>';

                                $.each(data, function(index, value) {
                                    html += '<tr>';
                                    html += '<td>';
                                    html += '<div class="custom-control custom-checkbox">';
                                    html += '<input type="checkbox" class="custom-control-input" id="customCheck2">';
                                    html += '<label class="custom-control-label" for="customCheck2">&nbsp;</label>';
                                    html += '</div>';
                                    html += '</td>';
                                    html += '<td class="table-user">';
                                    html += '<img src="https://ui-avatars.com/api/?name=' + value.fname + '+' + value.lname + '" alt="table-user" class="mr-2 rounded-circle">';
                                    html += '<a href="javascript:void(0);" class="text-body font-weight-semibold">' + value.fname + ' ' + value.lname + '</a>';
                                    html += '</td>';
                                    html += '<td>' + value.email + '</td>';
                                    html += '<td>' + value.contact + '</td>';
                                    html += '<td>' + value.course + '</td>';
                                    html += '<td>' + value.year + '</td>';
                                    html += '<td>';
                                    html += '<span class="badge bg-soft-' + (value.status === 'Active' ? 'success' : 'danger') + ' text-' + (value.status === 'Active' ? 'success' : 'danger') + '">' + value.status + '</span>';
                                    html += '</td>';
                                    html += '<td class="text-center">';
                                    html += '<button class="btn btn-rounded btn-success btn-option" data-request_id="' + value.request_id + '" data-max_tutee="' + value.max_tutee + '" data-avail="' + value.enrolled + '"><i class="fa fa-cog"></i></button>';
                                    html += '</td>';
                                    html += '</tr>';
                                });

                                html += '</tbody>';
                                html += '</table>';
                                html += '</div>';

                                $('.modal-body').html(html);

                                // if button clicked a swal alert open and ask if the tutor wants to accept or decline the request
                                $('.btn-option').on('click', function() {
                                    var request_id = $(this).data('request_id');
                                    var max_tutee = $(this).data('max_tutee');
                                    var avail = $(this).data('avail');
                                    console.log(max_tutee);
                                    console.log(avail);
                                    swal.fire({
                                        title: 'Options',
                                        text: 'Do you want to tutor this student?',
                                        icon: 'question',
                                        showCancelButton: true,
                                        confirmButtonText: 'Accept',
                                        cancelButtonText: 'Decline',
                                        confirmButtonColor: '#556ee6',
                                        cancelButtonColor: '#f46a6a',
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            $.ajax({
                                                url: '../../server/tutor/accept-request.php',
                                                method: 'POST',
                                                data: {
                                                    request_id: request_id,
                                                    max_tutee: max_tutee,
                                                    avail: avail
                                                },
                                                dataType: 'json',
                                                success: function(data) {
                                                    if (data.status == 'success') {
                                                        // use swal
                                                        swal.fire({
                                                            title: 'Success!',
                                                            text: 'Request accepted.',
                                                            icon: 'success',
                                                        }).then(function() {
                                                            // reload the page
                                                            location.reload();
                                                        });
                                                    } else if (data.status == 'full') {
                                                        // use swal
                                                        swal.fire({
                                                            title: 'Cannot Enroll this student!',
                                                            text: 'The schedule is full.',
                                                            icon: 'error',
                                                        })
                                                    }
                                                },
                                                error: function(data) {
                                                    // use swal
                                                    swal.fire({
                                                        title: 'Error!',
                                                        text: 'Something went wrong.',
                                                        icon: 'error',
                                                    })
                                                }
                                            });
                                        } else {
                                            $.ajax({
                                                url: '../../server/tutor/decline-request.php',
                                                method: 'POST',
                                                data: {
                                                    request_id: request_id
                                                },
                                                dataType: 'json',
                                                success: function(data) {
                                                    // use swal
                                                    swal.fire({
                                                        title: 'Success!',
                                                        text: 'Request declined.',
                                                        icon: 'success',
                                                    }).then(function() {
                                                        // reload the page
                                                        location.reload();
                                                    });
                                                },
                                                error: function(data) {
                                                    // use swal
                                                    swal.fire({
                                                        title: 'Error!',
                                                        text: 'Something went wrong.',
                                                        icon: 'error',
                                                    })
                                                }
                                            });
                                        }
                                    });
                                });
                            }
                        },
                        error: function(data) {
                            // use swal
                            swal.fire({
                                title: 'Error!',
                                text: 'Something went wrong.',
                                icon: 'error',
                            })
                        }
                    });
                });
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    function loadApprovedTable() {
        $.ajax({
            url: '../../server/tutor/approved-list.php',
            method: 'POST',
            data: {
                peer_id: <?php echo $peer_id; ?>
            },
            dataType: 'json',
            success: function(data) {
                // initate table
                $('#approved-table').DataTable({
                    columns: [{
                            data: 'topic'
                        },
                        {
                            data: 'date'
                        },
                        {
                            data: 'time'
                        },
                        {
                            data: 'tutee_name'
                        },
                        {
                            data: 'status'
                        }
                    ],
                    data: data
                });
            },
        });
    }
</script>