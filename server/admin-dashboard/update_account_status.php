<?php
// Replace database credentials with your own
require_once '../db-connect.php';
// Retrieve data from AJAX request
$username = $_POST['username'];
$status = $_POST['status'];

// Update the account status in tbl_auth
$sql = "UPDATE tbl_auth SET acc_status = $status WHERE username = '$username'";
$result = $conn->query($sql);

// Close connection
$conn->close();

// Send JSON response indicating success or failure
if ($result) {
    echo json_encode(array('success' => true));
} else {
    echo json_encode(array('success' => false));
}
?>
