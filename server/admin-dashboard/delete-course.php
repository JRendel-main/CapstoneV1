<?php 
require_once '../db-connect.php';

$course_id = $_POST['id'];

$sql = "DELETE FROM tbl_course WHERE course_id = '$course_id'";
$result = mysqli_query($conn, $sql);
$response = array();

if ($result) {
    $response['status'] = 'success';
} else {
    $response['status'] = 'error';
}

echo json_encode($response);
?>