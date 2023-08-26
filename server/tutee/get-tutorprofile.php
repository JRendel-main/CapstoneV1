<?php
require_once '../db-connect.php';

$peer_id = $_POST['peer_id'];

// get the tutor profile
$sql = "SELECT * FROM tbl_peerinfo WHERE peer_id = $peer_id";

$sql2 = "SELECT * FROM tbl_tutor_profile WHERE peer_id = $peer_id";

$sql3 = "SELECT * FROM tbl_schedules WHERE peer_id = $peer_id";

$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2);
$result3 = mysqli_query($conn, $sql3);
// send back the json to ajax
echo json_encode($response);

