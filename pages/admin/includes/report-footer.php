<script src="../../assets/libs/datatables/jquery.dataTables.min.js"></script>
<script>
    // document ready
    $(document).ready(function () {
        $.ajax({
            url: "../../server/admin-dashboard/get-reports.php",
            type: "GET",
            success: function (data) {
                let response = JSON.parse(data);
                console.log(response);
                let id = response.id;
                let sender = response.sender;
                let subject = response.subject;
                let priority = response.priority;
                let status = response.status;
                $('#tickets-table').DataTable({
                    data: response,
                    columns: [
                        {title: 'ID', data: 'id'},
                        {title: 'Requested by', data: 'sender'},
                        {title: 'Subject', data: 'subject'},
                        {title: 'Message', data: 'report'},
                        {title: 'Priority Level', data: 'priority'},
                        {title: 'Status', data: 'status'}
                    ],
                    "order": [[4, "desc"]],
                });
            }
        });

    });
</script>