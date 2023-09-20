<?php 
require_once 'db-connect.php';

$testimonial = $_POST['testimonial'];

session_start();
$peer_id = $_SESSION['peer_id'];
$status = 0;

// insert to tbl_testimonials
$sql = "INSERT INTO tbl_testimonials (peer_id, message, status) VALUES ($peer_id, '$testimonial', $status)";
$result = mysqli_query($conn, $sql);

if ($result) {
    $response = array(
        'success' => 'success',
        'message' => 'Testimonial submitted successfully.'
    );
    echo json_encode($response);
} else {
    $response = array(
        'success' => 'failed',
        'message' => 'Failed to submit testimonial.'
    );
    echo json_encode($response);
}