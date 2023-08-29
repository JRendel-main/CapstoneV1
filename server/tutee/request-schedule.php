<?php
require_once '../db-connect.php';

// get the schedule id and tutee id from post
$sched_id = $_POST['sched_id'];
$tutor_id = $_POST['tutor_id'];
$request_status = 0;

session_start();
$tutee_id = $_SESSION['peer_id'];

// get the tutor id from the schedule id
$sql = "INSERT INTO tbl_request (tutee_id, tutor_id, schedule_id, request_status) VALUES ($tutee_id, $tutor_id, $sched_id, $request_status)";
$result = mysqli_query($conn, $sql);

if($result) {
    $response = array(
        'success' => true,
        'message' => 'Request sent successfully.'
    );
} else {
    $response = array(
        'success' => false,
        'message' => 'Request failed to send.'
    );
}
echo json_encode($response);
// close the db connection
mysqli_close($conn);
?>
