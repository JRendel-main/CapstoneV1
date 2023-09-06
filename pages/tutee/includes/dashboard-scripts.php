<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script>
    console.log("dashboard-scripts.php loaded");
    $(document).ready(function() {
        $.ajax({
            
        });

        $("#name").text(tutorName[0].name);
        $("#pending-count").text(tutorName[0].pendingReq);
        $("#upcoming-count").text(tutorName[0].upcoming);


        // data table
        $('#today-sched').DataTable({
            "paging": false,
            "searching": false,
            "ordering": true,
            "info": false,
            "order": [[ 0, "desc" ]],
            "info": true,
            "responsive": true,
            // remove the "show entries" dropdown
            "lengthChange": false,
            // remove the "showing entries" text
            "language": {
                "info": ""
            },
            "columnDefs": [
                { "orderable": false, "targets": 3 }
            ],
            // remove scroll-x
            "scrollX": false,
        });
    });
</script>