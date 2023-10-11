<?php 
include_once 'db-connect.php';
// get code and new pass to post
$code = $_POST['code'];
$newpass = $_POST['newpass'];

// check if code is valid
$sql = "SELECT * FROM tbl_auth WHERE hashed_code = '$code'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // get the peer_id
    $row = mysqli_fetch_assoc($result);
    $peer_id = $row['peer_id'];

    // update the password
    $sql2 = "UPDATE tbl_auth SET password = '$newpass' WHERE peer_id = '$peer_id'";
    $result2 = mysqli_query($conn, $sql2);

    // update the hashed code
    $sql3 = "UPDATE tbl_auth SET hashed_code = '' WHERE peer_id = '$peer_id'";
    $result3 = mysqli_query($conn, $sql3);

    $response['status'] = "success";
    $response['message'] = "Password successfully changed";
} else {
    $response['status'] = "error";
    $response['message'] = "Invalid code";
}

echo json_encode($response);
?>