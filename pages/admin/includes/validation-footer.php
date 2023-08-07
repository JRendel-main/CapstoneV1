<script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.js"></script>
<script>
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
</script>