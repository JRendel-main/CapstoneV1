<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script>
    $(document).ready(function() {
        var announcements = [{
                text: "Welcome to our dashboard!",
                author: "Admin 1",
                timestamp: "2023-08-10 10:00 AM"
            },
            {
                text: "Important update: Please note the schedule changes.",
                author: "Admin 1",
                timestamp: "2023-08-11 2:30 PM"
            },
            {
                text: "Holiday notice: The office will be closed next week.",
                author: "Admin 2",
                timestamp: "2023-08-12 9:15 AM"
            }
        ];

        var announcementList = $('#announcement-list');

        // Display initial announcements
        announcements.forEach(function(announcement) {
            displayAnnouncement(announcement);
        });

        // Inside the displayAnnouncement function
        function displayAnnouncement(announcement) {
            var formattedTimestamp = moment(announcement.timestamp, "YYYY-MM-DD h:mm A").format("MMMM D, YYYY [at] h:mm A");

            announcementList.append(
                '<div class="card mb-3 border shadow-sm">' + // Add the 'border' class here
                '<div class="card-body p-3">' +
                '<div class="media">' +
                '<img src="../../assets/images/users/user-4.jpg" alt="Admin Profile" class="rounded-circle mr-3" width="40">' +
                '<div class="media-body">' +
                '<h6 class="card-title mb-0"><strong>' + announcement.author + '</strong></h6>' +
                '<p class="card-text mb-1">' + announcement.text + '</p>' +
                '<p class="card-text text-muted small">' + formattedTimestamp + '</p>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>'
            );
        }

        // Simulate admin posting a new announcement
        $('#post-announcement-form').submit(function(event) {
            event.preventDefault();

            var newAnnouncement = {
                text: $('#announcement-text').val(),
                author: "Admin",
                timestamp: moment().format("YYYY-MM-DD h:mm A") // Current timestamp
            };

            announcements.unshift(newAnnouncement);
            displayAnnouncement(newAnnouncement);

            $('#announcement-text').val('');
        });
    });
</script>