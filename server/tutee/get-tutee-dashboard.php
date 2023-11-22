<?php
require_once '../db-connect.php';
session_start();
$peer_id = $_SESSION['peer_id'];

$data = array();
date_default_timezone_set('Asia/Manila');

// get tutor name
$sql = "SELECT * FROM tbl_peerinfo WHERE peer_id = '$peer_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    // uppercase first letter of first name and last name
    $firstname = ucfirst($firstname);
    $lastname = ucfirst($lastname);
    $name = $firstname . " " . $lastname;
    $profile = $row['profile'];

    $sql2 = "SELECT * FROM tbl_request WHERE tutee_id = '$peer_id'";
    $result2 = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($result2) > 0) {
        $pendingReq = mysqli_num_rows($result2);
    } else {
        $pendingReq = 0;
    }
    // date now
    $date = date("Y-m-d");
    $sql3 = "SELECT * FROM tbl_request WHERE tutee_id = '$peer_id' AND request_status = 1";
    $result3 = mysqli_query($conn, $sql3);
    if (mysqli_num_rows($result3) > 0) {
        $upcoming = mysqli_num_rows($result3);
    } else {
        $upcoming = 0;
    }

    $tuteeInfo = array();
    $tuteeInfo['name'] = $name;
    $tuteeInfo['pendingReq'] = $pendingReq;
    $tuteeInfo['upcoming'] = $upcoming;
    $tuteeInfo['profile'] = $profile;

    $data['tuteeInfo'] = $tuteeInfo;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
// TODAY'S DATE
$date = date("Y-m-d");
$sql4 = "SELECT a.start, a.title, a.mode, a.duration, a.max_tutee 
        FROM tbl_schedules a, tbl_request b 
        WHERE a.sched_id = b.schedule_id 
        AND b.tutee_id = $peer_id AND b.request_status = 1 AND a.date = '$date'";
$result4 = mysqli_query($conn, $sql4);

if (mysqli_num_rows($result4) > 0) {
    while ($row = mysqli_fetch_assoc($result4)) {
        $start = $row['start'];
        $title = $row['title'];
        $mode = $row['mode'];
        if ($mode == 0) {
            $mode = 'Online';
        } else {
            $mode = 'Face to Face';
        }
        $duration = $row['duration'];
        // convert the decimal to :
        $duration = explode(".", $duration);
        $duration = $duration[0] . "H" . " : " . $duration[1] . "M";
        $max_tutee = $row['max_tutee'];
        // get the end time by adding the duration(hours) to the start time
        $end = date('H:i', strtotime($start . ' + ' . $duration . ' hours'));
        // use am and pm to make it more readable to user
        $start = date('h:i A', strtotime($start));
        $end = date('h:i A', strtotime($end));
        // put every schedule to todaySched array inside data array
        $todaySched = array();
        $todaySched['start'] = $start;
        $todaySched['title'] = $title;
        $todaySched['mode'] = $mode;
        $todaySched['duration'] = $duration;
        $todaySched['max_tutee'] = $max_tutee;

        $data['todaySched'][] = $todaySched;
    }
} else {
    $todaySched = array();
}

// this week schedule
// get the date of the first day of the week
$firstDay = date('Y-m-d', strtotime('monday this week'));
// get the date of the last day of the week
$lastDay = date('Y-m-d', strtotime('sunday this week'));
// get the schedules of the tutor for this week
$sql5 = "SELECT a.start, a.title, a.mode, a.duration, a.max_tutee, a.date
        FROM tbl_schedules a, tbl_request b 
        WHERE a.sched_id = b.schedule_id 
        AND b.tutee_id = $peer_id AND b.request_status = 1 AND a.date BETWEEN '$firstDay' AND '$lastDay'";
$result5 = mysqli_query($conn, $sql5);

if (mysqli_num_rows($result5) > 0) {
    while ($row = mysqli_fetch_assoc($result5)) {
        $start = $row['start'];
        $title = $row['title'];
        $mode = $row['mode'];
        $date = $row['date'];
        if ($mode == 0) {
            $mode = 'Online';
        } else {
            $mode = 'Face to Face';
        }
        $duration = $row['duration'];
        $max_tutee = $row['max_tutee'];
        // get the end time by adding the duration(hours) to the start time
        $end = date('H:i', strtotime($start . ' + ' . $duration . ' hours'));
        // use am and pm to make it more readable to user
        $start = date('h:i A', strtotime($start));

        // put every schedule to todaySched array inside data array
        $weekSched = array();
        $weekSched['start'] = $start;
        $weekSched['title'] = $title;
        $weekSched['mode'] = $mode;
        // convert decimal to :
        $duration = explode(".", $duration);
        $duration = $duration[0] . "H" . " : " . $duration[1] . "M";
        $weekSched['duration'] = $duration;
        // check what days of the week the schedule is example if monday or friday
        $day = date('l', strtotime($row['date']));
        $weekSched['week'] = $day;
        $start = $row['start'];

        // Get today's date and time
        $todayDate = date('Y-m-d');
        $todayTime = date('H:i:s');

        // for testing purposes
        // $todayDate = '2023-09-08';
        // $todayTime = '10:00:00';

        // Get the schedule's start time and calculate the end time
        $start = $row['start'];
        $endTime = date('H:i:s', strtotime($start . ' + ' . $row['duration'] . ' hours'));

        // Compare the schedule's date and time with today's date and time
        if ($date < $todayDate) {
            $status = '<span class="badge badge-success">Done</span>';
        } else if ($date == $todayDate) {
            if ($todayTime < $start) {
                $status = '<span class="badge badge-warning">Waiting</span>';
            } else if ($todayTime >= $start && $todayTime <= $endTime) {
                $status = '<span class="badge badge-primary">Ongoing</span>';
            } else {
                // check if the schedule crosses midnight
                if ($endTime < $start) {
                    $status = '<span class="badge badge-success">Done</span>';
                } else {
                    $status = '<span class="badge badge-warning">Waiting</span>';
                }
            }
        } else {
            $status = '<span class="badge badge-primary">Upcoming</span>';
        }

        // $scheduleStatus now contains the status of the schedule (Waiting, Ongoing, Done, or Upcoming)
        $weekSched['status'] = $status;

        $data['weekSched'][] = $weekSched;
    }
} else {
    $weekSched = array();
}

echo json_encode($data);
