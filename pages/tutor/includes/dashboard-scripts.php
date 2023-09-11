<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script>
    $(document).ready(function() {
        $.ajax({
            url: "../../server/tutor/get-tutor-dashboard.php",
            type: "GET",
            dataType: "json",
            success: function(data) {
                $('#pendingRequest').text(data.counts.total_pending);
                $('#totalSched').text(data.counts.total_sched);
                $('#totalTutee').text(data.counts.total_tutee);

                var schedule = data.schedule;

                // initiate table
                $("#ongoing").DataTable({
                    data: schedule,
                    columns: [
                        {
                            title: "Start Time",
                            data: "start_time"
                        },
                        {
                            title: "Topic",
                            data: "title"
                        },
                        {
                            title: "Duration",
                            data: "duration"
                        },
                        {
                            title: "Mode",
                            data: "mode"
                        }
                    ],
                    // remove search
                    "bFilter": false,
                    // remove entries
                    "bLengthChange": false,
                    // remove pagination
                    "bPaginate": false,
                    // remove info
                    "bInfo": false,
                });
                
            },
            error: function(xhr, status, error) {
                console.log(xhr);
            }
        })
    });
</script>