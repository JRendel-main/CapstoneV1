<?php
// get the data from session
session_start();
$username = $_SESSION['username'];
$cat_id = $_SESSION['cat_id'];

// if not logged in yet alert user and redirect to login page
if (!isset($_SESSION['username'])) {
    $response = array(
        'status' => 'error',
        'message' => 'You need to login first!'
    );
    echo json_encode($response);
    header("Location: ../login.php");
    exit;
}
?>
