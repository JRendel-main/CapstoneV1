<?php
require_once '../db-connect.php';

$peer_id = $_POST['peer_id'];

// get the tutor profile
$sql = "
    SELECT
        a.firstname,
        a.middlename,
        a.lastname,
        a.email,
        a.course,
        COALESCE(b.bio, 'No bio available') AS bio,
        COALESCE(b.about_me, 'No about me information') AS about_me,
        c.title,
        c.description,
        c.place,
        c.start,
        c.duration,
        c.date,
        c.max_tutee
    FROM
        tbl_peerinfo a
    JOIN
        tbl_schedules c ON a.peer_id = c.peer_id
    LEFT JOIN
        tbl_tutor_profile b ON a.peer_id = b.peer_id
    WHERE
        a.peer_id = $peer_id;
";


$sql2 = "SELECT bio, about_me FROM tbl_tutor_profile WHERE peer_id = $peer_id";

$result = $conn->query($sql);
if ($result) {
    $row = $result->fetch_assoc();
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();
    $firstname = $row['firstname'];
    $middlename = $row['middlename'];
    $lastname = $row['lastname'];
    $email = $row['email'];
    $title = $row['title'];
    $bio = $row2['bio'];
    $about_me = $row2['about_me'];
    $department = $row['course'];
    $description = $row['description'];
    $place = $row['place'];
    $start = $row['start'];
    $duration = $row['duration'];
    $date = $row['date'];
    $max_tutee = $row['max_tutee'];
    $fullname = $firstname . ' ' . $middlename . ' ' . $lastname;
    $tutor = array(
        'fullname' => $fullname,
        'email' => $email,
        'department' => $department,
        'bio' => $bio,
        'about' => $about_me,
        'title' => $title,
        'description' => $description,
        'place' => $place,
        'start' => $start,
        'duration' => $duration,
        'date' => $date,
        'max_tutee' => $max_tutee,
        'status' => 1
    );
    $response = array(
        'success' => true,
        'tutor' => $tutor
    );

} else {
    $response = array(
        'success' => false,
        'message' => 'Error: ' . $conn->error
    );
}
// send back the json to ajax
echo json_encode($response);

