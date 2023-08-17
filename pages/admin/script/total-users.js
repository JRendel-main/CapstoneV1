$(document).ready(function() {
    // Fetch and update total users for tutee, tutors, moderators, and overall total users
    $.ajax({
        type: "GET",
        url: "../../server/admin-dashboard/get-total-users.php",
        dataType: "json",
        success: function(data) {
            $("#totalTutee").text(data.tutee);
            $("#totalTutors").text(data.tutor);
            $("#totalModerators").text(data.moderator);
            $("#totalUsers").text(data.overall);
            console.log(data);
        },
        error: function(xhr, status, error) {
            console.error("Failed to fetch total users:", error);
        }
    });
});