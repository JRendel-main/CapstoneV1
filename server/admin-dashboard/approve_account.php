<?php
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming the server-side validation and authentication have already been performed.
    
    // Retrieve the peerid from the POST data
    $peerid = $_POST['peerid'];

    require_once '../db-connect.php';

    $sql = "UPDATE tbl_auth SET acc_status = 1 WHERE peer_id = $peerid";
    $result = mysqli_query($conn, $sql);

    $sql2 = "SELECT firstname, middlename, lastname FROM tbl_peerinfo WHERE $peerid = peer_id";
    $result2 = mysqli_query($conn, $sql2);
    $row = mysqli_fetch_assoc($result2);
    $name = $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'];

    if ($result) {
        echo "Account of <b>$name</b> has been approved.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // If the request is not a POST request, return an error message
    http_response_code(405); // Method Not Allowed
    echo "Only POST requests are allowed.";
}
?>
