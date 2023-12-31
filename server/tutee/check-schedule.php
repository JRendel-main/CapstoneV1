<?php
require_once '../db-connect.php';

// get the schedule id and tutee id from post
$sched_id = $_POST['sched_id'];
session_start();
$peer_id = $_SESSION['peer_id'];

$sql = "SELECT * FROM tbl_request WHERE schedule_id = $sched_id AND tutee_id = $peer_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $request_status = $row['request_status'];

    if ($request_status == 1) {
        $response = array(
            'status' => 4,
            'success' => true,
            'request_id' => $row['request_id']
        );
    } else if ($request_status == 3) {
        $response = array(
            'status' => 5,
            'success' => true,
            'request_id' => $row['request_id']
        );
    } else {
        $response = array(
            'status' => 1,
            'success' => true,
            'request_id' => $row['request_id']
        );
    }
} else {
    $sql2 = "SELECT max_tutee FROM tbl_schedules WHERE sched_id = $sched_id";
    $result2 = mysqli_query($conn, $sql2);

    $sql3 = "SELECT COUNT(*) AS tutee_count FROM tbl_request WHERE tutee_id = $peer_id AND request_status = 1 AND schedule_id = $sched_id";
    $result3 = mysqli_query($conn, $sql3);

    if (mysqli_num_rows($result2) > 0) {
        // now compare the tutee count and max tutee
        $row2 = mysqli_fetch_assoc($result2);
        $max_tutee = $row2['max_tutee'];

        $row3 = mysqli_fetch_assoc($result3);
        $tutee_count = $row3['tutee_count'];

        // count how many enrolled
        $sql4 = "SELECT COUNT(*) AS tutee_count FROM tbl_request WHERE request_status = 1 AND schedule_id = $sched_id";
        $result4 = mysqli_query($conn, $sql4);

        $row4 = mysqli_fetch_assoc($result4);

        $enrolled_count = $row4['tutee_count'];

        // respond 2 if the schedule is full
        if ($enrolled_count >= $max_tutee) {
            $response = array(
                'status' => 2,
                'success' => true,
            );
        } else {
            $response = array(
                'status' => 0,
                'success' => true,
                'slot' => $enrolled_count . '/' . $max_tutee
            );
        }
    }
}
echo json_encode($response);