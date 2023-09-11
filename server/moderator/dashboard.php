<?php 
require_once '../db-connect.php';

$data = array();
// Get the number of users
$sql = "SELECT COUNT(*) AS tutee FROM tbl_auth WHERE cat_id = 1 AND acc_status = 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$totalTutee = $row['tutee'];

$sql = "SELECT COUNT(*) AS tutor FROM tbl_auth WHERE cat_id = 2 AND acc_status = 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$totalTutor = $row['tutor'];

// Get the number of sessions
$sql = "SELECT COUNT(*) AS sched FROM tbl_request WHERE request_status = 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$totalSched = $row['sched'];

// put the data in an array
$data['totalTutee'] = $totalTutee;
$data['totalTutor'] = $totalTutor;
$data['totalSched'] = $totalSched;

// get the date of every session for line chart for tbl_schedules
$sql = "SELECT COUNT(*) AS sched, DATE_FORMAT(date, '%M %d, %Y') AS date FROM tbl_schedules GROUP BY date";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $data['sched'][] = $row;
}


// return the data in json format
echo json_encode($data);
?>