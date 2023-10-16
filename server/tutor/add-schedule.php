<?php
require_once '../db-connect.php';
// get the peer_id from the session
session_start();
$peer_id = $_SESSION['peer_id'];

$title = $_POST['title'];
$description = $_POST['description'];
$place = $_POST['place'];
$mode = $_POST['mode'];
$platform = $_POST['platform'];
$link = $_POST['link'];
$date = $_POST['date'];
$start = $_POST['start'];
$hours = $_POST['hours'];
$minutes = $_POST['minutes'];
$max_tutee = $_POST['max_tutee'];
$sched_status = 1;

// if mode is f2f, the schedule should not pass 5pm, compute the start and add the hours and minutes to get the end time, the start time is hh:mm
if ($mode == 'f2f') {
    $startHour = intval(substr($start, 0, 2));
    $startMinute = intval(substr($start, 3, 2));

    // Calculate the duration in minutes based on hours and minutes
    $durationMinutes = ($hours * 60) + $minutes;

    // Calculate the end time in minutes
    $endHour = $startHour + floor(($startMinute + $durationMinutes) / 60);
    $endMinute = ($startMinute + $durationMinutes) % 60;

    // Check if the end time is after 5 PM (17:00)
    if ($endHour > 17 || ($endHour == 17 && $endMinute > 0)) {
        $response['status'] = 'error';
        $response['message'] = 'Face-to-face schedules must end before 5 PM.';
        echo json_encode($response);
        exit;
    }
}

// Check if the schedule overlaps with an existing schedule
$sql = "SELECT * FROM tbl_schedules WHERE peer_id = $peer_id AND date = '$date'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Convert the start time to minutes
    list($startHour, $startMinute) = explode(':', $start);
    $startMinutes = ($startHour * 60) + $startMinute;

    // Calculate the duration in minutes
    $durationMinutes = ($hours * 60) + $minutes;

    // Calculate the end time in minutes by adding the duration
    $endMinutes = $startMinutes + $durationMinutes;

    // Loop through the results
    while ($row = $result->fetch_assoc()) {
        // Convert the start time of the existing schedule to minutes
        list($rowStartHour, $rowStartMinute) = explode(':', $row['start']);
        $rowStartMinutes = ($rowStartHour * 60) + $rowStartMinute;

        // Calculate the duration of the existing schedule in minutes
        $rowDurationMinutes = ($row['duration'] * 60);

        // Calculate the end time of the existing schedule in minutes
        $rowEndMinutes = $rowStartMinutes + $rowDurationMinutes;

        // Check if the start time is between the start and end of the existing schedule
        if ($startMinutes >= $rowStartMinutes && $startMinutes <= $rowEndMinutes) {
            $response['status'] = 'error';
            $response['message'] = 'The schedule overlaps with an existing schedule';
            echo json_encode($response);
            exit;
        }

        // Check if the end time is between the start and end of the existing schedule
        if ($endMinutes >= $rowStartMinutes && $endMinutes <= $rowEndMinutes) {
            $response['status'] = 'error';
            $response['message'] = 'The schedule overlaps with an existing schedule';
            echo json_encode($response);
            exit;
        }
    }
}

if ($mode == 'online') {
    // insert to database
    $mode = 1;
    $sql = "INSERT INTO tbl_schedules (peer_id, title, description, mode, start, duration, date, max_tutee, sched_status) VALUES ($peer_id, '$title', '$description', $mode, '$start', $hours.$minutes, '$date', $max_tutee, $sched_status)";
    if ($conn->query($sql) === TRUE) {
        $sched_id = $conn->insert_id;
        $sql2 = "INSERT INTO tbl_online (sched_id, platform, link) VALUES ($sched_id, '$platform', '$link')";
        if ($conn->query($sql2) === TRUE) {
            $mode_id = $conn->insert_id;
            $sql3 = "UPDATE tbl_schedules SET mode_id = $mode_id WHERE sched_id = $sched_id";
            if ($conn->query($sql3) === TRUE) {
                $response['status'] = 'success';
                $response['message'] = 'The schedule was added successfully';
            } else {
                $response['status'] = 'error';
                $response['message'] = 'There was an error adding the schedule';
            }
        } else {
            $response['status'] = 'error';
            $response['message'] = 'There was an error adding the schedule';
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'There was an error adding the schedule';
    }
    
} else if ($mode == 'f2f') {
    $mode = 0;
    $sql = "INSERT INTO tbl_schedules (peer_id, title, description, mode, start, duration, date, max_tutee, sched_status) VALUES ($peer_id, '$title', '$description', $mode, '$start', $hours.$minutes, '$date', $max_tutee, $sched_status)";
    if ($conn->query($sql) === TRUE) {
        $sched_id = $conn->insert_id;
        $sql2 = "INSERT INTO tbl_f2f (sched_id,place) VALUES ($sched_id, '$place')";
        if ($conn->query($sql2) === TRUE) {
            $mode_id = $conn->insert_id;
            $sql3 = "UPDATE tbl_schedules SET mode_id = $mode_id WHERE sched_id = $sched_id";
            if ($conn->query($sql3) === TRUE) {
                $response['status'] = 'success';
                $response['message'] = 'The schedule was added successfully';
            } else {
                $response['status'] = 'error';
                $response['message'] = 'There was an error adding the schedule';
            }
        } else {
            $response['status'] = 'error';
            $response['message'] = 'There was an error adding the schedule';
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'There was an error adding the schedule';
    }
}

echo json_encode($response);
$conn->close();
?>
