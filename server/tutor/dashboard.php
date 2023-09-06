<?php
session_start();
$peer_id = $_SESSION['peer_id'];

$sql = "SELECT * FROM tbl_peerinfo WHERE peer_id = $peer_id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$fullname = $row['firstname'] . ' ' . $row['lastname'];

$sql2 = "SELECT * FROM tbl_request WHERE tutee = $peer_id AND status = 0";
$result2 = $conn->query($sql2);
$pendingReq = $result2->num_rows;

$sql3 = "SELECT * FROM tbl_schedules WHERE peer_id = $peer_id AND date >= CURDATE()";
$result3 = $conn->query($sql3);
$upcoming = $result3->num_rows;

// send back the data
$data = array(
    'name' => $fullname,
    'pendingReq' => $pendingReq,
    'upcoming' => $upcoming
);
echo json_encode($data);
