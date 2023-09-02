<?php
require_once '../db-connect.php';
session_start();
$peer_id = $_SESSION['peer_id'];

// get the data from post
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$contactnum = $_POST['contactnum'];
$course = $_POST['course'];
$year = $_POST['year'];

$bio = $_POST['bio'];
$expertise = $_POST['expertise'];

// update the tbl_peerinfo
$sql = "UPDATE tbl_peerinfo SET firstname = '$firstname', middlename = '$middlename', lastname = '$lastname', email = '$email', contactnum = '$contactnum', course = '$course', year = '$year' WHERE peer_id = '$peer_id'";
$result = mysqli_query($conn, $sql);

// update the tbl_tutor_profile
$sql = "UPDATE tbl_tutor_profile SET bio = '$bio', expertise_id = '$expertise' WHERE peer_id = '$peer_id'";
$result = mysqli_query($conn, $sql);

if($result) {
    $data = array(
        "status" => "success"
    );
} else {
    $data = array(
        "status" => "failed"
    );
}
echo json_encode($data);
