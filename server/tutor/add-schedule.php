<?php
require_once '../db-connect.php';
// get the peer_id from the session
session_start();
$peer_id = $_SESSION['peer_id'];

$title = $_POST['title'];
$description = $_POST['description'];
$place = $_POST['place'];
$start = $_POST['start'];
$duration = $_POST['duration'];
$date = $_POST['date'];

// get the exising schedukles
$sql = "SELECT * FROM tbl_schedules WHERE peer_id = '$peer_id'";
$result = mysqli_query($conn, $sql);
$existingSchedules = array();
while ($row = mysqli_fetch_assoc($result)) {
    $existingSchedules[] = array(
        'title' => $row['title'],
        'start' => $row['start'],
        'duration' => $row['duration'],
        'date' => $row['date']
    );
}

// get the exising schedules for the same date and time and duration and calculate the end time, user can't add a schedule if it overlaps with an existing schedule for the same date and time and duration, get the title of the existing schedule and send it back to the client 
$overlappingSchedules = array();
foreach ($existingSchedules as $schedule) {
    if ($schedule['date'] == $date && $schedule['start'] == $start && $schedule['duration'] == $duration) {
        $overlappingSchedules[] = $schedule['title'];
    }
}

if (count($overlappingSchedules) > 0) {
    // send back json response
    $response = array(
        'status' => 'error',
        'message' => 'Schedule overlaps with existing schedule(s)',
        'overlappingSchedules' => $overlappingSchedules
    );
    echo json_encode($response);
    exit();
}

// Insert the schedule into the database
$sql = "INSERT INTO tbl_schedules (peer_id, title, description, place, start, duration, date) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("issssss", $peer_id, $title, $description, $place, $start, $duration, $date);

if ($stmt->execute()) {
    // send back json response
    $response = array(
        'status' => 'success',
        'message' => 'Schedule added successfully'
    );
    echo json_encode($response);
} else {
    // send back json response
    $response = array(
        'status' => 'error',
        'message' => 'Error adding schedule'
    );
    echo json_encode($response);
}

$stmt->close();
$conn->close();
?>
