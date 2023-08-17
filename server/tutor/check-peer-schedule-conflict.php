<?php
require_once '../db-connect.php';

$_SESSION['peer_id'] = $peer_id;
// Retrieve input data from POST
$date = $_POST['date'];
$start = $_POST['start'];
$duration = $_POST['duration'];

// Calculate end time based on start time and duration
$startTime = strtotime($start);
$endTime = strtotime("+$duration minutes", $startTime);

// Get existing schedules of the peer for the specified date
$sql = "SELECT * FROM tbl_schedules WHERE peer_id = $peer_id AND date = '$date'";
$result = $conn->query($sql);

$overlap = false;

while ($row = $result->fetch_assoc()) {
    $existingStartTime = strtotime($row['start']);
    $existingEndTime = strtotime("+" . $row['duration'] . " minutes", $existingStartTime);

    // Check for overlap
    if (($startTime >= $existingStartTime && $startTime < $existingEndTime) ||
        ($endTime > $existingStartTime && $endTime <= $existingEndTime) ||
        ($startTime <= $existingStartTime && $endTime >= $existingEndTime)) {
        $overlap = true;
        break;
    }
}

if ($overlap) {
    echo "overlap";
} else {
    echo "no_overlap";
}

$conn->close();
?>
