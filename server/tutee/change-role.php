<?php 
require_once '../db-connect.php';
session_start();
$peer_id = $_SESSION['peer_id'];

$sql = "UPDATE tbl_auth SET cat_id = 2 WHERE peer_id = '$peer_id'";
$result = mysqli_query($conn, $sql);

if ($result) {
    $data = array(
        'status' => 'success',
        'message' => 'You are now a Tutor.'
    );
    echo json_encode($data);
} else {
    $data = array(
        'status' => 'error',
        'message' => 'Something went wrong.'
    );
    echo json_encode($data);
}