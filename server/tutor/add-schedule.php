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
// insert the schedule into the database
$sql = "INSERT INTO tbl_schedules (peer_id, title, description, place, start, duration, date) VALUES ($peer_id, '$title', '$description', '$place', '$start', $duration, '$date')";
if ($conn->query($sql) === TRUE) {
    $response['status'] = 'success';
    $response['message'] = 'The schedule was added successfully';
} else {
    $response['status'] = 'error';
    $response['message'] = 'There was an error adding the schedule';
}
echo json_encode($response);
$conn->close();
?>

