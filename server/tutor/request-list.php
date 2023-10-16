<?php
require_once '../db-connect.php';
$peer_id = $_POST['peer_id'];

// get the schedule id and tutee id from post
$sql = "SELECT * FROM tbl_schedules WHERE peer_id = $peer_id";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
    $data = array();

    while($row = mysqli_fetch_assoc($result)) {
        $sched_id = $row['sched_id'];
        $tutee_id = $row['peer_id'];
        $title = $row['title'];
        $description = $row['description'];
        $date = $row['date'];
        $start = $row['start'];
        $max_tutee = $row['max_tutee'];
        $duration = $row['duration'];
        // Split the start time into hours and minutes
list($startHours, $startMinutes) = explode(':', $start);

// Convert the hours and minutes to integers
$startHours = (int)$startHours;
$startMinutes = (int)$startMinutes;

// Calculate the duration in minutes
$durationInMinutes = $duration * 60;

// Calculate the total minutes for the start time
$startTotalMinutes = ($startHours * 60) + $startMinutes;

// Calculate the total minutes for the end time
$endTotalMinutes = $startTotalMinutes + $durationInMinutes;

// Calculate the hours and minutes for the end time
$endHours = floor($endTotalMinutes / 60);
$endMinutes = $endTotalMinutes % 60;

// Format the end time as hh.mm
$end = sprintf('%02d:%02d', $endHours, $endMinutes);

        // BASED ON HOW MANY REQUEST AND MAX TUTEE GET THE AVAILABLE SLOT
        $sql2 = "SELECT * FROM tbl_request WHERE schedule_id = $sched_id AND request_status = 1";
        $result2 = mysqli_query($conn, $sql2);
        $num_request = mysqli_num_rows($result2);
        if($num_request < $max_tutee) {
            // get the available slot by subtracting the max tutee to the number of request add the out of
            $avail = $max_tutee - $num_request;
            $availableSlot = $avail . ' / ' . $max_tutee;
            $enrolled = $num_request;

            $status = '<span class="badge badge-success">Available</span>';
        } else {
            $availableSlot = '0 / ' . $max_tutee;
            $status = '<span class="badge badge-danger">Unavailable</span>';
            $enrolled = $num_request;
        }
        // check if the schedule is past or not use date and time
        $current_date = date('Y-m-d');
        $current_time = date('H:i');
        if($date < $current_date) {
            $status = '<span class="badge badge-danger">Past</span>';
        } else if($date == $current_date) {
            if($start < $current_time) {
                $status = '<span class="badge badge-danger">Past</span>';
            }
        }
        // check the date to make it more readable to user add month
        $date = date('M d, Y', strtotime($date));

        // use am and pm to make it more readable to user
        $start = date('h:i A', strtotime($start));
        $end = date('h:i A', strtotime($end));
        
        $data[] = array(
            'sched_id' => $sched_id,
            'title' => $title.' - '.$description,
            'date' => $date,
            'time' => $start . ' - ' . $end,
            'availableSlot' => $availableSlot,
            'enrolled' => $enrolled,
            'status' => $status,
            'pending' => '<button class="btn btn-sm btn-success btn-view" data-sched_id="'.$sched_id.'" data-enrolled="'.$enrolled.'" data-max-tutee="'.$max_tutee.'">View</button>',
            'max_tutee' => $max_tutee

        );
        
    }
}
echo json_encode($data);
