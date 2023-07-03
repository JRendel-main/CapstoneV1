var currentStep = 1;

function nextStep(next) {
    $('#step' + currentStep).hide();
    $('#step' + next).show();
    currentStep = next;
}

function prevStep(prev) {
    $('#step' + currentStep).hide();
    $('#step' + prev).show();
    currentStep = prev;
}


$(document).ready(function () {
    // Function to review the entered information before submission
    function reviewForm() {
        $('#reviewName').text($('#firstname').val() + ' ' + $('#middlename').val() + ' ' + $('#lastname').val());
        $('#reviewEmail').text($('#emailaddress').val());
        $('#reviewContact').text($('#contactnumber').val());
        $('#reviewDOB').text($('#birthdate').val());
        $('#reviewYear').text($('#year').val());
        $('#reviewSection').text($('#section').val());
        $('#reviewCourse').text($('#course').val());
        $('#reviewUsername').text($('#username').val());
        $('#reviewAccountType').text($('#accounttype').val());
    }

    // Step 1 form submission and validation
    $('#next1').click(function (event) {
        event.preventDefault();
        // Add custom validation here if needed
        nextStep(2);
    });

    // Step 2 form submission and validation
    $('#next2').click(function (event) {
        event.preventDefault();
        // Add custom validation here if needed
        nextStep(3);
    });

    // Step 3 form submission and validation
    $('#next3').click(function (event) {
        event.preventDefault();
        // Add custom validation here if needed
        nextStep(4);
    });

    // Step 4 form submission and validation
    $('#next4').click(function (event) {
        event.preventDefault();
        // Add custom validation here if needed
        nextStep(5);

        // check if all fields are filled if not go to step
        if ($('#firstname').val() == "" || $('#middlename').val() == "" || $('#lastname').val() == "" || $('#emailaddress').val() == "" || $('#contactnumber').val() == "" || $('#birthdate').val() == "" || $('#year').val() == "" || $('#section').val() == "" || $('#course').val() == "" || $('#username').val() == "" || $('#accounttype').val() == "") {
            prevStep(1);
            //use sweetalert2
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please fill all the fields!',
                footer: '<a href>Why do I have this issue?</a>'
            })
        }
        reviewForm();
    });

    // Step 2-4 form navigation
    $('#prev2').click(function (event) {
        event.preventDefault();
        prevStep(1);
    });

    $('#prev3').click(function (event) {
        event.preventDefault();
        prevStep(2);
    });

    $('#prev4').click(function (event) {
        event.preventDefault();
        prevStep(3);
    });

    // Step 5 form navigation
    $('#prev5').click(function (event) {
        event.preventDefault();
        prevStep(4);
    });

    // Form submission
    $('#signupForm').submit(function (event) {
        event.preventDefault();
        // Add form submission logic here (e.g., AJAX request)
        alert('Form submitted successfully!'); // For demo purposes
    });

    // validate password and confpassword
    $('#confpassword').keyup(function () {
        var password = $('#password').val();
        var confpassword = $('#confpassword').val();
        if (password != confpassword) {
            $('#message').html('Password not matched').css('color', 'red');
        } else {
            $('#message').html('Password matched').css('color', 'green');
        }
    });


});