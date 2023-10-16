<?php 

require_once("db-connect.php");

$subject = $_POST['subject'];
$priority = $_POST['priority'];
$message = $_POST['message'];
session_start();
$peer_id = $_SESSION['peer_id'];
$status = 0;

$sql = "INSERT INTO tbl_reports (subject, priority_level, report, peer_id, status) VALUES ('$subject', '$priority', '$message', '$peer_id', $status)";
$result = mysqli_query($conn, $sql);

if($result) {
    echo json_encode(array('status' => 'success'));
} else {
    echo json_encode(array('status' => 'error'));
}

?>