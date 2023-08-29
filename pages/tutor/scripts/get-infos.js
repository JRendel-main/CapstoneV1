// get the fullname from php using ajax
$(document).ready(function() {
    $.ajax({
        url: "../../server/admin-dashboard/get-sidebar-name.php",
        type: "POST",
        dataType: "json",
        success: function(data) {
            $("#user-fullname").text(data.fullname);
            $("#user-rank").html("Bronze");
            console.log(data);
            let peer_id = data.peer_id;
        },
        error: function(data) {
            console.log(data);
        }
    });
});