<?php
require_once '../db-connect.php';
session_start();
$peer_id = $_SESSION['peer_id'];

$sql = "SELECT * FROM tbl_peerinfo WHERE peer_id = '$peer_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$firstname = $row['firstname'];
$middlename = $row['middlename'];
$lastname = $row['lastname'];
$email = $row['email'];
$contact = $row['contactnum'];
$course = $row['course'];
$year = $row['year'];

// get the bio from tbl_tutor_profile
$sql = "SELECT * FROM tbl_tutor_profile WHERE peer_id = '$peer_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if ($row) {
    $bio = $row['bio'];
    $expertise = $row['expertise_id'];
} else {
    $bio = "";
}

// pack the data into an array
$data = array(
    "tutor_id" => $peer_id,
    "firstname" => $firstname,
    "middlename" => $middlename,
    "lastname" => $lastname,
    "bio" => $bio,
    "email" => $email,
    "contact" => $contact,
    "course" => $course,
    "year" => $year,
    "expertise" => $expertise
);

echo json_encode($data);

