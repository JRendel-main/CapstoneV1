<script>
    $(document).ready(function() {
        $('#profile').hide();
        $.ajax({
            url: '../../server/admin-dashboard/get-restricted-list.php',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                // Initialize DataTable with the retrieved data
                if (data != '') {
                    $('#restricted-list').DataTable({
                        processing: true,
                        columns: [{
                                title: 'Category',
                                data: 'category'
                            },
                            {
                                title: 'Name',
                                data: 'name'
                            },
                            {
                                title: 'Date Disabled',
                                data: 'date'
                            },
                            {
                                title: 'Reason',
                                data: 'reason'
                            },
                            {
                                title: 'Email',
                                data: 'email'
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
                    $('#restricted-list').DataTable({
                        processing: true,
                        columns: [{
                                title: 'Category',
                                data: 'category'
                            },
                            {
                                title: 'Name',
                                data: 'name'
                            },
                            {
                                title: 'Date Disabled',
                                data: 'date'
                            },
                            {
                                title: 'Reason',
                                data: 'reason'
                            },
                            {
                                title: 'Email',
                                data: 'email'
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

        // detect if button is clicked on table
        $('#restricted-list tbody').on('click', '.enable-tutor', function() {
            var id = $(this).attr('id');
            swal.fire({
                title: 'Are you sure?',
                text: "You are about to enable this user!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#556ee6',
                cancelButtonColor: '#f46a6a',
                confirmButtonText: 'Yes, enable it!'
            }).then((result) => {
                if (result.value) {
                    Swal.fire({
                        title: 'Please Wait!',
                        html: 'Enabling user...',
                        allowOutsideClick: false,
                        onBeforeOpen: () => {
                            Swal.showLoading()
                        },
                    });
                    $.ajax({
                        url: '../../server/admin-dashboard/enable-tutor.php',
                        method: 'POST',
                        data: {
                            id: id
                        },
                        success: function(response) {
                            if (response.status = 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: 'User has been enabled!',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                setTimeout(function() {
                                    location.reload();
                                }, 1000);
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Something went wrong!',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            }
                        }
                    });
                }
            });
        });
    });
</script>