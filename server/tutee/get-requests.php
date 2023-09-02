<?php
require_once '../db-connect.php';

session_start();
$peer_id = $_SESSION['peer_id'];

$sql = "SELECT * FROM tbl_request WHERE tutee_id = '$peer_id'";
$result = mysqli_query($conn, $sql);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {

    $tutor_id = $row['tutor_id'];
    $schedule_id = $row['schedule_id'];
    $request_status = $row['request_status'];
    $button = '<button class="btn btn-danger btn-sm btn-rounded" id="cancel-request">Cancel</button>';

    if ($request_status == 0) {
        $status = "<span class='badge badge-warning'>Pending</span>";
    } else if ($request_status == 1) {
        $status = "<span class='badge badge-success'>Accepted</span>";
    } else if ($request_status == 2) {
        $status = "<span class='badge badge-danger'>Rejected</span>";
    } else if ($request_status == 3) {
        $status = "<span class='badge badge-danger'>Cancelled</span>";
        $button = "<button class='btn btn-danger btn-sm btn-rounded' disabled>Cancelled</button>";
    } else {
        $status = "<span class='badge badge-info'>Finished</span>";
        $button = "<button class='btn btn-danger btn-sm btn-rounded' disabled>Finished</button>";
    }

    $sql2 = "SELECT * FROM tbl_peerinfo WHERE peer_id = '$tutor_id'";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($result2);
    $tutor_name = $row2['firstname'] . " " . $row2['lastname'];

    $sql3 = "SELECT * FROM tbl_schedules WHERE sched_id = $schedule_id";
    $result3 = mysqli_query($conn, $sql3);

    if (mysqli_num_rows($result3) > 0) {
        $row3 = mysqli_fetch_assoc($result3);
        $title = $row3['title'];
        $date = $row3['date'];
        // make the date readable
        $date = date("F j, Y", strtotime($date));
        $time = $row3['start'];
        // make the time readable
        $time = date("h:i A", strtotime($time));
        
    } else {
        $title = "Schedule has been deleted";
        $date = "Schedule has been deleted";
        $time = "Schedule has been deleted";
        $status = "<span class='badge badge-danger'>Deleted</span>";
    }

    // fetch the data on data
    $data[] = array(
        'request_id' => $row['request_id'], // this is needed for the cancel request function
        'tutorName' => $tutor_name,
        'subject' => $title,
        'date' => $date,
        'time' => $time,
        'status' => $status,
        'action' => $button
    );
}

echo json_encode($data);
