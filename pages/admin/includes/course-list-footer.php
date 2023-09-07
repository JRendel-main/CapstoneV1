<script>
    $(document).ready(function() {
        $.ajax({
            url: "../../server/admin-dashboard/get-course-list.php",
            method: "POST",
            success: function(data) {
                console.log(data);
                $('#course-list').DataTable({
                    columns: [{
                            title: "Course ID",
                            data: "0"
                        },
                        {
                            title: "Course Name",
                            data: "1"
                        },
                        {
                            title: "Course Code",
                            data: "2"
                        },
                        {
                            title: "Action",
                            data: "3"
                        }
                    ],
                    // remove showing entries
                    "bLengthChange": false,
                    // remove search
                    "bFilter": false,
                    // replace if no data on table yet
                    "language": {
                        "emptyTable": "No courses yet."
                    },
                    data: data.data,
                    responsive: true
                });
            }
        })
        // edit course
        $('#edit-course-btn').click(function() {
            var course_id = $(this).data('course_id');
            console.log(course_id);
            // open modal
            $('#editCourseModal').modal('show');

        });

        $('#add-course-btn').click(function() {
            // add validation
            var courseName = $('#courseName').val();
            var courseAlias = $('#courseAlias').val();

            if (courseName == "" || courseAlias == "") {
                swal.fire({
                    title: 'Error!',
                    text: 'Please fill out all fields.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            } else {
                // collect data
                var courseData = {
                    courseName: courseName,
                    courseAlias: courseAlias
                };

                // send data to server
                $.ajax({
                    url: "../../server/admin-dashboard/add-course.php",
                    method: "POST",
                    data: courseData,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == "success") {
                            swal.fire({
                                title: 'Success!',
                                text: 'Course added successfully.',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            });
                            // refresh the page
                            location.reload();
                        } else {
                            swal.fire({
                                title: 'Error!',
                                text: 'An error occurred while adding course.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    },
                    error: function() {
                        swal.fire({
                            title: 'Error!',
                            text: 'An error occurred while adding course.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            }
        });

    });
</script>