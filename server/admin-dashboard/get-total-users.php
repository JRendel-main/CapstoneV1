<?php
require_once '../db-connect.php';

// get the count of tutee, tutor and moderator and overall
$query = "SELECT COUNT(*) AS total FROM tbl_auth WHERE cat_id = 1 AND acc_status = 1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$tutee = $row['total'];

$query = "SELECT COUNT(*) AS total FROM tbl_auth WHERE cat_id = 2 AND acc_status = 1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$tutor = $row['total'];

$query = "SELECT COUNT(*) AS total FROM tbl_auth WHERE cat_id = 3 AND acc_status = 1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$moderator = $row['total'];

$query = "SELECT COUNT(*) AS total FROM tbl_auth WHERE cat_id != 0 AND acc_status = 1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$overall = $row['total'];

// send back to ajax request
$data = array(
    'status' => 'success',
    'tutee' => $tutee,
    'tutor' => $tutor,
    'moderator' => $moderator,
    'overall' => $overall
);

echo json_encode($data);

//close the session
mysqli_close($conn);
?>