<?php
require_once '../db-connect.php';

$response = array();

$sql = "SELECT * FROM tbl_peerinfo a, tbl_tutor_profile b WHERE a.peer_id = b.peer_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $response['status'] = 'success';
    $response['tutors'] = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $peer_id = $row['peer_id'];
        $fullname = $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'];
        $expertise = ['Computer Science', 'Information Technology', 'Information Systems'];
        $department = $row['department'];
        $rating = 4.5;
        $tutee_count = 10;

        $tutor = array(
            'peer_id' => $peer_id,
            'fullname' => $fullname,
            'expertise' => $expertise,
            'department' => $department,
            'rating' => $rating,
            'tutee_count' => $tutee_count
        );

        array_push($response['tutors'], $tutor);
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'No tutors found.';
}