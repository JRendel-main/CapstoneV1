$(document).ready(function() {
    // Sample data
    var sampleData = [
        { department: "BSIT", users: 50 },
        { department: "BSBA", users: 30 },
        { department: "BSE", users: 40 },
        { department: "BSA", users: 35 },
        { department: "COED", users: 25 },
        { department: "Economics", users: 20 },
    ];

    // Populate the Morris Donut Chart
    var morrisDonutData = [];
    for (var i = 0; i < sampleData.length; i++) {
        morrisDonutData.push({ label: sampleData[i].department, value: sampleData[i].users });
    }

    new Morris.Donut({
        element: 'morris-donut-example',
        data: morrisDonutData,
        colors: ['#007bff', '#00c5fb', '#f9c851', '#4e66f8', '#f77eb9']
    });

    // Populate the department list
    var departmentList = '';
    for (var i = 0; i < sampleData.length; i++) {
        departmentList += '<span class="mx-2"><i class="mdi mdi-checkbox-blank-circle text-primary"></i>' + sampleData[i].department + '</span>';
    }
    $('#department-list').html(departmentList);
});
