<?php 
require_once '../db-connect.php';
// get the post
$testimonial_id = $_POST['testimonial_id'];

// update the testimonial status
$sql = "UPDATE tbl_testimonials SET status = 1 WHERE testimonial_id = '$testimonial_id'";
$result = mysqli_query($conn, $sql);

// check if the query is successful
if ($result) {
    echo json_encode('success');
} else {
    echo json_encode('error');
}