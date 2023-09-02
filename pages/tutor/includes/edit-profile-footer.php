<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js" integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../../assets/libs/select2/select2.min.js"></script>
<script>
    $('#dropdown-course').select2({
        placeholder: 'Select an option',
        allowClear: true,
        responsive: true
    });
    $('#expertiseDropdown').select2({
        tags: true, // Allow adding new tags
        tokenSeparators: [','], // Separator for multiple tags
        placeholder: 'Select skills or add new ones',
        responsive: true
    });
    // Function to fetch and populate tutor's profile
    function fetchTutorProfile() {
        $.ajax({
            url: '../../server/tutor/fetch-edit-profile.php',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#profile-pic').attr('src', 'https://ui-avatars.com/api/?name=' + data.firstname + '+' + data.lastname + '&rounded=true&size=128&background=4F46E5&color=fff&font-size=0.33');
                // Populate profile data
                $('#firstname').val(data.firstname);
                $('#middlename').val(data.middlename);
                $('#lastname').val(data.lastname);
                $('#userbio').val(data.bio);
                $('#useremail').val(data.email);
                $('#contactnum').val(data.contact);

                $('#title-name').html(data.firstname + ' ' + data.middlename + ' ' + data.lastname);

                $('#fullname').html('<strong>Full Name :</strong> ' + data.firstname + ' ' + data.lastname);
                $('#email').html('<strong>Email :</strong> ' + data.email);
                $('#contactnum-title').html('<strong>Contact :</strong> ' + data.contact);
                if(data.year == 'first_year') {
                    $('#year').html('<strong>Year :</strong> First Year');
                    // for dropdown year-select
                    $('#dropdown-year').val('first_year').trigger('change');
                } else if(data.year == 'second_year') {
                    $('#year').html('<strong>Year :</strong> Second Year');
                    $('#dropdown-year').val('second_year').trigger('change');
                } else if(data.year == 'third_year') {
                    $('#year').html('<strong>Year :</strong> Third Year');
                    $('#dropdown-year').val('third_year').trigger('change');
                } else if(data.year == 'fourth_year') {
                    $('#year').html('<strong>Year :</strong> Fourth Year');
                    $('#dropdown-year').val('fourth_year').trigger('change');
                } else if(data.year == 'fifth_year') {
                    $('#year').html('<strong>Year :</strong> Fifth Year');
                    $('#dropdown-year').val('fifth_year').trigger('change');
                } else if(data.year == 'graduated') {
                    $('#year').html('<strong>Year :</strong> Graduated');
                } else {
                    $('#year').html('<strong>Year :</strong> ' + data.year);
                }

                if (data.course == 'bsit') {
                    $('#title-course').html('Information Technology');
                }
                // Show profile info
                $('#profile-info').show();

                // split the expertise into array of strings the data are separated by comma
                var expertise = data.expertise.split(',');

                // loop through the array of expertise
                for (var i = 0; i < expertise.length; i++) {
                    // create an option element
                    var option = document.createElement('option');
                    // set the value of the option element
                    option.value = expertise[i];
                    // set the text of the option element
                    option.text = expertise[i];
                    // append the option element to the select element
                    $('#expertiseDropdown').append(option);
                    // put as selected
                    $('#expertiseDropdown').val(expertise).trigger('change');
                }
            },
            error: function() {
                swal.fire({
                    title: 'Error!',
                    text: 'An error occurred while fetching profile.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                })
            }
        });
    }

    // Fetch and populate tutor's profile on page load
    fetchTutorProfile();

    // Enable editing
    $('#edit-profile-btn').click(function() {
        $('input, textarea, select').prop('disabled', false);
    });

    // Save edited profile
    $('#save-profile-btn').click(function() {
        // Collect edited data
        var editedData = {
            firstname: $('#firstname').val(),
            middlename: $('#middlename').val(),
            lastname: $('#lastname').val(),
            bio: $('#userbio').val(),
            email: $('#useremail').val(),
            contactnum: $('#contactnum').val(),
            course: $('#dropdown-course').val(),
            year: $('#year-select').val(),
            // get the expertise from the select element and join them with comma
            expertise: $('#expertiseDropdown').val().join(','),

        };
        console.log(editedData);

        // Save edited data using AJAX
        $.ajax({
            url: '../../server/tutor/edit-profile.php',
            method: 'POST',
            data: editedData,
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    // Update success message
                    swal.fire({
                        title: 'Success!',
                        text: 'Profile updated successfully.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                    //refresh the page
                    location.reload();
                } else {
                    // Update error message
                    swal.fire({
                        title: 'Error!',
                        text: 'An error occurred while updating profile.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            },
            error: function() {
                swal.fire({
                    title: 'Error!',
                    text: 'An error occurred while updating profile.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        });

        // Disable editing
        $('input, textarea, select').prop('disabled', true);
    });
</script>