<?php 
require '../db-connect.php';

function checkifsent($peer_id, $points) {

}
// Get the peer_id = tutor_id
$peer_id = $_SESSION['peer_id'];

// Query the database for tutor ratings
$sql = "SELECT * FROM tbl_ratings WHERE peer_id = '$peer_id'";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result) {
    // Fetch the row from the result
    $row = mysqli_fetch_assoc($result);

    // Get the points from the row
    $points = $row['points'];

    // Use a switch statement to check the points range
    switch (true) {
        case $points >= 0 && $points <= 100:
            $checkPoints = 100;
            break;
        case $points >= 101 && $points <= 200:
            $checkPoints = 200;
            break;
        case $points >= 201 && $points <= 300:
            $checkPoints = 300;
            break;
        case $points >= 301 && $points <= 400:
            $checkPoints = 400;
            break;
        case $points >= 401 && $points <= 500:
            $checkPoints = 500;
            break;
        case $points >= 501:
            $checkPoints = 501;
            break;
        default:
            $checkPoints = 0;
            break;
    }

    // Call the checkifsent function with the determined checkPoints
    $checkIfSent = checkifsent($peer_id, $checkPoints);
} else {
    // Handle the case where the query fails
    echo "Error querying the database: " . mysqli_error($conn);
}