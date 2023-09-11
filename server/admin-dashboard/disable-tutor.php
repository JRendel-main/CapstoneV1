<?php 
require_once '../db-connect.php';
require_once '../../send-email.php';

// get the post
$peer_id = $_POST['tutor_id'];
$reason = $_POST['reason'];

$date = date('Y-m-d');

$type = 3;

// update the status
$sql = 'UPDATE tbl_auth SET acc_status = 2 WHERE peer_id = ' . $peer_id;
$result = mysqli_query($conn, $sql);

// check if there is already a record
$sql1 = 'SELECT * FROM tbl_inactive_accounts WHERE peer_id = ' . $peer_id;
$result1 = mysqli_query($conn, $sql1);

if (mysqli_num_rows($result1) > 0) {
    $sql2 = 'UPDATE tbl_inactive_accounts SET reason = "' . $reason . '", date = "' . $date . '", type = ' . $type . ' WHERE peer_id = ' . $peer_id;
    $result2 = mysqli_query($conn, $sql2);
} else {
    $sql2 = 'INSERT INTO tbl_inactive_accounts (peer_id, reason, date, type) VALUES (' . $peer_id . ', "' . $reason . '", "' . $date . '", ' . $type . ')';
    $result2 = mysqli_query($conn, $sql2);
}

// send back success or error to json
if ($result && $result2) {
    $response = array(
        'status' => 'success'
    );
    $sql3 = "SELECT email FROM tbl_peerinfo WHERE peer_id = $peer_id";
    $result3 = mysqli_query($conn, $sql3);
    $row = mysqli_fetch_assoc($result3);
    $email = $row['email'];

    $to = $email;
    $subject = "Account Restricted";
    $type = "Account Restricted";
    $message = "Hello $name! Your account has been restricted. Reason: $reason" . ". Please contact the administrator for more information.";
    sendEmail($to, $subject, $type, $message);
} else {
    $response = array(
        'status' => 'error'
    );
}

echo json_encode($response);
?>

