<?php
require_once '../db-connect.php';

$sched_id = $_POST['sched_id'];
$enrolled = $_POST['enrolled'];
$max_tutee = $_POST['max_tutee'];

$sql = "SELECT * FROM tbl_request WHERE schedule_id = $sched_id AND request_status = 0";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $data = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $request_id = $row['request_id'];
        $tutee_id = $row['tutee_id'];
        $request_status = $row['request_status'];

        // get the tutee info
        $sql2 = "SELECT * FROM tbl_peerinfo WHERE peer_id = $tutee_id";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);

        $fname = $row2['firstname'];
        $lname = $row2['lastname'];
        $email = $row2['email'];
        $contact = $row2['contactnum'];
        $course = $row2['course'];
        $year = $row2['year'];
        $profile_pic = $row2['profile'];

        $sql3 = "SELECT course_name FROM tbl_course WHERE course_id = $course";
        $result3 = mysqli_query($conn, $sql3);
        $row3 = mysqli_fetch_assoc($result3);
        $course = $row3['course_name'];

        $data[] = array(
            'request_id' => $request_id,
            'tutee_id' => $tutee_id,
            'fname' => $fname,
            'lname' => $lname,
            'email' => $email,
            'contact' => $contact,
            'course' => $course,
            'year' => $year,
            'profile_pic' => $profile_pic,
            'status' => $request_status,
            'enrolled' => $enrolled,
            'max_tutee' => $max_tutee
        );
    }
} else {
    $data = array();
}
echo json_encode($data);
?>