<?php
require_once '../db-connect.php';

$peer_id = $_POST['peer_id'];

$sql = "SELECT * FROM tbl_request WHERE tutor_id = $peer_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $data = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $request_id = $row['request_id'];
        $tutee_id = $row['tutee_id'];
        $schedule_id = $row['schedule_id'];

        $sql2 = "SELECT * FROM tbl_documentation WHERE request_id = $request_id";
        $result2 = mysqli_query($conn, $sql2);

        if (mysqli_num_rows($result2) > 0) {
            $row2 = mysqli_fetch_assoc($result2);

            $docu_id = $row2['docu_id'];
            $picture_path = $row2['picture_path'];
            $feedback = $row2['feedback'];

            $sql3 = "SELECT * FROM tbl_peerinfo WHERE peer_id = $tutee_id";
            $result3 = mysqli_query($conn, $sql3);

            if (mysqli_num_rows($result3) > 0) {
                $row3 = mysqli_fetch_assoc($result3);

                $firstname = $row3['firstname'];
                $lastname = $row3['lastname'];

                $fullname = $firstname . ' ' . $lastname;
                // make start of letter capital
                $fullname = ucwords($fullname);

                $profile = $row3['profile'];

                $sql4 = "SELECT date FROM tbl_schedules WHERE sched_id = $schedule_id";
                $result4 = mysqli_query($conn, $sql4);

                if (mysqli_num_rows($result4) > 0) {
                    $row4 = mysqli_fetch_assoc($result4);

                    $date = $row4['date'];
                    // make more readable to user
                    $date = date('F d, Y', strtotime($date));
                }

                $data[] = array(
                    'docu_id' => $docu_id,
                    'picture_path' => $picture_path,
                    'feedback' => $feedback,
                    'fullname' => $fullname,
                    'profile' => $profile,
                    'date' => $date
                );
            }
        }

    }
}

echo json_encode($data);