<?php

require_once '../db-connect.php';

$sql = 'SELECT peer_id FROM tbl_auth WHERE acc_status = 1 AND cat_id = 1';
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
        $email = $row2['email'];

        $tutor_profile = "https://ui-avatars.com/api/?name=test";

        // get the course
        $sql3 = 'SELECT course_name FROM tbl_course WHERE course_id = ' . $course;
        $result3 = mysqli_query($conn, $sql3);
        $row3 = mysqli_fetch_assoc($result3);
        $course = $row3['course_name'];

        $action = '<button type="button" class="btn btn-sm btn-success view-tutor" id="' . $tutor_id . '" id="view-tutor">View</button>';
        $disable = '<button type="button" class="btn btn-sm btn-danger disable-tutor" id="' . $tutor_id . '" id="disable"><i class="fe-user-x"></i></button>';

        // put to tutor list 
        $tutor_list['tutor_id'] = $tutor_id;
        $tutor_list['tutor_name'] = $fullname;
        $tutor_list['tutor_course'] = $course;
        $tutor_list['tutor_year'] = $year;
        $tutor_list['action'] = $disable;
        $tutor_list['tutor_profile'] = $tutor_profile;
        $tutor_list['tutor_email'] = $email;


        $data[] = $tutor_list;
    }
} else {
    $data[] = '';
}


echo json_encode($data);
?>