<?php

$request_id = $_POST['request_id'];

require_once '../db-connect.php';

$sql = "UPDATE tbl_request SET request_status = 3 WHERE request_id = '$request_id'";
$result = mysqli_query($conn, $sql);

if($result) {
    $response = array(
        'success' => true,
        'message' => 'Request cancelled successfully.'
    );
} else {
    $response = array(
        'success' => false,
        'message' => 'Request failed to cancel.'
    );
}
echo json_encode($response);