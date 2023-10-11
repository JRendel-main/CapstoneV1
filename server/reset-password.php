<?php
require_once '../send-email.php';
require_once 'db-connect.php';
// get the post data
$email = $_POST['email'];

// generate random hashed string
function generateRandomString() {
    $length = 10;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);

    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength -1)];
    }

    return $randomString;
}


// check if there is email
$sql = "SELECT * FROM tbl_peerinfo WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
$response = array();

if (mysqli_num_rows($result) > 0) {
    // get the peer_id
    $row = mysqli_fetch_assoc($result);
    $peer_id = $row['peer_id'];
    $sql2 = "SELECT hashed_code FROM tbl_auth WHERE peer_id = '$peer_id'";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($result2);

    $hashed_code = $row2['hashed_code'];

    if ($hashed_code == '') {
        // generate random string
        $hashed_code_new = generateRandomString();

        // update the hashed code
        $sql3 = "UPDATE tbl_auth SET hashed_code = '$hashed_code_new' WHERE peer_id = '$peer_id'";
        $result3 = mysqli_query($conn, $sql3);

        // send email
        $to = $email;
        $subject = "Password Reset";
        $type = "reset";
        $message = "Hi, <br><br> Click the link below to reset your password <br><br> http://localhost/CapstoneV1/reset-pass.php?code=$hashed_code_new";

        $sendEmail = sendEmail($to, $subject, $message, $type);

        $response['status'] = "success";
        $response['message'] = "Check your email to reset your password";
        $response['code'] = $hashed_code_new;
    } else {
        // send the hashed code to the email
        $to = $email;
        $subject = "Password Reset";
        $type = "reset";
        $message = "Hi, <br><br> Click the link below to reset your password <br><br> http://localhost/CapstoneV1/reset-pass.php?code=$hashed_code";

        $sendEmail = sendEmail($to, $subject, $message, $type);

        $response['status'] = "success";
        $response['message'] = "Check your email to reset your password";
        $response['code'] = $hashed_code;
        $response['type'] = 'already';
    }
} else {
    $response['status'] = "success";
    $response['message'] = "Check your email to reset your password";
}

echo json_encode($response);
?>
