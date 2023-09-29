<?php 
require_once 'db-connect.php';

$sql = "SELECT * FROM tbl_testimonials WHERE status = 1";
$result = $conn->query($sql);
$response = array();

if ($result-> num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $testimonial = $row['message'];
        $peer_id = $row['peer_id'];

        $sql = "SELECT * FROM tbl_peerinfo WHERE peer_id = $peer_id";
        $result2 = $conn->query($sql);
        $row2 = $result2->fetch_assoc();
        $fullname = $row2['firstname'] . ' ' . $row2['lastname'];
        $image = $row2['profile'];
        // remove the "../../" on image
        $image = str_replace('../../', '', $image);
        $course = $row2['course'];

        $sql = "SELECT * FROM tbl_course WHERE course_id = $course";
        $result3 = $conn->query($sql);
        $row3 = $result3->fetch_assoc();
        $course = $row3['course_alias'];
        // capitalize 
        $course = strtoupper($course);

        // put to response array now
        $testimonials[] = array(
            'testimonial' => $testimonial,
            'fullname' => $fullname,
            'image' => $image,
            'course' => $course
        );






    }
    echo json_encode($testimonials);
} else {
    echo "0 results";
}