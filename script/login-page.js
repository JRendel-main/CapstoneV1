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
                    // get the diretory on reponseData and redirect the user to it
                    // add swal and redirect
                    Swal.fire({
                        title: "Success",
                        text: responseData.message,
                        icon: "success",
                        showCancelButton: false,
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "OK"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = responseData.directory;
                        }
                    });
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
        $(".btn-primary").prop("disabled", true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');

        // Remove the alert after 2 seconds
        setTimeout(function() {
            $(".alert").remove();
            // Enable the button
            $(".btn-primary").prop("disabled", false).html("Log In");
        }, 3000);
    }



});
