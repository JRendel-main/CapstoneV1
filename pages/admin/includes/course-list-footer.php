<script>
    $(document).ready(function() {
        loadCourseList();
        addCourse();

        function makeAjaxRequest(url, method, data, successCallback, errorCallback) {
            $.ajax({
                url: url,
                method: method,
                data: data,
                dataType: "json",
                success: successCallback,
                error: errorCallback
            });
        }

        function showError(message) {
            swal.fire({
                title: 'Error!',
                text: message,
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }

        function showSuccess(message) {
            swal.fire({
                title: 'Success!',
                text: message,
                icon: 'success',
                confirmButtonText: 'OK'
            });
        }



        function loadCourseList() {
            $.ajax({
                url: "../../server/admin-dashboard/get-course-list.php",
                method: "POST",
                success: function(data) {
                    console.log(data);
                    for (var i = 0; i < data.data.length; i++) {
                        data.data[i].push('<button class="btn btn-primary btn-sm edit-course-btn" data-toggle="modal" data-target="#editCourseModal" data-id="' + data.data[i][0] + '" data-name="' + data.data[i][1] + '" data-alias="' + data.data[i][2] + '">Edit</button> <button class="btn btn-danger btn-sm delete-course-btn" data-id="' + data.data[i][0] + '">Delete</button>');
                    }
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
                        "bLengthChange": false,
                        "bFilter": false,
                        "language": {
                            "emptyTable": "No courses yet."
                        },
                        data: data.data,
                        responsive: true
                    });
                }
            });
        }

        function addCourse() {
            $('#add-course-btn').click(function() {
                var courseName = $('#courseName').val();
                var courseAlias = $('#courseAlias').val();

                if (courseName == "" || courseAlias == "") {
                    showError('Please fill out all fields.');
                } else {
                    var courseData = {
                        courseName: courseName,
                        courseAlias: courseAlias
                    };

                    makeAjaxRequest(
                        "../../server/admin-dashboard/add-course.php",
                        "POST",
                        courseData,
                        function(response) {
                            if (response.status == "success") {
                                showSuccess('Course added successfully.');
                                location.reload();
                            } else {
                                showError('An error occurred while adding course.');
                            }
                        },
                        function() {
                            showError('An error occurred while adding course.');
                        }
                    );
                }
            });
        }

        $('#course-list').on('click', '.edit-course-btn', function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var alias = $(this).data('alias');

            $('#editCourseName').val(name);
            $('#editCourseAlias').val(alias);

            $('#saveCourseChanges').click(function() {
                var newName = $('#editCourseName').val();
                var newAlias = $('#editCourseAlias').val();

                var courseData = {
                    id: id,
                    name: newName,
                    alias: newAlias
                };

                makeAjaxRequest(
                    "../../server/admin-dashboard/edit-course.php",
                    "POST",
                    courseData,
                    function(response) {
                        if (response.status == "success") {
                            showSuccess('Course edited successfully.');
                            location.reload();
                        } else {
                            showError('An error occurred while editing course.');
                        }
                    },
                    function() {
                        showError('An error occurred while editing course.');
                    }
                );
            });
        });

        $('#course-list').on('click', '.delete-course-btn', function() {
            var id = $(this).data('id');

            swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancel',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    var courseData = {
                        id: id
                    };

                    makeAjaxRequest(
                        "../../server/admin-dashboard/delete-course.php",
                        "POST",
                        courseData,
                        function(response) {
                            if (response.status == "success") {
                                showSuccess('Course deleted successfully.');
                                location.reload();
                            } else {
                                showError('An error occurred while deleting course.');
                            }
                        },
                        function() {
                            showError('An error occurred while deleting course.');
                        }
                    );
                }
            });
        });
    });
</script>