<?php
date_default_timezone_set('Asia/Manila');
require_once 'server/db-connect.php';
// Start the session
session_start();
// Logout script
$peer_id = $_SESSION['peer_id'];
$dateTime = date('Y-m-d H:i:s');

$action = 'Logout';

$sql = "INSERT INTO tbl_logs (peer_id, action, date) VALUES ('$peer_id', '$action', '$dateTime')";
mysqli_query($conn, $sql);

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();


// Redirect the user to the login page
header("Location: login.php");
exit;
