$(document).ready(function() {
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

    if (firstName === "" || middleName === "" || lastName === "" || email === "" || contactNumber === "" || birthdate === "" || gender === "") {
      Swal.fire("Error", "Please fill in all the fields", "error");
      return;
    }

    // Move to next step
    $("#step1").hide();
    $("#step2").show();
  });

  // Step 2: Academic Information
  $("#next2").click(function(e) {
    e.preventDefault();

    // Validate form inputs
    var year = $("#year").val();
    var section = $("#section").val();
    var course = $("#course").val();

    if (year === null || section === null || course === null) {
      Swal.fire("Error", "Please select all the options", "error");
      return;
    }

    // Move to next step
    $("#step2").hide();
    $("#step3").show();
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
      url: "server/check_username.php",
      data: { username: username },
      success: function(response) {
        var responseData = JSON.parse(response);

        if (responseData.available) {
          // Move to next step
          $("#step3").hide();
          $("#step4").show();
        } else {
          Swal.fire("Error", responseData.message, "error");
        }
      },
      error: function(xhr, status, error) {
        Swal.fire("Error", "An error occurred while checking the username availability", "error");
      }
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
  $("#submit").click(function(e) {
    e.preventDefault();

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
      username: $("#username").val(),
      password: $("#password").val(),
      accountType: $("#accounttype").val()
    };
    console.log(formData);
    var submitBtn = $(this);
    submitBtn.prop("disabled", true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...');

    // Send form data to PHP server using AJAX
    $.ajax({
      type: "POST",
      url: "server/register.php",
      data: formData,
      success: function(response) {
        var responseData = JSON.parse(response);

        if (responseData.status === "success") {
          // Enable the submit button and hide loading state
          submitBtn.prop("disabled", false).text("Sign Up");
          Swal.fire({
            title: "Success",
            text: responseData.message,
            icon: "success",
            onClose: function() {
              window.location.href = "login.php";
            }
          });
        } else {
          Swal.fire("Error", responseData.message, "error");
        }
      },
      error: function(xhr, status, error) {
        Swal.fire("Error", "An error occurred while submitting the form", "error");
      }
    });
  });
});
