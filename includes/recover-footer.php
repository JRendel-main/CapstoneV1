<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('#successCard').hide();

    $('#reset').click(function () {
        // get the email 
        var email = $('#emailaddress').val();

        if (email == ''){
            swal.fire({
                title: "Error!",
                text: "Please enter your email address",
                icon: "error",
                button: "Ok"
            });
        } else {
            $('#recoveryCard').hide();

            // send to server and add loading swal when data is being processed
            swal.fire({
                title: "Loading...",
                text: "Please wait",
                icon: "info",
                showConfirmButton: false,
                allowOutsideClick: false
            });

            $.ajax({
                url: 'server/reset-password.php',
                type: 'POST',
                data: {
                    email: email
                },
                success: function (response) {
                    // hide the loading swal
                    swal.close();

                    // get the response 
                    var response = JSON.parse(response);

                    if (response.status == 'success') {
                        swal.fire({
                            title: "Success!",
                            text: response.message,
                            icon: "success",
                            button: "Ok"
                        });
                    } else {
                        swal.fire({
                            title: "Error!",
                            text: response.message,
                            icon: "error",
                            button: "Ok"
                        });
                    }
                    $('#successCard').show();
                    $('#userEmail').html(email);
                }
            });
        }
    });
</script>