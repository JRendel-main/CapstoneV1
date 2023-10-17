<?php
// manila timezone
date_default_timezone_set('Asia/Manila');

require_once("../db-connect.php");

session_start();
$peer_id = $_SESSION["peer_id"];
$counts = array();

// count
$sql = "SELECT COUNT(*) AS total FROM tbl_request WHERE tutor_id = '$peer_id' AND request_status = 0";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$total_pending = $row["total"];

$sql1 = "SELECT COUNT(*) AS total FROM tbl_request WHERE tutor_id = '$peer_id' AND request_status != 3";
$result = mysqli_query($conn, $sql1);
$row = mysqli_fetch_assoc($result);
$total_sched = $row["total"];

// tutee should be unique
$sql2 = "SELECT COUNT(DISTINCT tutee_id) AS total FROM tbl_request WHERE tutor_id = '$peer_id' AND request_status = 1";
$result = mysqli_query($conn, $sql2);
$row = mysqli_fetch_assoc($result);
$total_tutee = $row["total"];

$counts["total_pending"] = $total_pending;
$counts["total_sched"] = $total_sched;
$counts["total_tutee"] = $total_tutee;

// put the count in data array
$data = array();
$data["counts"] = $counts;
$schedule = array();

$dateNow = date("Y-m-d");

// get all on going schedule
$sql3 = "SELECT * FROM tbl_schedules WHERE peer_id = '$peer_id' AND date LIKE '$dateNow%'";
$result = mysqli_query($conn, $sql3);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $start_time = $row["start"];
    // make start time readable
    $start_time = date("h:i A", strtotime($start_time));

    $title = $row["title"];
    $duration = $row["duration"] . " hour(s)";

    if ($row['mode'] = 0) {
        $mode = "Online";
    } else {
        $mode = "Face-to-face";
    }

    // put every schedule on index of schedule array
    $sched = array();
    $sched["start_time"] = $start_time;
    $sched["title"] = $title;
    $sched["duration"] = $duration;
    $sched["mode"] = $mode;

    array_push($schedule, $sched);
} else {
    $schedule_id = null;
    $start_time = null;
    $title = null;
    $duration = null;
    $mode = null;

    // put every schedule on index of schedule array
    $sched = array();
    $sched["start_time"] = $start_time;
    $sched["title"] = $title;
    $sched["duration"] = $duration;
    $sched["mode"] = $mode;

    array_push($schedule, $sched);
}
$data["schedule"] = $schedule;

echo json_encode($data);