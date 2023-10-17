<?php
require_once '../db-connect.php';

$response = array();

$sql = "
    SELECT a.*, COALESCE(c.bio, 'No bio available') AS bio, COALESCE(c.about_me, 'No information available') AS about_me, COALESCE(c.expertise_id, 'No expertise available') AS expertise_id
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
        $profile = $row['profile'];
        $sql3 = "SELECT course_name FROM tbl_course WHERE course_id = '" . $row['course'] . "'";
        $result3 = mysqli_query($conn, $sql3);
        if (mysqli_num_rows($result3) > 0) {
            $row3 = mysqli_fetch_assoc($result3);
            $department = $row3['course_name'];
        } else {
            $department = "No course available";
        }
        // get the expertise of the tutor seperated by comma and put to array
        $expertise = explode(',', $row['expertise_id']);
        $bio = $row['bio'];
        $sql2 = "SELECT * FROM tbl_request WHERE tutor_id = '" . $row['peer_id'] . "'";
        $result2 = mysqli_query($conn, $sql2);
        $tutee_count = mysqli_num_rows($result2);
        $peer_id = $row['peer_id'];

        // get the rating of the tutor
        $sql4 = "SELECT * FROM tbl_ratings WHERE peer_id = '$peer_id'";
        $result4 = mysqli_query($conn, $sql4);
        $rating = 0;
        if (mysqli_num_rows($result4) > 0) {
            $row4 = mysqli_fetch_assoc($result4);
            $rating = $row4['avg_rating'];
            $rank = $row4['rank'];

            switch($rank) {
                case "novice":
                    $rank = "<span class='badge badge-pill badge-secondary'>Novice</span>";
                    break;
                case "junior":
                    $rank = "<span class='badge badge-pill badge-warning'>Junior</span>";
                    break;
                case "experienced":
                    $rank = "<span class='badge badge-pill badge-success'>Experienced</span>";
                    break;
                case "senior":
                    $rank = "<span class='badge badge-pill badge-primary'>Senior</span>";
                    break;
                case "master":
                    $rank = "<span class='badge badge-pill badge-danger'>Master</span>";
                    break;
                case "grand_master":
                    $rank = "<span class='badge badge-pill badge-dark'>Grand Master</span>";
                    break;
                default:
                    $rank = "<span class='badge badge-pill badge-secondary'>Novice</span>";
                    break;
            }
        }
        // store data in tutor
        $tutor = array(
            'peer_id' => $row['peer_id'],
            'fullname' => $fullname,
            'department' => $department,
            'bio' => $bio,
            'rating' => $rating,
            'expertise' => $expertise,
            'tutee_count' => $tutee_count,
            'profile' => $profile,
            'rank' => $rank
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

