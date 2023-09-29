<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/5.16.0/d3.min.js" integrity="sha512-FHsFVKQ/T1KWJDGSbrUhTJyS1ph3eRrxI228ND0EGaEp6v4a/vGwPWd3Dtd/+9cI7ccofZvl/wulICEurHN1pg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/c3/0.7.20/c3.min.js" integrity="sha512-+IpCthlNahOuERYUSnKFjzjdKXIbJ/7Dd6xvUp+7bEw0Jp2dg6tluyxLs+zq9BMzZgrLv8886T4cBSqnKiVgUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $(document).ready(function() {
            // Fetch and update total users for tutee, tutors, moderators, and overall total users
            $.ajax({
                type: "GET",
                url: "../../server/admin-dashboard/get-total-users.php",
                dataType: "json",
                success: function(data) {
                    $("#totalTutee").text(data.tutee);
                    $("#totalTutors").text(data.tutor);
                    $("#totalModerators").text(data.moderator);
                    $("#totalUsers").text(data.overall);
                    console.log(data);
                },
                error: function(xhr, status, error) {
                    console.error("Failed to fetch total users:", error);
                }
            });

            $.ajax({
                type: "GET",
                url: "../../server/admin-dashboard/get-total-courses.php",
                dataType: "json",
                success: function(data) {
                    // loop through the data
                    var chartData = [];
                    for (var i = 0; i < data.length; i++) {
                        chartData.push([data[i].course_name, data[i].enrollment_count]);
                    }

                    // Generate the pie chart
                    var chart = c3.generate({
                        bindto: '#course-chart',
                        data: {
                            columns: chartData,
                            type: 'pie',
                            onmouseover: function(d, element) { console.log('onmouseover', d, element); },
                            onmouseout: function(d, element) { console.log('onmouseout', d, element); },
                            // display value only
                            labels: true,
                            // format the value
                            label: {
                                format: function(value, ratio, id) {
                                    return value;
                                }
                            }
                        },
                        tooltip: {
                            format: {
                                value: function(value, ratio, id) {
                                    return value;
                                }
                            }
                        },
                        color: {
                            pattern: ['#4CAF50', '#FF9800', '#2196F3', '#9C27B0', '#F44336', '#E91E63', '#00BCD4', '#FFEB3B', '#795548', '#607D8B']
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Failed to fetch total courses:", error);
                }
            });

            $.ajax({
                type: "GET",
                url: "../../server/admin-dashboard/get-ranking.php",
                dataType: "json",
                success: function(data) {
                    // if the data array is not empty
                    if (data.length > 0) {
                        // initialize the table
                        var table = $("#rank").DataTable({
                            "data": data,
                            "columns": [
                                {
                                    title: "Rank",
                                    data: "rank"
                                },
                                {
                                    title: "Name",
                                    data: "fullname"
                                },
                                {
                                    title: "Points",
                                    data: "points"
                                },
                                {
                                    title: "Average Rating",
                                    data: "avg_rating"
                                }
                            ],
                            "order": [
                                [2, "desc"]
                            ],
                            "columnDefs": [{
                                "targets": [0, 1, 2, 3],
                                "className": "text-center"
                            }],
                            // remove search bar
                            "bFilter": false,
                            // remove pagination
                            "bLengthChange": false,
                            "bInfo": false,
                            // remove sorting
                            "bSort": false,
                            reponsive: true,
                        });
                    } else {
                        
                    }
                },
                error: function(xhr, status, error) {
                    swal.fire({
                        title: "Server Error",
                        text: "Failed to fetch ranking data",
                        icon: "error",
                        confirmButtonText: "Ok",
                    })
                }
            });
        });
    });
</script>