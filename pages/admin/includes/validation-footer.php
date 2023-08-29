<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-1.13.6/b-2.4.1/b-colvis-2.4.1/b-html5-2.4.1/b-print-2.4.1/date-1.5.1/fc-4.3.0/fh-3.4.0/kt-2.10.0/r-2.5.0/sc-2.2.0/sb-1.5.0/sp-2.2.0/sl-1.7.0/datatables.min.js"></script>

<script>
    $(document).ready(function() {
        new DataTable('#validation', {
            responsive: true,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        })

        function fetchAccountsData() {
            $.ajax({
                url: '../../server/admin-dashboard/fetch_pending_accounts.php',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    displayAccountsData(data);
                },
                error: function(xhr, status, error) {
                    alert(xhr.responseText);
                }
            });
        }

        function displayAccountsData(accounts) {
            var tableBody = $('#validation tbody');
            tableBody.empty();

            accounts.forEach(function(account) {
                var row = $('<tr>');
                row.append('<td>' + account.name + '</td>');
                row.append('<td>' + account.department + '</td>');
                row.append('<td>' + account.year + '</td>');
                // add open modal button
                row.append('<td><button class="btn btn-sm btn-primary" id="view-cor" data-name="' + account.name + '" data-cor="' + account.cor +'"><i class="mdi mdi-eye"></i></button></td>');
                row.append('<td>' + account.email + '</td>');
                row.append('<td><button class="btn btn-sm btn-success" id="approveAccount" data-peerid="' + account.peerid + '"><i class="mdi mdi-account-check"></i></button><button class="btn btn-sm btn-danger" id="denyAccount" data-peerid="' + account.peerid + '"><i class="mdi mdi-account-off"></i></button></td>');
                tableBody.append(row);
            });
            
            // display the image to modal when view cor button clicked
            $('#validation').on('click', '#view-cor', function() {
                var name = $(this).data('name');
                var cor = $(this).data('cor');
                //replace the space on name by underscore
                name = name.replace(/\s/g, '_');
                $('#viewCORModalLabel').text('View Certificate of Registration of ' + name);
                $('#viewCORModal').modal('show');
                $('#cor-container').html('<img src="../../server/COR/' + encodeURIComponent(name) + '/' + cor + '" class="embed-responsive-item">');
            });
        }

        function approveAccount() {
            // add first confirmation from user using sweetalert2
            swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#556ee6',
                cancelButtonColor: '#f46a6a',
                confirmButtonText: 'Yes, approve it!'
            }).then((result) => {
                if (result.value) {
                    var row = $(this).closest('tr');
                    var peerid = $(this).data('peerid'); // Read the peerid from the button's data attribute
                    $.ajax({
                        url: '../../server/admin-dashboard/approve_account.php',
                        type: 'POST',
                        data: {
                            peerid: peerid
                        }, // Send the peerid instead of id
                        success: function(response) {
                            swal.fire(
                                'Approved!',
                                response,
                                'success'
                            );
                            fetchAccountsData();
                        },
                        error: function(xhr, status, error) {
                            // use sweetalert2
                            swal.fire(
                                'Server Error!!',
                                xhr.responseText,
                                'error'
                            );
                        }
                    });
                }
            });
        }

        // Event listener for click event of Approve button add a confirmation first using sweetalert2
        $('#validation').on('click', '#approveAccount', approveAccount);
        // Event listener for click event of Reject button
        $('#validation').on('click', '#denyAccount', denyAccount);
        // Function to reject account
        function denyAccount() {
            var row = $(this).closest("tr");
            var peerid = $(this).data("peerid"); // Read the peerid from the button's data attribute

            swal
                .fire({
                    text: "Are you sure you want to decline?",
                    icon: "warning",
                    title: "Decline Request",
                    showCancelButton: true,
                    confirmButtonColor: "#556ee6",
                    cancelButtonColor: "#f46a6a",
                    confirmButtonText: "Yes, decline it!",
                    input: "text", // Add a text input field
                    inputPlaceholder: "Reason for declining",
                    inputValidator: (value) => {
                        // Validate the reason field
                        if (!value) {
                            return "You must provide a reason for declining.";
                        }
                    },
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        var reason = result.value; // Get the reason for declining from the result

                        $.ajax({
                            url: "../../server/admin-dashboard/decline_account.php",
                            type: "POST",
                            data: {
                                peerid: peerid,
                                reason: reason, // Send the reason along with the peerid
                            },
                            success: function(response) {
                                swal.fire("Denied!", response, "success");
                                fetchAccountsData();
                            },
                            error: function(xhr, status, error) {
                                // use sweetalert2
                                swal.fire("Server Error!!", xhr.responseText, "error");
                            },
                        });
                    }
                });
        }
        // Fetch pending account details when page loads
        fetchAccountsData();
    });
</script>
<!-- <script>
    $(document).ready(function() {
        // Function to fetch accounts data from PHP server using AJAX
        function fetchAccountsData() {
            $.ajax({
                url: '../../server/admin-dashboard/fetch_pending_accounts.php',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    displayAccountsData(data);
                },
                error: function(xhr, status, error) {
                    alert(xhr.responseText);
                }
            });
        }
        // Function to display accounts data in the table
        function displayAccountsData(accounts) {
            var tableBody = $('#account-validation-table tbody');
            tableBody.empty();

            accounts.forEach(function(account) {
                var row = $('<tr>');
                row.append('<td><img src="user1.jpg" alt="User Profile"></td>');
                row.append('<td>' + account.name + '</td>');
                row.append('<td>' + account.age + '</td>');
                row.append('<td>' + account.department + '</td>');
                row.append('<td>' + account.year + '</td>');
                row.append('<td>' + account.email + '</td>');
                row.append('<td><button class="btn btn-sm btn-success" id="approveAccount" data-peerid="' + account.peerid + '">Approve</button><button class="btn btn-sm btn-danger" id="denyAccount" data-peerid="' + account.peerid + '">Deny</button></td>');
                tableBody.append(row);
            });
        }


        function approveAccount() {
            // add first confirmation from user using sweetalert2
            swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#556ee6',
                cancelButtonColor: '#f46a6a',
                confirmButtonText: 'Yes, approve it!'
            }).then((result) => {
                if (result.value) {
                    var row = $(this).closest('tr');
                    var peerid = $(this).data('peerid'); // Read the peerid from the button's data attribute
                    $.ajax({
                        url: '../../server/admin-dashboard/approve_account.php',
                        type: 'POST',
                        data: {
                            peerid: peerid
                        }, // Send the peerid instead of id
                        success: function(response) {
                            swal.fire(
                                'Approved!',
                                response,
                                'success'
                            );
                            fetchAccountsData();
                        },
                        error: function(xhr, status, error) {
                            // use sweetalert2
                            swal.fire(
                                'Server Error!!',
                                xhr.responseText,
                                'error'
                            );
                        }
                    });
                }
            });
        }

        // Event listener for click event of Approve button add a confirmation first using sweetalert2
        $('#account-validation-table').on('click', '#approveAccount', approveAccount);
        // Event listener for click event of Reject button
        $('#account-validation-table').on('click', '#denyAccount', denyAccount);
        // Function to reject account
        function denyAccount() {
            var row = $(this).closest("tr");
            var peerid = $(this).data("peerid"); // Read the peerid from the button's data attribute

            swal
                .fire({
                    text: "Are you sure you want to decline?",
                    icon: "warning",
                    title: "Decline Request",
                    showCancelButton: true,
                    confirmButtonColor: "#556ee6",
                    cancelButtonColor: "#f46a6a",
                    confirmButtonText: "Yes, decline it!",
                    input: "text", // Add a text input field
                    inputPlaceholder: "Reason for declining",
                    inputValidator: (value) => {
                        // Validate the reason field
                        if (!value) {
                            return "You must provide a reason for declining.";
                        }
                    },
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        var reason = result.value; // Get the reason for declining from the result

                        $.ajax({
                            url: "../../server/admin-dashboard/decline_account.php",
                            type: "POST",
                            data: {
                                peerid: peerid,
                                reason: reason, // Send the reason along with the peerid
                            },
                            success: function(response) {
                                swal.fire("Denied!", response, "success");
                                fetchAccountsData();
                            },
                            error: function(xhr, status, error) {
                                // use sweetalert2
                                swal.fire("Server Error!!", xhr.responseText, "error");
                            },
                        });
                    }
                });
        }


        // Fetch accounts data on page load
        fetchAccountsData();
    });
</script> -->