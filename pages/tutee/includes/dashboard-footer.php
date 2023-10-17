<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.5/dist/js.cookie.min.js"></script>
<script>
    $(document).ready(function() {
        console.log('test');
        $.ajax({
            url: "../../server/tutee/get-tutee-dashboard.php",
            type: "GET",
            dataType: "json",
            success: function(data) {
                console.log(data);
                // get tutor name
                var name = data.tuteeInfo.name;
                var pendingReq = data.tuteeInfo.pendingReq;
                var upcoming = data.tuteeInfo.upcoming;
                var profile = data.tuteeInfo.profile;
                // display tutor name
                $('#name').html(name);
                // change profile
                $('#profilePic').attr("src", profile);
                // display pending requests
                $('#pending-count').html(pendingReq);
                // display upcoming sessions
                $('#upcoming-count').html(upcoming);
                // data table
                $('#today-sched').DataTable({
                    columns: [{
                            title: "Start",
                            data: 'start'
                        },
                        {
                            title: "Title",
                            data: 'title'
                        },
                        {
                            title: "Mode",
                            data: 'mode'
                        },
                        {
                            title: "Duration",
                            data: 'duration'
                        },
                        {
                            title: "Max Tutee",
                            data: 'max_tutee'
                        }
                    ],
                    "paging": false,
                    "searching": false,
                    "ordering": true,
                    "info": false,
                    "order": [
                        [0, "desc"]
                    ],
                    "info": true,
                    "responsive": true,
                    // remove the "show entries" dropdown
                    "lengthChange": false,
                    // remove the "showing entries" text
                    "language": {
                        "info": ""
                    },
                    "columnDefs": [{
                        "orderable": false,
                        "targets": 3
                    }],
                    // remove scroll-x
                    "scrollX": false,
                    data: data.todaySched,
                    responsive: true
                });
                // data table
                $('#upcoming-sched').DataTable({
                    columns: [{
                            title: "Week",
                            data: 'week'
                        },
                        {
                            title: "Start",
                            data: 'start'
                        },
                        {
                            title: "Title",
                            data: 'title'
                        },
                        {
                            title: "Mode",
                            data: 'mode'
                        },
                        {
                            title: "Duration",
                            data: 'duration'
                        },
                        {
                            title: "Status",
                            data: 'status'
                        }
                    ],
                    "paging": false,
                    "searching": false,
                    "ordering": true,
                    "info": false,
                    "order": [
                        [0, "desc"]
                    ],
                    "info": true,
                    "responsive": true,
                    // remove the "show entries" dropdown
                    "lengthChange": false,
                    // remove the "showing entries" text
                    "language": {
                        "info": ""
                    },
                    "columnDefs": [{
                        "orderable": false,
                        "targets": 3
                    }],
                    // remove scroll-x
                    "scrollX": false,
                    data: data.weekSched,
                    responsive: true
                });
            },
        });
    });
</script>