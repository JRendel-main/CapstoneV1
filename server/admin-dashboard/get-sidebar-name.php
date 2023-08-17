<?php
require_once '../db-connect.php';
// get the session username
session_start();
$username = $_SESSION['username'];

// get the firstname,middlename,lastname from tbl_peerinfo using the peer_id using username from tbl_auth
$query = "SELECT peer_id FROM tbl_auth WHERE username = '$username'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$peer_id = $row['peer_id'];

$query = "SELECT firstname,middlename,lastname,peer_id FROM tbl_peerinfo WHERE peer_id = '$peer_id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$firstname = $row['firstname'];
$middlename = $row['middlename'];
$lastname = $row['lastname'];
$peer_id = $row['peer_id'];

// get the first letter on lastname
$lastnameini = substr($lastname, 0, 1);

$name = $firstname . ' ' . $lastnameini . '.';
$fullname = $firstname . ' ' . $middlename . ' ' . $lastname;

// send back to ajax request
$data = array(
    'status' => 'success',
    'name' => $name,
    'fullname' => $fullname,
    'peer_id' => $peer_id
);
echo json_encode($data);

//close the session
mysqli_close($conn);

?>

