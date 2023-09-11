<?php

require_once '../db-connect.php';

$sql = 'SELECT peer_id FROM tbl_auth WHERE acc_status = 1 AND cat_id = 2';
$result = mysqli_query($conn, $sql);
$data = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $sql2 = 'SELECT * FROM tbl_peerinfo WHERE peer_id = ' . $row['peer_id'];
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);

        $firstname = $row2['firstname'];
        $lastname = $row2['lastname'];

        $tutor_id = $row2['peer_id'];
        $fullname = $row2['firstname'] . ' ' . $row2['lastname'];
        $course = $row2['course'];
        $year = $row2['year'];

        $tutor_profile = "https://ui-avatars.com/api/?name=test";

        // get expertise
        $sql4 = 'SELECT expertise_id FROM tbl_tutor_profile WHERE peer_id = ' . $tutor_id;
        $result4 = mysqli_query($conn, $sql4);
        if (mysqli_num_rows($result4) > 0) {
            $row4 = mysqli_fetch_assoc($result4);
            $expertise = $row4['expertise_id'];
        } else {
            $expertise = '';
        }

        // get the course
        $sql3 = 'SELECT course_name FROM tbl_course WHERE course_id = ' . $course;
        $result3 = mysqli_query($conn, $sql3);
        $row3 = mysqli_fetch_assoc($result3);
        $course = $row3['course_name'];

        $action = '<button type="button" class="btn btn-sm btn-success view-tutor" id="' . $tutor_id . '" id="view-tutor">View</button>';
        $disable = '<button type="button" class="btn btn-block btn-danger disable-tutor" id="' . $tutor_id . '" id="disable">Disable Tutor Account</button>';

        // put to tutor list 
        $tutor_list['tutor_id'] = $tutor_id;
        $tutor_list['tutor_name'] = $fullname;
        $tutor_list['tutor_course'] = $course;
        $tutor_list['tutor_year'] = $year;
        $tutor_list['action'] = $action;
        $tutor_list['expertise'] = $expertise;
        $tutor_list['tutor_profile'] = $tutor_profile;
        $tutor_list['disable'] = $disable;


        $data[] = $tutor_list;
    }
} else {
    $data[] = '';
}


echo json_encode($data);
?>