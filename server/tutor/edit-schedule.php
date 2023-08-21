<?php
require_once '../db-connect.php';

//
session_start();
$peer_id = $_SESSION['peer_id'];

// Retrieve POST data from AJAX request
$eventId = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];
$place = $_POST['place'];
$date = $_POST['date'];
$duration = $_POST['duration'];

// check if the schedule overlaps with an existing schedule
$sql = "SELECT * FROM tbl_schedules WHERE peer_id = $peer_id AND date = '$date'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // convert the start time to seconds
    $startSeconds = strtotime($start);
    // calculate the end time by adding the duration to the start
    $endSeconds = strtotime("+$duration hours", $startSeconds);
    // loop through the results
    while ($row = $result->fetch_assoc()) {
        // convert the start time to seconds
        $rowStartSeconds = strtotime($row['start']);
        // calculate the end time by adding the duration to the start
        $rowEndSeconds = strtotime("+" . $row['duration'] . " hours", $rowStartSeconds);
        // check if the start time is between the start and end of the existing schedule
        if ($startSeconds >= $rowStartSeconds && $startSeconds <= $rowEndSeconds) {
            $response['status'] = 'error';
            $response['message'] = 'The schedule overlaps with an existing schedule';
            echo json_encode($response);
            exit;
        }
        // check if the end time is between the start and end of the existing schedule
        if ($endSeconds >= $rowStartSeconds && $endSeconds <= $rowEndSeconds) {
            $response['status'] = 'error';
            $response['message'] = 'The schedule overlaps with an existing schedule';
            echo json_encode($response);
            exit;
        }
    }
}

// Update the schedule in the database
$sql = "UPDATE tbl_schedules 
        SET title = ?, description = ?, place = ?, start = ?, duration = ? 
        WHERE sched_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssi", $title, $description, $place, $date, $duration, $eventId);

$response = array();

if ($stmt->execute()) {
    $response['status'] = 'success';
    $response['message'] = 'Schedule updated successfully';
} else {
    $response['status'] = 'error';
    $response['message'] = 'Error updating schedule';
}

$stmt->close();
$conn->close();

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
