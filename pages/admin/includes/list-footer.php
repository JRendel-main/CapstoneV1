<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-1.13.6/b-2.4.1/b-colvis-2.4.1/b-html5-2.4.1/b-print-2.4.1/date-1.5.1/fc-4.3.0/fh-3.4.0/kt-2.10.0/r-2.5.0/sc-2.2.0/sb-1.5.0/sp-2.2.0/sl-1.7.0/datatables.min.js"></script>


<script>
    $(document).ready(function() {
        new DataTable('#user_list', {
            responsive: true,
            ajax: {
                url: '../../',
                type: 'POST',
                dataSrc: '',
                data: {
                    type: 'user'
                },
                error: (xhr, status, err) => swal.fire({
                    title: 'Error',
                    // print the error
                    text: err,
                    icon: 'error'
                })
            },
            columns: [{
                    data: 'fullname'
                },
                {
                    data: 'department'
                },
                {
                    data: 'year'
                },
                {
                    data: 'cor'
                },
                {
                    data: 'email'
                },
                {
                    data: 'id',
                    render: function(data, type, row) {
                        return '<button class="btn btn-primary btn-sm">View</button>';
                    }
                }
            ],
            dom: 'Bfrtip'
        });

        $('#user_list tbody').on('click', 'button', function() {
            var data = table.row($(this).parents('tr')).data();
            window.location.href = "view.php?id=" + data[5];
        });
    })
</script>
