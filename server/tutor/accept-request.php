<?php 
require_once '../db-connect.php'; 
require_once '../../send-email.php';

$request_id = $_POST['request_id'];
$max_tutee = $_POST['max_tutee'];
$avail = $_POST['avail'];

if($max_tutee > $avail){
    $sql = "UPDATE tbl_request SET request_status = 1 WHERE request_id = $request_id";
    $result = mysqli_query($conn, $sql);

    // send back the data to ajax
    if($result) {
        echo json_encode(array('status' => 'success'));

        // send email to tutee
        $sql2 = "SELECT * FROM tbl_request WHERE request_id = $request_id";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);

        $tutee_id = $row2['tutee_id'];
        $schedule_id = $row2['schedule_id'];

        $sql3 = "SELECT * FROM tbl_peerinfo WHERE peer_id = $tutee_id";
        $result3 = mysqli_query($conn, $sql3);
        $row3 = mysqli_fetch_assoc($result3);

        $tutee_email = $row3['email'];

        $sql4 = "SELECT * FROM tbl_schedules WHERE sched_id = $schedule_id";
        $result4 = mysqli_query($conn, $sql4);
        $row4 = mysqli_fetch_assoc($result4);

        $mode = $row4['mode'];
        if ($mode == 1) {
            $sql5 = "SELECT * FROM tbl_online WHERE sched_id = $schedule_id";
            $result5 = mysqli_query($conn, $sql5);
            $row5 = mysqli_fetch_assoc($result5);

            $link = $row5['link'];
            $message = "Your request has been accepted. Please click the link below to join the session. <br><br> <a href='$link'>$link</a>";
        } else {
            $sql5 = "SELECT * FROM tbl_f2f WHERE sched_id = $schedule_id";
            $result5 = mysqli_query($conn, $sql5);
            $row5 = mysqli_fetch_assoc($result5);

            $place = $row5['place'];
            $message = "Your request has been accepted. Please go to the place below to join the session. <br><br> <b>Place:</b> $place";
        }
        $to = $tutee_email;
        $subject = "Request Accepted";
        $type = "Schedule Request <strong>Accepted</strong>";

        sendEmail($to, $subject, $message, $type);
    } else {
        echo json_encode(array('status' => 'error'));
    }
} else {
    echo json_encode(array('status' => 'full'));
}

