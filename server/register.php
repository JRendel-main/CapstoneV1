<?php
include_once('server/db-connect.php');
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
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
    $accountStatus = 0;

    // Insert data into tbl_peerinfo table
    $peerInfoQuery = "INSERT INTO tbl_peerinfo (firstname, middlename, lastname, email, contactnum, dob, gender, year, course) 
                    VALUES ('$firstName', '$middleName', '$lastName', '$email', '$contactNumber', '$birthdate', '$gender', '$year', '$course')";

    // Execute the query and get the inserted peer_id
    if (mysqli_query($conn, $peerInfoQuery)) {
        $peerId = mysqli_insert_id($conn);

        // Insert data into tbl_auth table with the associated peer_id
        $authQuery = "INSERT INTO tbl_auth (peer_id, username, password, cat_id, acc_status) 
                    VALUES ('$peerId', '$username', '$password', '$accountType', '$accountStatus')";

        if (mysqli_query($conn, $authQuery)) {
            $response = array('status' => 'success', 'message' => 'Registration successful');
            echo json_encode($response);
        } else {
            $response = array('status' => 'error', 'message' => 'An error occurred while inserting data into tbl_auth');
            echo json_encode($response);
        }
    } else {
        $response = array('status' => 'error', 'message' => 'An error occurred while inserting data into tbl_peerinfo');
        echo json_encode($response);
    }

    // Close the database connection
    mysqli_close($conn);
}
