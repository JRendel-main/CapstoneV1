<script>
    $(document).ready(function() {

        function switchStep(fstep, lstep) {
            $("#step" + fstep).hide();
            $("#step" + lstep).show();
        };
        // Step 1: Personal Information
        $("#next1").click(function(e) {
            e.preventDefault();

            // Validate form inputs
            var firstName = $("#firstname").val();
            var middleName = $("#middlename").val();
            var lastName = $("#lastname").val();
            var email = $("#emailaddress").val();
            var contactNumber = $("#contactnumber").val();
            var birthdate = $("#birthdate").val();
            var gender = $("#gender").val();
            var cor = $("#cor").val();

            if (
                firstName === "" ||
                middleName === "" ||
                lastName === "" ||
                email === "" ||
                contactNumber === "" ||
                birthdate === "" ||
                gender === ""
            ) {
                Swal.fire("Error", "Please fill in all the fields", "error");
                return;
            }

            // Move to next step
            switchStep(1, 2);
            // fetch the courses
            $.ajax({
                url: "server/admin-dashboard/get-course-list.php",
                method: "POST",
                success: function(data) {
                    var courses = data.data;
                    var selectElement = document.getElementById("course");
                    var groupedCourses = {};

                    for (var i = 0; i < courses.length; i++) {
                        var course = courses[i];
                        var courseAlias = course[2]; // Assuming course[2] is the course alias

                        // Create an optgroup element for each unique course alias
                        if (!groupedCourses[courseAlias]) {
                            var optgroup = document.createElement("optgroup");
                            optgroup.label = courseAlias;
                            groupedCourses[courseAlias] = optgroup;
                        }

                        // Create an option element for the course and append it to the corresponding optgroup
                        var option = document.createElement("option");
                        option.value = course[0]; // Assuming course[0] is the course_id
                        option.text = course[1]; // Assuming course[1] is the course_name
                        groupedCourses[courseAlias].appendChild(option);
                    }

                    // Append the optgroups to the select element
                    for (var alias in groupedCourses) {
                        if (groupedCourses.hasOwnProperty(alias)) {
                            selectElement.appendChild(groupedCourses[alias]);
                        }
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire(
                        "Error",
                        "An error occurred while fetching the courses",
                        "error"
                    );
                },
            });
        });

        // Step 2: Academic Information
        $("#next2").click(function(e) {
            e.preventDefault();

            // Validate form inputs
            var year = $("#year").val();
            var section = $("#section").val();
            var course = $("#course").val();
            var cor = $("#cor").val();

            if (year === null || section === null || course === null) {
                Swal.fire("Error", "Please select an option for all the fields", "error");
                return;
            }

            if (cor === null) {
                Swal.fire("Error", "Please upload updated COR", "error");
                return;
            }

            // Move to next step
            switchStep(2, 3);
        });

        // Step 3: Account Information
        $("#next3").click(function(e) {
            e.preventDefault();

            // Validate form inputs
            var username = $("#username").val();
            var password = $("#password").val();
            var confirmPassword = $("#confirmpassword").val();

            if (username === "" || password === "" || confirmPassword === "") {
                Swal.fire("Error", "Please fill in all the fields", "error");
                return;
            }

            if (password !== confirmPassword) {
                Swal.fire("Error", "Passwords do not match", "error");
                return;
            }

            // Check username availability
            $.ajax({
                type: "POST",
                url: "server/check-username.php",
                data: {
                    username: username
                },
                success: function(response) {
                    var responseData = JSON.parse(response);

                    if (responseData.available) {
                        // Move to next step
                        switchStep(3, 4);
                    } else {
                        Swal.fire("Error", responseData.message, "error");
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire(
                        "Error",
                        "An error occurred while checking the username availability",
                        "error"
                    );
                },
            });
        });

        // Step 4: Type of Account
        $("#next4").click(function(e) {
            e.preventDefault();

            // Validate form inputs
            var accountType = $("#accounttype").val();

            if (accountType === null) {
                Swal.fire("Error", "Please select an account type", "error");
                return;
            }

            // Move to next step
            $("#step4").hide();
            $("#step5").show();
        });

        // Step 5: Review and Terms of Service
        $("#next4").click(function(e) {
            e.preventDefault();

            // Get the form field values
            var firstName = $("#firstname").val();
            var middleName = $("#middlename").val();
            var lastName = $("#lastname").val();
            var email = $("#emailaddress").val();
            var contactNumber = $("#contactnumber").val();
            var birthdate = $("#birthdate").val();
            var year = $("#year option:selected").text();
            var section = $("#section option:selected").text();
            var course = $("#course option:selected").text();
            var username = $("#username").val();
            var accountType = $("#accounttype option:selected").text();
            // get the file
            var file = $("#cor").val();

            // Display the form field values
            $("#reviewName").text(firstName + " " + middleName + " " + lastName);
            $("#reviewEmail").text(email);
            $("#reviewContact").text(contactNumber);
            $("#reviewDOB").text(birthdate);
            $("#reviewYear").text(year);
            $("#reviewSection").text(section);
            $("#reviewCourse").text(course);
            $("#reviewUsername").text(username);
            $("#reviewAccountType").text(accountType);

            // Show the review section
            $("#step5").show();
        });

        // Step 5: Previous button
        $("#prev5").click(function(e) {
            e.preventDefault();

            // Move to previous step
            $("#step5").hide();
            $("#step4").show();
        });

        // Submit form
        // Submit form
        $("#submit").click(function(e) {
            e.preventDefault();
            var firstname = $('#firstname').val();
            var middlename = $('#middlename').val();
            var lastname = $('#lastname').val();
            var name = firstname + ' ' + middlename + ' ' + lastname;
            var file = $("#cor").prop("files")[0];

            if (file) {
                var filename = new FormData(); // Create a new FormData object
                filename.append("file", file);
                filename.append("name", name);

                $.ajax({
                    url: "server/uploadCOR.php",
                    type: "POST",
                    data: filename,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        var responseData = JSON.parse(response);
                        if (responseData.status === "success") {
                            var fileName = responseData.fileName;
                            // Gather form data
                            var formData = {
                                firstName: $("#firstname").val(),
                                middleName: $("#middlename").val(),
                                lastName: $("#lastname").val(),
                                email: $("#emailaddress").val(),
                                contactNumber: $("#contactnumber").val(),
                                birthdate: $("#birthdate").val(),
                                gender: $("#gender").val(),
                                year: $("#year").val(),
                                section: $("#section").val(),
                                course: $("#course").val(),
                                cor: fileName,
                                username: $("#username").val(),
                                password: $("#password").val(),
                                accountType: $("#accounttype").val(),
                            };
                            console.log(formData);
                            var submitBtn = $(this);
                            submitBtn
                                .prop("disabled", true)
                                .html(
                                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...'
                                );

                            $.ajax({
                                type: "POST",
                                url: "server/register.php",
                                data: formData,
                                success: function(response) {
                                    var responseData = JSON.parse(response);

                                    if (responseData.status === "success") {
                                        // Enable the submit button and hide loading state
                                        submitBtn.prop("disabled", false).text("Sign Up");
                                        swal.fire({
                                            title: "Success",
                                            text: responseData.message,
                                            icon: "success"
                                        });
                                        // Redirect to login page
                                        setTimeout(function() {
                                            window.location.href = "login.php";
                                        }, 3000);
                                    } else {
                                        Swal.fire("Error", responseData.message, "error");
                                    }
                                },
                                error: function(xhr, status, error) {
                                    Swal.fire(
                                        "Error",
                                        "An error occurred while submitting the form",
                                        "error"
                                    );
                                },
                            });

                        } else {
                            // Handle error
                            swal.fire({
                                title: "Error",
                                text: responseData.message,
                                icon: "error",
                            });
                            // go back to step 2
                            switchStep(5, 2);
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        swal.fire({
                            title: "Error",
                            text: "An error occurred while uploading the file",
                            icon: "error",
                        });

                        // go back to step 2
                        $("#step5").hide();
                        $("#step2").show();
                    }
                });
            } else {
                // Handle no file selected
            }
        });

        // Step 2: Previous button
        $("#prev2").click(function(e) {
            e.preventDefault();

            // Move to previous step
            $("#step2").hide();
            $("#step1").show();
        });

        // Step 3: Prev button
        $("#prev3").click(function(e) {
            e.preventDefault();

            // Move to previous step
            $("#step3").hide();
            $("#step2").show();
        });

        // Step 4: Prev button
        $("#prev4").click(function(e) {
            e.preventDefault();

            // Move to previous step
            $("#step4").hide();
            $("#step3").show();
        });
    });
</script>