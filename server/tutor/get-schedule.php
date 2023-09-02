<?php
require_once '../db-connect.php';

// get the peer_id from the session
session_start();
$peer_id = $_SESSION['peer_id'];
// Get the tutor's schedule
$sql = "SELECT * FROM tbl_schedules WHERE peer_id = $peer_id";
$result = $conn->query($sql);
// If there are results from database push to result array
if ($result->num_rows > 0) {
    $events = array();
    while ($row = $result->fetch_assoc()) {
        // Combine date and start time to form the full start datetime
        $startDateTime = $row['date'] . ' ' . $row['start'];
    
        // Calculate the end by adding the duration to the start
        $duration = $row['duration'];
        $endDateTime = strtotime("+$duration minutes", strtotime($startDateTime));
        $endDateTime = date('H:i:s', $endDateTime);
        $end = $row['date'] . ' ' . $endDateTime;
    
        $event = array();
        $event['id'] = $row['sched_id'];
        $event['title'] = $row['title'];
        $event['description'] = $row['description'];
        $event['mode'] = $row['mode'];
        $event['start'] = $startDateTime; // Use the combined datetime
        $event['duration'] = $row['duration'];
        $event['date'] = $row['date'];
        $event['end'] = $end;
    
        // Merge the event array into the return array
        array_push($events, $event);
    }
    echo json_encode($events);
} else {
    echo "0 results";
}
$conn->close();