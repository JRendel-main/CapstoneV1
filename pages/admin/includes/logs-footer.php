<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/5.16.0/d3.min.js" integrity="sha512-FHsFVKQ/T1KWJDGSbrUhTJyS1ph3eRrxI228ND0EGaEp6v4a/vGwPWd3Dtd/+9cI7ccofZvl/wulICEurHN1pg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/c3/0.7.20/c3.min.js" integrity="sha512-+IpCthlNahOuERYUSnKFjzjdKXIbJ/7Dd6xvUp+7bEw0Jp2dg6tluyxLs+zq9BMzZgrLv8886T4cBSqnKiVgUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $.ajax({
            url: "../../server/admin-dashboard/get-logs.php",
            method: "GET",
            success: function(response) {
                var data = JSON.parse(response);
                var logs = data.logs;
                var chart = data.chart;
                var table = $('#logs').DataTable({
                    columns: [
                        {
                            title: 'Role',
                            data: 'role'
                        },
                        {
                            title: 'Name',
                            data: 'name'
                        },
                        {
                            title: 'Date',
                            data: 'date'
                        },
                        {
                            title: 'Log',
                            data: 'action'
                        }
                    ],
                    data: logs,
                    "order": [[ 2, "desc" ]]
                });
                var chart = c3.generate({
                    bindto: '#chart',
                    data: {
                        json: chart,
                        keys: {
                            x: 'date',
                            value: ['count']
                        },
                        type: 'bar'
                    },
                    axis: {
                        x: {
                            type: 'category'
                        }
                    }
                });
            }
        });
        
    });
</script>