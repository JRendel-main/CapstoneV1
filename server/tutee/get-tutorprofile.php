<?php
require_once '../db-connect.php';

$peer_id = $_POST['peer_id'];

$sql = "SELECT * FROM tbl_peerinfo WHERE peer_id = '$peer_id'";
$result = $conn->query($sql);

$response = array();
$response['error'] = false;

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // store data in tutor
        $tutor = array();
        $tutor['peer_id'] = $row['peer_id'];
        $tutor['firstname'] = $row['firstname'];
        $tutor['middlename'] = $row['middlename'];
        $tutor['lastname'] = $row['lastname'];
        $tutor['email'] = $row['email'];
        $tutor['contactnum'] = $row['contactnum'];
        $tutor['year'] = $row['year'];
        $sql4 = "SELECT course_name FROM tbl_course WHERE course_id = '" . $row['course'] . "'";
        $result4 = $conn->query($sql4);
        if (mysqli_num_rows($result4) > 0) {
            $row4 = mysqli_fetch_assoc($result4);
            $tutor['course'] = $row4['course_name'];
        } else {
            $tutor['course'] = "No course available";
        }

        $sql3 = "SELECT * FROM tbl_tutor_profile WHERE peer_id = '$peer_id'";
        $result3 = $conn->query($sql3);
        if (mysqli_num_rows($result3) > 0) {
            $row3 = mysqli_fetch_assoc($result3);
            $tutor['bio'] = $row3['bio'];
            $tutor['about_me'] = $row3['about_me'];
        } else {
            $tutor['bio'] = "Bio has not been setup yet";
            $tutor['about_me'] = "About me has not been setup yet";
        }
        
        $tutor['rating'] = '4.5';
        // store tutor in response
        $response['tutor'] = $tutor;

        $sql2 = "SELECT * FROM tbl_schedules WHERE peer_id = '$peer_id' AND sched_status = 1";
        $result2 = $conn->query($sql2);

        if (mysqli_num_rows($result2) > 0) {
            while ($row2 = mysqli_fetch_assoc($result2)) {
                // store every schedule in array schedule
                $schedule = array();
                $schedule = $row2;
                // get the end by adding the start time and duration(hours)
                $end = date('H:i:s', strtotime($schedule['start'] . ' + ' . $schedule['duration'] . ' hours'));
                // store the end in schedule
                $schedule['end'] = $end;
                $schedules[] = $schedule;

                // get the mode
                $mode = $schedule['mode'];
                

                // store schedules in response
                $response['schedules'] = $schedules;
            }
        } else {
            $response['schedules'] = '';
        }
    }
} else {
    $response['error'] = true;
    $response['message'] = "No tutor found";
}
// send back the JSON response to AJAX
echo json_encode($response);
