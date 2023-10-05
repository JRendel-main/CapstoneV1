<?php 
require_once('../db-connect.php');

$sql = "SELECT * FROM tbl_auth WHERE cat_id = 2 AND acc_status = 1";
$result = mysqli_query($conn, $sql);
$response = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $peer_id = $row['peer_id'];

        $sql = "SELECT * FROM tbl_peerinfo WHERE peer_id = $peer_id";
        $result2 = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result2) > 0) {
            while ($row2 = mysqli_fetch_assoc($result2)) {
                $fullname = $row2['firstname'] . ' ' . $row2['lastname'];
                $email = $row2['email'];
                
                // count how many students are enrolled to the tutor
                $sql = "SELECT * FROM tbl_request WHERE tutor_id = $peer_id";
                $result3 = mysqli_query($conn, $sql);
                $enrolled_students = mysqli_num_rows($result3);

                // get the tutor's points
                $sql = "SELECT * FROM tbl_ratings WHERE peer_id = $peer_id";
                $result4 = mysqli_query($conn, $sql);

                // check if there is result
                if (mysqli_num_rows($result4) > 0) {
                    while ($row4 = mysqli_fetch_assoc($result4)) {
                        $points = $row4['points'];
                    }
                } else {
                    $points = 0;
                }

                $response[] = array(
                    'peer_id' => $peer_id,
                    'fullname' => $fullname,
                    'email' => $email,
                    'enrolled_students' => $enrolled_students,
                    'points' => $points
                );
            }
        } 
    }
    echo json_encode($response);
} else {
    echo json_encode($response);
}