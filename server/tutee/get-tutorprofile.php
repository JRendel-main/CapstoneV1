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
        $tutor['profile'] = $row['profile'];
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

                $start = $schedule['start'];
                $duration = $schedule['duration'];

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

                // Format the end time as hh:mm
                $end = sprintf('%02d:%02d', $endHours, $endMinutes);

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
