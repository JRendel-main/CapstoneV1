<?php 
require_once '../db-connect.php';

$course_id = $_POST['id'];
$course_name = $_POST['name'];
$course_alias = $_POST['alias'];

$sql = "UPDATE tbl_course SET course_name = '$course_name', course_alias = '$course_alias' WHERE course_id = '$course_id'";
$result = mysqli_query($conn, $sql);
$response = array();

if ($result) {
    $response['status'] = 'success';
} else {
    $response['status'] = 'error';
}

echo json_encode($response);
?>