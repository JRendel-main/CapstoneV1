<?php
require_once '../db-connect.php';

$response = array();

$sql = "
    SELECT a.*, COALESCE(c.bio, 'No bio available') AS bio, COALESCE(c.about_me, 'No information available') AS about_me
    FROM tbl_peerinfo a
    JOIN tbl_auth b ON a.peer_id = b.peer_id
    LEFT JOIN tbl_tutor_profile c ON a.peer_id = c.peer_id
    WHERE b.cat_id = 2;
";



$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
    $response['tutors'] = array();
    while($row = mysqli_fetch_assoc($result)) {
        $fullname = $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'];
        $department = $row['course'];
        $rating = '5';
        $expertise = ['Web Development', 'Python'];
        $bio = $row['bio'];
        $tutee_count = 0;
        $tutor = array(
            'peer_id' => $row['peer_id'],
            'fullname' => $fullname,
            'department' => $department,
            'bio' => $bio,
            'rating' => $rating,
            'expertise' => $expertise,
            'tutee_count' => $tutee_count
        );
        array_push($response['tutors'], $tutor);
    }
    $response['success'] = true;
} else {
    $response['success'] = false;
    $response['message'] = 'No tutors found.';
}
// send json to ajax
echo json_encode($response);
mysqli_close($conn);

