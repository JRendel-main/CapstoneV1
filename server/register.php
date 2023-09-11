<?php
include_once 'db-connect.php';
require_once '../send-email.php';
// Get the form data
$firstName = $_POST['firstName'];
$middleName = $_POST['middleName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$contactNumber = $_POST['contactNumber'];
$birthdate = $_POST['birthdate'];
$gender = $_POST['gender'];
$year = $_POST['year'];
$section = $_POST['section'];
$course = $_POST['course'];
$username = $_POST['username'];
$password = $_POST['password'];
$accountType = $_POST['accountType'];
$cor = $_POST['cor'];

// Insert data into tbl_peerinfo
$sql1 = "INSERT INTO tbl_peerinfo (firstname, middlename, lastname, email, contactnum, dob, gender, year, course, cor)
         VALUES ('$firstName', '$middleName', '$lastName', '$email', '$contactNumber', '$birthdate', '$gender', '$year', '$course', '$cor')";

if (mysqli_query($conn, $sql1)) {
    $peerId = mysqli_insert_id($conn);

    // Insert data into tbl_auth
    $sql2 = "INSERT INTO tbl_auth (peer_id, username, password, cat_id, acc_status)
             VALUES ('$peerId', '$username', '$password', '$accountType', 'active')";

    if (mysqli_query($conn, $sql2)) {
        $response = array(
            'status' => 'success',
            'message' => 'Registration successful.'
        );
        $to = $email;
        $subject = "Account Registration";
        $type = "Registration: $accountType";
        $message = "Hello $firstName $lastName! Your account has been registered. Please wait for Admin to Review your Registration.";
        sendEmail($to, $subject, $type, $message);
        
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Error: ' . mysqli_error($conn)
        );
    }
} else {
    $response = array(
        'status' => 'error',
        'message' => 'Error: ' . mysqli_error($conn)
    );
}

// Close the database connection
mysqli_close($conn);

// Return the response as JSON
echo json_encode($response);
?>
