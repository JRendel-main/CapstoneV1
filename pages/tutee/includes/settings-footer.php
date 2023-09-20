<script>
    $(document).ready(function() {
        $('#customSwitch1').change(function() {
            if ($(this).prop('checked')) {
                // Display a confirmation alert
                Swal.fire({
                    title: 'Switch Role?',
                    text: 'Are you sure you want to switch to the Tutor role?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, switch it!',
                    cancelButtonText: 'No, cancel',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                       //check if there is current schedule
                        $.ajax({
                            url: '../../server/tutee/check-current-schedule.php',
                            type: 'POST',
                            success: function(response) {
                                response = JSON.parse(response);
                                if (response.status == 'success') {
                                    $.ajax({
                                        url: '../../server/tutee/change-role.php',
                                        type: 'POST',
                                        success: function(response) {
                                            response = JSON.parse(response);
                                            if (response.status == 'success') {
                                                Swal.fire(
                                                    'Switched!',
                                                    'You are now a ' + (this.checked ? 'Tutor' : 'Tutee') + '.',
                                                    'success'
                                                ).then((result) => {
                                                    if (result.isConfirmed) {
                                                        // go to logout page
                                                        window.location.href = '../../logout.php';
                                                    }
                                                });
                                            } else {
                                                Swal.fire(
                                                    'Error!',
                                                    'Something went wrong.',
                                                    'error'
                                                ).then((result) => {
                                                    if (result.isConfirmed) {
                                                        // Reload the page
                                                        location.reload();
                                                    }
                                                });
                                            }
                                        }
                                    });
                                } else {
                                    // Display a warning alert if there is a current schedule 
                                    Swal.fire(
                                        'Warning!',
                                        response.message,
                                        'warning'
                                    ).then((result) => {
                                        if (result.isConfirmed) {
                                            // Reload the page
                                            location.reload();
                                        }
                                    });
                                }
                            }
                        });
                    } else {
                        // User canceled, revert the switch
                        this.checked = !this.checked;
                        Swal.fire('Canceled', 'Your role remains the same.', 'info');
                    }
                });
            }
        });
    });
</script>