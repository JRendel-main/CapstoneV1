<?php 

$course_name = $_POST['courseName'];
$course_alias = $_POST['courseAlias'];
// date now
$now = date('Y-m-d');


require_once '../db-connect.php';

$sql = "INSERT INTO tbl_course (course_name, course_alias, date_created) VALUES ('$course_name', '$course_alias', $now)";
$result = mysqli_query($conn, $sql);
if ($result){
    $status = "success";
} else {
    $status = "error";
}
echo json_encode(array("status" => "$status"));
?>