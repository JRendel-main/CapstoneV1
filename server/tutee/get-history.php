<?php
require_once '../db-connect.php';

session_start();
$peer_id = $_SESSION['peer_id'];

$sql = "SELECT * FROM tbl_request WHERE tutee_id = '$peer_id' and request_status = 1 OR request_status = 3";
$result = mysqli_query($conn, $sql);

$data = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        $request_id = $row['request_id'];
        $tutor_id = $row['tutor_id'];
        $schedule_id = $row['schedule_id'];
        $request_status = $row['request_status'];

        $sql2 = "SELECT * FROM tbl_peerinfo WHERE peer_id = '$tutor_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $tutor_name = $row2['firstname'] . " " . $row2['lastname'];

        // only show on table where the date is less than or equal to the date now
        $sql3 = "SELECT * FROM tbl_schedules WHERE sched_id = '$schedule_id'";
        $result3 = mysqli_query($conn, $sql3);
        $row3 = mysqli_fetch_assoc($result3);

        // if there is schedule found
        if (mysqli_num_rows($result3) > 0) {
            $title = $row3['title'];
            $date = $row3['date'];
            $start = $row3['start'];

            if ($mode = 1) {
                $mode = "Online";
            } else {
                $mode = "Face to Face";
            }

        } else {
            $title = "No schedule found.";
            $date = "No schedule found.";
            $start = "No schedule found.";
        }

        $date = date("F j, Y", strtotime($date));
        $start = date("h:i A", strtotime($start));

        $date_time = $date . " at " . $start;

        $sql4 = "SELECT * FROM tbl_documentation WHERE request_id = $request_id";
        $result4 = mysqli_query($conn, $sql4);

        if (mysqli_num_rows($result4) > 0) {
            $row4 = mysqli_fetch_assoc($result4);
            $feedback = $row4['feedback'];
            $status = '<span class="badge badge-success">Completed</span>';
        } else {
            $feedback = "No feedback yet.";
            $status = '<span class="badge badge-warning">Waiting</span>';
        }

        // fetch the data on data
        $data[] = array(
            'request_id' => $row['request_id'], // this is needed for the cancel request function
            'tutorName' => $tutor_name,
            'topic' => $title,
            'date-time' => $date_time,
            'mode' => $mode,
            'status' => $status,
            'review' => $feedback
        );

    }
} else {
    $data[] = array(
        'status' => 'failed'
    );
}
echo json_encode($data);