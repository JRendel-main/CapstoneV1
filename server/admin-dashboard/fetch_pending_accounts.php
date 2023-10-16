<?php

require_once '../db-connect.php';

// Query to fetch pending accounts from the database
$query = " SELECT a.peer_id, a.firstname, a.middlename, a.lastname, a.email, a.dob, a.year, a.course, a.cor, b.username FROM tbl_peerinfo a, tbl_auth b WHERE b.acc_status = 0 AND a.peer_id = b.peer_id";
$result = mysqli_query($conn, $query);

$accounts = [];
while ($row = mysqli_fetch_assoc($result)) {
    $bday = $row['dob'];
    $today = date("Y-m-d");
    $diff = date_diff(date_create($bday), date_create($today));
    $age = $diff->format('%y');
    $sql = 'SELECT course_name FROM tbl_course WHERE course_id = ' . $row['course'];
    $result2 = mysqli_query($conn, $sql);
    $row2 = mysqli_fetch_assoc($result2);
    $course = $row2['course_name'];

    $accounts[] = [
        'peerid' => $row['peer_id'],
        'name' => $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'],
        'age' => $age,
        'department' => $course,
        'year' => $row['year'],
        'cor' => $row['cor'],
        'email' => $row['email'],
    ];
}

header('Content-Type: application/json');
echo json_encode($accounts);
?>
