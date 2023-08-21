<?php
include_once 'db-connect.php';

// Get the username from the AJAX request
$username = $_POST['username'];

// Check if the username already exists in tbl_auth
$sql = "SELECT username FROM tbl_auth WHERE username = '$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $response = array(
        'available' => false,
        'message' => 'The username is already taken. Please choose a different username.'
    );
} else {
    $response = array(
        'available' => true,
        'message' => 'Username is available.'
    );
}

// Return the response as JSON
echo json_encode($response);

// Close the database connection
mysqli_close($conn);
?>
