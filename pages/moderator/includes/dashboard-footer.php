<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/5.16.0/d3.min.js" integrity="sha512-FHsFVKQ/T1KWJDGSbrUhTJyS1ph3eRrxI228ND0EGaEp6v4a/vGwPWd3Dtd/+9cI7ccofZvl/wulICEurHN1pg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/c3/0.7.20/c3.min.js" integrity="sha512-+IpCthlNahOuERYUSnKFjzjdKXIbJ/7Dd6xvUp+7bEw0Jp2dg6tluyxLs+zq9BMzZgrLv8886T4cBSqnKiVgUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $.ajax({
        url: "../../server/moderator/dashboard.php",
        method: "GET",
        success: function(data) {
            var data = JSON.parse(data);
            var totalTutee = data.totalTutee;
            var totalTutor = data.totalTutor;
            var totalSched = data.totalSched;

            $("#totalTutee").html(totalTutee);
            $("#totalTutor").html(totalTutor);
            $("#totalSched").html(totalSched);

            var chart = c3.generate({
                bindto: '#chart',
                data: {
                    columns: [
                        ['Total Tutee', totalTutee],
                        ['Total Tutor', totalTutor]
                    ],
                    type: 'pie'
                },
                bar: {
                    width: {
                        ratio: 0.5
                    }
                },
                axis: {
                    x: {
                        type: 'category',
                        categories: ['Total Tutee', 'Total Tutor']
                    }
                }
            });
            // line chart for date of schedules
            var chart = c3.generate({
                bindto: '#chart2',
                data: {
                    json: data.sched,
                    keys: {
                        x: 'date',
                        value: ['sched']
                    },
                    type: 'bar'
                },
                bar: {
                    width: {
                        ratio: 0.5
                    }
                },
                axis: {
                    x: {
                        type: 'category',
                        categories: data.sched.map(function(d) {
                            return d.date;
                        })
                    }
                }
            });
        }
    });
</script>