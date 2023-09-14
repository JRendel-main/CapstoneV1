<?php 
require_once 'db-connect.php';

session_start();
$peer_id = $_SESSION['peer_id'];

$sql = "SELECT * FROM tbl_testimonials WHERE peer_id = $peer_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $response = array(
        'success' => true,
        'message' => 'You have already submitted a testimonial.'
    );
    echo json_encode($response);
} else {
    $response = array(
        'success' => false,
        'message' => 'You have not submitted a testimonial.'
    );
    echo json_encode($response);
}