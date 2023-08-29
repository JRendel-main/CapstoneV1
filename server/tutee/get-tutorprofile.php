<?php
require_once '../db-connect.php';

$peer_id = $_POST['peer_id'];

// Construct the SQL query to fetch tutor information and schedules
$sql = "SELECT p.*, t.about_me, t.bio, s.* 
        FROM tbl_peerinfo p
        LEFT JOIN tbl_tutor_profile t ON p.peer_id = t.peer_id
        LEFT JOIN tbl_schedules s ON p.peer_id = s.peer_id
        WHERE p.peer_id = $peer_id";

$result = mysqli_query($conn, $sql);

$response = array(
    'success' => false,
    'message' => 'No tutor found.'
);

if (mysqli_num_rows($result) > 0) {
    $tutorInfo = array();
    $schedules = array();

    while ($row = mysqli_fetch_assoc($result)) {
        if (empty($tutorInfo)) {
            // Extract tutor profile information
            $fullname = $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'];
            $department = $row['course'];
            $contactnum = $row['contactnum'];
            $email = $row['email'];
            $gender = $row['gender'];
            $dob = $row['dob'];

            // Extract tutor profile information (if available)
            $about_me = isset($row['about_me']) ? $row['about_me'] : 'About me is not set yet.';
            $bio = isset($row['bio']) ? $row['bio'] : 'Bio is not set yet.';

            $tutorInfo = array(
                'tutor_id' => $peer_id,
                'fullname' => $fullname,
                'department' => $department,
                'contactnum' => $contactnum,
                'email' => $email,
                'gender' => $gender,
                'dob' => $dob,
                'about' => $about_me,
                'bio' => $bio
            );
        }

        if (!empty($row['sched_id'])) {
            // Extract schedule information
            $schedule = array(
                'sched_id' => $row['sched_id'],
                'title' => $row['title'],
                'description' => $row['description'],
                'start' => $row['start'],
                'place' => $row['place'],
                'duration' => $row['duration'],
                'max_tutee' => $row['max_tutee'],
                'date' => $row['date']
            );
            $schedules[] = $schedule;
        }
    }

    $response = array(
        'success' => true,
        'tutor' => $tutorInfo,
        'schedules' => $schedules
    );
}

// send back the JSON response to AJAX
echo json_encode($response);
?>
