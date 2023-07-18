$(document).ready(function() {
    // Submit form
    $("#loginForm").submit(function(e) {
        e.preventDefault();

        // Get form values
        var username = $("#username").val();
        var password = $("#password").val();

        // Validate form inputs
        if (username === "" || password === "") {
            showAlert("danger", "Please enter username and password.");
            return;
        }

        // Perform AJAX login request
        $.ajax({
            type: "POST",
            url: "server/login.php", // Replace with your login script URL
            data: {
                username: username,
                password: password
            },
            success: function(response) {
                var responseData = JSON.parse(response);

                if (responseData.status === "success") {
                    // Redirect to the dashboard or desired page
                    window.location.href = "dashboard.php";
                } else {
                    showAlert("danger", responseData.message);
                }
            },
            error: function(xhr, status, error) {
                showAlert("danger", "An error occurred while processing the login request.");
            }
        });
    });
    // Function to display alerts
    function showAlert(type, message) {
        var alertHtml = '<div class="alert alert-' + type + '" role="alert">' +
            message +
            '</div>';
        $(".card-body").prepend(alertHtml);

        // Disable the button
        $(".btn-primary").prop("disabled", true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');

        // Remove the alert after 2 seconds
        setTimeout(function() {
            $(".alert").remove();
            // Enable the button
            $(".btn-primary").prop("disabled", false).html("Log In");
        }, 2000);
    }



});
