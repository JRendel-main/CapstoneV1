<?php
require_once '../db-connect.php';

//
session_start();
$peer_id = $_SESSION['peer_id'];

// Retrieve POST data from AJAX request
$sched_id = $_POST['sched_id'];
$title = $_POST['title'];
$description = $_POST['description'];
$place = $_POST['place'];
$date = $_POST['date'];
$mode = $_POST['mode'];
$start = $_POST['start'];
$platform = $_POST['platform'];
$link = $_POST['link'];
$duration = $_POST['duration'];
$max_tutee = $_POST['max_tutee'];
$start = $_POST['start'];

if ($mode = 'online') {
    $mode = 1;
} else {
    $mode = 0;
}

// format the date to yyyy-mm-dd
$date = date('Y-m-d', strtotime($date));

// Update the schedule in the database
$sql2 = "UPDATE tbl_schedules SET title = '$title', description = '$description', mode = $mode, duration = $duration, max_tutee = $max_tutee WHERE sched_id = $sched_id";
if ($conn->query($sql2) === TRUE) {
    if ($mode == 1) {
        $sql3 = "UPDATE tbl_online SET platform = '$platform', link = '$link' WHERE sched_id = $sched_id";
        if ($conn->query($sql3) === TRUE) {
            $response['status'] = 'success';
            $response['message'] = 'Schedule updated successfully';
            echo json_encode($response);
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Error updating schedule: ' . $conn->error;
            echo json_encode($response);
        }
    } else {
        $sql3 = "UPDATE tbl_f2f SET place = '$place' WHERE sched_id = $sched_id";
        if ($conn->query($sql3) === TRUE) {
            $response['status'] = 'success';
            $response['message'] = 'Schedule updated successfully';
            echo json_encode($response);
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Error updating schedule: ' . $conn->error;
            echo json_encode($response);
        }
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Error updating schedule: ' . $conn->error;
    echo json_encode($response);
}
?>
