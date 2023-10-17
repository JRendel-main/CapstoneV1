<?php
require_once '../db-connect.php';
require_once '../../send-email.php';

$request_id = $_POST['request_id'];

$sql = "UPDATE tbl_request SET request_status = 4 WHERE request_id = $request_id";
$result = mysqli_query($conn, $sql);

// send back the data to ajax
if ($result) {
    echo json_encode(array('status' => 'success'));

    // send email to tutee
    $sql2 = "SELECT * FROM tbl_request WHERE request_id = $request_id";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($result2);

    $tutee_id = $row2['tutee_id'];
    $schedule_id = $row2['schedule_id'];

    $sql3 = "SELECT * FROM tbl_peerinfo WHERE peer_id = $tutee_id";
    $result3 = mysqli_query($conn, $sql3);
    $row3 = mysqli_fetch_assoc($result3);

    $tutee_email = $row3['email'];

    $sql4 = "SELECT * FROM tbl_schedules WHERE sched_id = $schedule_id";
    $result4 = mysqli_query($conn, $sql4);
    $row4 = mysqli_fetch_assoc($result4);

    $topic = $row4['title'];

    $to = $tutee_email;
    $subject = "Request Declined";
    $message = "Your request for the topic <b>$topic</b> has been declined.";
    $type = "Schedule Request <strong>Declined</strong>";

    sendEmail($to, $subject, $message, $type);
} else {
    echo json_encode(array('status' => 'error'));
}
