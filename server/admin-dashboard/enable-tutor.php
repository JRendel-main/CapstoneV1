<?php 

require_once '../db-connect.php';
require_once '../../send-email.php';
$peer_id = $_POST['id'];

$sql = "UPDATE tbl_auth SET acc_status = 1 WHERE peer_id = $peer_id";
$result = mysqli_query($conn, $sql);

$sql2 = "DELETE FROM tbl_inactive_accounts WHERE peer_id = $peer_id";
$result2 = mysqli_query($conn, $sql2);

// send back success or error to json
if ($result && $result2) {
    $response = array(
        'status' => 'success'
    );
    $sql3 = "SELECT * FROM tbl_peerinfo WHERE peer_id = $peer_id";
    $result3 = mysqli_query($conn, $sql3);
    $row = mysqli_fetch_assoc($result3);
    $email = $row['email'];

    $to = $email;
    $subject = "Account Unrestricted";
    $type = "Account Unrestricted";
    $message = "Hello $name! Your account has been Unrestricted. You can now login to your account.";
    sendEmail($to, $subject, $type, $message);
} else {
    $response = array(
        'status' => 'error'
    );
}

echo json_encode($response);
?>