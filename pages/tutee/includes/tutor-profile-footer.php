<script>
    $(document).ready(function() {
        function toCamelCase(input) {
            return input.replace(/\w+/g, function(match) {
                return match.charAt(0).toUpperCase() + match.slice(1).toLowerCase();
            });
        }
        // get the peer_id from link
        var peer_id = <?php echo $peer_id; ?>;
        console.log(peer_id);

        // get the tutor profile use ajax
        $.ajax({
            url: '../../server/tutee/get-tutorprofile.php',
            type: 'POST',
            data: {
                peer_id: peer_id
            },
            success: function(response) {
                console.log(response);
                var data = JSON.parse(response);
                if (data.success) {
                    var tutor = data.tutor;
                    var fullname = tutor.fullname;
                    var department = tutor.department;
                    var about = tutor.about;
                    var bio = tutor.bio;
                    var rating = tutor.rating;
                    var expertise = tutor.expertise;
                    var tutee_count = tutor.tutee_count;
                    var status = tutor.status;
                    var message_to_tutor = tutor.message_to_tutor;
                    var profile_status = '';
                    if (status == 0) {
                        profile_status = 'Available';
                    } else if (status == 1) {
                        profile_status = 'Not Available';
                    } else if (status == 2) {
                        profile_status = 'Pending';
                    }

                    $('#tutor-name').html(toCamelCase(fullname));
                    $('#tutor-department').html(department);
                    $('#tutor-about').html(tutor.about);
                } else {
                    swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong! Please try again later.'
                    });
                }
            }
        });
    });
</script>