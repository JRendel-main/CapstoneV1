<?php 
include_once 'server/db-connect.php';
// check if there is defined
if (isset($_GET['code'])) {
    $hasCode = 'true';
} else {
    $hasCode = 'false';
}

$code = $_GET['code'];

// check if there is code
$sql = "SELECT * FROM tbl_auth WHERE hashed_code = '$code'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $hasCode = 'true';
} else {
    $hasCode = 'false';
}
?>
<script>
    $('#recoveryCard').hide();

    var hasCode = "<?php echo $hasCode; ?>";
    console.log(hasCode);

    if (hasCode == 'false') {
        // add error swal and if ok is clicked, redirect to login page
        swal.fire({
            title: "Error!",
            text: "Invalid code",
            icon: "error",
            button: "Ok"
        }).then(function () {
            window.location.href = "login.php";
        });
    } else {
        // get the code
        var code = "<?php echo $_GET['code']; ?>";

        console.log(code);
        $('#recoveryCard').show();

        $('#reset').click(function() {
            // get the newpass and confirmpass on click of reset button
            var newpass = $('#newpass').val();
            var confirmpass = $('#confirmpass').val();

            if (newpass == '' || confirmpass == '') {
                swal.fire({
                    title: "Error!",
                    text: "Please fill out all fields",
                    icon: "error",
                    button: "Ok"
                });

                return false;
            }

            if (newpass == confirmpass) {
                // send to server and add loading swal when data is being processed
                swal.fire({
                    title: "Loading...",
                    text: "Please wait",
                    icon: "info",
                    showConfirmButton: false,
                    allowOutsideClick: false
                });

                $.ajax({
                    url: 'server/new-password.php',
                    type: 'POST',
                    data: {
                        code: code,
                        newpass: newpass
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
                            }).then(function () {
                                window.location.href = "login.php";
                            });
                        } else {
                            swal.fire({
                                title: "Error!",
                                text: response.message,
                                icon: "error",
                                button: "Ok"
                            });
                        }
                    }
                });
            } else {
                swal.fire({
                    title: "Error!",
                    text: "Password does not match",
                    icon: "error",
                    button: "Ok"
                });
            }
        })

        
    }
</script>