// get the user info from php using ajax
// and display it in the sidebar

$(document).ready(function() {
    $.ajax({
        url: "../../server/admin-dashboard/get-sidebar-name.php",
        type: "POST",
        dataType: "json",
        success: function(data) {
            $("#user-name").text(data.name);
            $("#sidebar-username").text(data.fullname);
            console.log(data.fullname);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            // use swal
            swal.fire({
                title: "Server Error",
                text: "Error while fetching user's info, try again later!",
                icon: "error",
                button: "Back to login",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "index.php";
                }
            });
        }
    })
})