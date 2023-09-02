<?php 
require_once '../db-connect.php'; 

$request_id = $_POST['request_id'];
$max_tutee = $_POST['max_tutee'];
$avail = $_POST['avail'];

if($max_tutee > $avail){
    $sql = "UPDATE tbl_request SET request_status = 1 WHERE request_id = $request_id";
    $result = mysqli_query($conn, $sql);

    // send back the data to ajax
    if($result) {
        echo json_encode(array('status' => 'success'));
    } else {
        echo json_encode(array('status' => 'error'));
    }
} else {
    echo json_encode(array('status' => 'full'));
}

