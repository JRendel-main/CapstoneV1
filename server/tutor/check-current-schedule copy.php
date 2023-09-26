<?php 
require_once '../db-connect.php';

session_start();

$peer_id = $_SESSION['peer_id'];

$dateNow = date('Y-m-d');


$query = "SELECT * FROM tbl_request WHERE tutee_id = '$peer_id' AND (request_status = 0 OR request_status = 1)";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $sql2 = "SELECT * FROM tbl_schedules WHERE sched_id = '$row[schedule_id]' AND date >= '$dateNow'";
    $result2 = mysqli_query($conn, $sql2);

    // if there is pending schedule request 
    if (mysqli_num_rows($result2) > 0) {
        $data = array(
            'status' => 'error',
            'message' => 'You have a current schedule. You need to attend or cancel first before switching as Tutor.'
        );
        echo json_encode($data);
    } else {
        $data = array(
            'status' => 'success',
            'message' => 'You have no current schedule.'
        );
        echo json_encode($data);
    }
} else {
    $data = array(
        'status' => 'success',
        'message' => 'You have no current schedule.'
    );
    echo json_encode($data);
}
