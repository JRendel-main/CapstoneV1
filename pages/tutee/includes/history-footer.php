<script>
    $(document).ready(function() {
        $.ajax({
            url: '../../server/tutee/get-history.php',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#history-list').DataTable({
                    responsive: true,
                    language: {
                        search: "_INPUT_",
                        searchPlaceholder: "Search history",
                    },
                    "order": [
                        [2, "asc"]
                    ],
                    "columnDefs": [{
                        "targets": [0, 1, 2, 3, 4, 5],
                        "className": "text-center"
                    }],
                    "drawCallback": function(settings) {
                        $('[data-toggle="tooltip"]').tooltip();
                    },
                    data: data,
                    columns: [
                        {
                            data: "tutorName",
                            title: "Tutor Name"
                        },
                        {
                            data: "topic",
                            title: "Topic"
                        },
                        {
                            data: "date-time",
                            title: "Date & Time"
                        },
                        {
                            data: "status",
                            title: "Status"
                        },
                        {
                            data: "review",
                            title: "Review & Feedback"
                        }
                    ]
                });
            },
            error: function(xhr, status, error) {
                swal.fire({
                    title: "Error!",
                    text: error,
                    icon: "error",
                    confirmButtonText: "Ok"
                });
            }
        });
    });
</script>