<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-1.13.6/b-2.4.1/b-colvis-2.4.1/b-html5-2.4.1/b-print-2.4.1/date-1.5.1/fc-4.3.0/fh-3.4.0/kt-2.10.0/r-2.5.0/sc-2.2.0/sb-1.5.0/sp-2.2.0/sl-1.7.0/datatables.min.js"></script>

<script>
$(document).ready(function() {
    var table = $('#user_list').DataTable({
        responsive: true,
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copy',
                text: '<i class="fa fa-copy"></i> Copy',
                className: 'btn btn-primary btn-sm'
            },
            {
                extend: 'excel',
                text: '<i class="fa fa-file-excel"></i> Excel',
                className: 'btn btn-primary btn-sm'
            },
            {
                extend: 'pdf',
                text: '<i class="fa fa-file-pdf"></i> PDF',
                className: 'btn btn-primary btn-sm'
            },
            {
                extend: 'print',
                text: '<i class="fa fa-print"></i> Print',
                className: 'btn btn-primary btn-sm'
            },
            {
                extend: 'colvis',
                text: '<i class="fa fa-eye"></i> Column Visibility',
                className: 'btn btn-primary btn-sm'
            }
        ],
        "order": [[ 0, "desc" ]],
        "language": {
            "emptyTable": "No data available in table"
        }
    });

    // Open modal when the "Open Modal" button is clicked
    $('#user_list tbody').on('click', '#openModalButton', function() {
        var row = table.row($(this).closest('tr'));
        var data = row.data(); // You can access row data here

        // Add your modal opening code here, using the data as needed
        // For example, if you're using Bootstrap modals:
        // $('#myModal').modal('show');
    });
});

</script>
