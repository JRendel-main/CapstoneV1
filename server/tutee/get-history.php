<?php
require_once '../db-connect.php';

session_start();
$peer_id = $_SESSION['peer_id'];

$sql = "SELECT * FROM tbl_request WHERE tutee_id = '$peer_id' and request_status = 1";
$result = mysqli_query($conn, $sql);

$data = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        $tutor_id = $row['tutor_id'];
        $schedule_id = $row['schedule_id'];
        $request_status = $row['request_status'];
        
        $status = '<span class="badge badge-info">Success</span>';

        $sql2 = "SELECT * FROM tbl_peerinfo WHERE peer_id = '$tutor_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $tutor_name = $row2['firstname'] . " " . $row2['lastname'];

        // get the date and time now
        $date_now = date("Y-m-d");
        $time_now = date("H:i:s");

        // only show on table where the date is less than or equal to the date now
        $sql3 = "SELECT * FROM tbl_schedules WHERE sched_id = '$schedule_id' AND date <= '$date_now;'";
        $result3 = mysqli_query($conn, $sql3);
        $row3 = mysqli_fetch_assoc($result3);

        $title = $row3['title'];
        $date = $row3['date'];
        $start = $row3['start'];

        $date = date("F j, Y", strtotime($date));
        $start = date("h:i A", strtotime($start));

        $date_time = $date . " at " . $start;

        $feedback = 'Marunong magturo si ' . $tutor_name . '.' . "\n" . 'Napakagaling niyang magturo.';
        $feedback = str_replace("'", "\'", $feedback);

        // fetch the data on data
        $data[] = array(
            'request_id' => $row['request_id'], // this is needed for the cancel request function
            'tutorName' => $tutor_name,
            'topic' => $title,
            'date-time' => $date_time,
            'status' => $status,
            'review' => $feedback
        );

    }
} else {
    $data[] = array(
        'message' => 'No requests found.',
        'stats' => 'Failed'
    );
}
echo json_encode($data);