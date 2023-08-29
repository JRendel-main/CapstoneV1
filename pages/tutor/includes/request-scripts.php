<script>
    $(document).ready(function() {
        var data = [
        {
            topic: 'Math Tutoring',
            description: 'Algebra and Geometry',
            date: '2023-08-15',
            time: '14:00 - 16:00',
            availableSlot: '3 / 3',
            status: '<span class="badge badge-pill badge-danger">Full</span>',
            option: '<button class="btn btn-success btn-rounded"><i class="fa fa-cog"></i></button>'
        }

    ];
        $('#pending-table').DataTable({
            data: data,
            columns: [
                { data: 'topic' },
                { data: 'date' },
                { data: 'time' },
                { data: 'availableSlot' },
                { data: 'status' },
                { data: 'option' }
            ],

        });
    });
</script>