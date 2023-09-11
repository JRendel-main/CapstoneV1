<?php 
date_default_timezone_set('Asia/Manila');
require_once '../db-connect.php';
require_once '../../send-email.php';

$sched_id = $_POST['id'];
$reason = $_POST['reason'];
$type="disabled";
$dateTime = date('Y-m-d H:i:s');

// Declare $conn and $sched_id as global variables
global $conn, $sched_id;

function getTutorTuteeEmail(){
    // Access $conn and $sched_id as global variables
    global $conn, $sched_id;
    $sql = "SELECT * FROM tbl_schedules WHERE sched_id = $sched_id";
    $result = mysqli_query($conn, $sql);

    // assume that schedule can only have one tutor and many tutees
    $row = mysqli_fetch_assoc($result);
    $tutor_id = $row['peer_id'];
    $title = $row['title'];
    $sql = "SELECT * FROM tbl_peerinfo WHERE peer_id = $tutor_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $tutor_email = $row['email'];

    $sql = "SELECT * FROM tbl_request WHERE schedule_id = $sched_id AND request_status = 1";
    $result = mysqli_query($conn, $sql);
    $tutee_emails = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $tutee_id = $row['tutee_id'];
            $sql = "SELECT * FROM tbl_peerinfo WHERE peer_id = $tutee_id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $tutee_email = $row['email'];
            array_push($tutee_emails, $tutee_email);
        }
    }
    return array($tutor_email, $tutee_emails, $title);
};

$sql = "SELECT * FROM tbl_disabled_scheds WHERE sched_id = $sched_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $sql = "UPDATE tbl_schedules SET sched_status = 0 WHERE sched_id = $sched_id";
    if ($conn->query($sql) === TRUE) {
        $sql = "UPDATE tbl_disabled_scheds SET reason = '$reason' WHERE sched_id = $sched_id";
        if ($conn->query($sql) === TRUE) {
            $response['status'] = 'success';
            $response['message'] = 'Schedule disabled successfully';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Error: ' . $sql . '<br>' . $conn->error;
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Error: ' . $sql . '<br>' . $conn->error;
    }
} else {
    $sql = "INSERT INTO tbl_disabled_scheds (sched_id, reason, type, date) VALUES ($sched_id, '$reason', '$type', '$dateTime')";
    if ($conn->query($sql) === TRUE) {
        $sql = "UPDATE tbl_schedules SET sched_status = 0 WHERE sched_id = $sched_id";
        if ($conn->query($sql) === TRUE) {
            $response['status'] = 'success';
            $response['message'] = 'Schedule disabled successfully';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Error: ' . $sql . '<br>' . $conn->error;
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Error: ' . $sql . '<br>' . $conn->error;
    }
}

// send email to tutor and every tutees
$emails = getTutorTuteeEmail();
$tutor_email = $emails[0];
$tutee_emails = $emails[1];
$title = $emails[2];

$to = $tutor_email;
$subject = "Schedule Disabled";
$type = "Schedule Disabled";
$message = "Hello, Your schedule <b>$title</b> has been disabled. Reason: $reason" . ". Please contact the administrator for more information.";
sendEmail($to, $subject, $type, $message);

foreach ($tutee_emails as $tutee_email) {
    $to = $tutee_email;
    $subject = "Schedule Disabled";
    $type = "Schedule Disabled";
    $message = "Hello, Your schedule $title has been disabled. Reason: $reason" . ". Please contact the administrator for more information.";
    sendEmail($to, $subject, $type, $message);
}

echo json_encode($response);
?>