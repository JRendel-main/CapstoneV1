<?php 
require_once '../db-connect.php';
include_once '../../certificate/generate-certificate.php';

session_start();
$peer_id = $_SESSION['peer_id'];

// check if there is a rank
$sql = "SELECT * FROM tbl_ratings WHERE peer_id = $peer_id";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
    // fetch the data
    $row = mysqli_fetch_assoc($result);
    $rank = $row['rank'];
    $points = $row['points'];
    $avg_rating = $row['avg_rating'];

    $sql1 = "SELECT * FROM tbl_peerinfo WHERE peer_id = $peer_id";
    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($result1);
    $firstname = $row1['firstname'];
    $lastname = $row1['lastname'];
    $email = $row1['email'];

    $fullnamefolder = $firstname . ' ' . $lastname;
    // capitalize it for the certificate
    $fullname = strtoupper($fullnamefolder);
    $type = 'Certificate of Achievement';
    $message = "This certificate is presented as a token of appreciation for their hard work and dedication.";
    $certificateBackground = '../../certificate/background.jpg';
    $logo = '../../certificate/logo.png';
    $neust = '../../certificate/neust.png';
    $signature = '../../certificate/signature.png';

    // for testing purposes
    // $rank = 'Novice';

    // update the rank based on points
    if ($points < 100) {
        $rank = 'Novice';
    } else if ($points >= 100 && $points < 200 && $rank != 'Junior') {
        // generate achivement based on rank
        $achievement = 'Junior Tutor';
        $confettimessage = 'Congratulations! You have achieved the rank of Junior Tutor. Please check your email for your certificate.';
        generateCertificate($type, $fullname, $achievement, $message, $certificateBackground, $logo, $neust, $signature, $email);
        // add confetti contents
        $confetti = '';
        $rank = 'Junior';
    } else if ($points >= 200 && $points < 300 && $rank != 'Experienced') {
        $achievement = 'Experienced Tutor';
        $confettimessage = 'Congratulations! You have achieved the rank of Experienced Tutor. Please check your email for your certificate.';
        generateCertificate($type, $fullname, $achievement, $message, $certificateBackground, $logo, $neust , $signature, $email);
        $confetti = '';
        $rank = 'Experienced';
    } else if ($points >= 300 && $points < 400 && $rank != 'Senior') {
        $achievement = 'Senior Tutor';
        $confettimessage = 'Congratulations! You have achieved the rank of Senior Tutor. Please check your email for your certificate.';
        generateCertificate($type, $fullname, $achievement, $message, $certificateBackground, $logo, $neust , $signature, $email);
        $confetti = '';
        $rank = 'Senior';
    } else if ($points >= 400 && $points < 500 && $rank != 'Master') {
        $achievement = 'Master Tutor';
        $confettimessage = 'Congratulations! You have achieved the rank of Master Tutor. Please check your email for your certificate.';
        generateCertificate($type, $fullname, $achievement, $message, $certificateBackground, $logo, $neust , $signature, $email);
        $confetti = '';
        $rank = 'Master';
    } else if ($points >= 500 && $rank != 'Grandmaster') {
        $achievement = 'Grandmaster Tutor';
        $confettimessage = 'Congratulations! You have achieved the rank of Grandmaster Tutor. Please check your email for your certificate.';
        generateCertificate($type, $fullname, $achievement, $message, $certificateBackground, $logo, $neust, $signature, $email);
        $confetti = '';
        $rank = 'Grandmaster';
    } else {
        $confettimessage = null;
    }

    // update the rank
    $sql = "UPDATE tbl_ratings SET rank = '$rank' WHERE peer_id = $peer_id";
    $result = mysqli_query($conn, $sql);

    if($result) {
        $response = array(
            'status' => 200,
            'message' => 'Rank updated successfully',
            'rank' => $rank,
            'points' => $points,
            'avg_rating' => $avg_rating,
            'confetti' => $confettimessage
        );
    } else {
        $response = array(
            'status' => 500,
            'message' => 'Error: ' . mysqli_error($conn),
            'confetti' => $confettimessage
        );
    }

    $sql = "SELECT profile FROM tbl_peerinfo WHERE peer_id = $peer_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $profile = $row['profile'];

    $response = array(
        'status' => 200,
        'message' => 'Rank fetched successfully',
        'rank' => $rank,
        'points' => $points,
        'avg_rating' => $avg_rating,
        'profile' => $profile,
        'confetti' => $confettimessage
    );
} else {
    // insert rank
    $sql = "INSERT INTO tbl_ratings (peer_id, rank, avg_rating, points) VALUES ($peer_id, 'Novice', 0, 0)";
    $result = mysqli_query($conn, $sql);

    if($result) {
        // fetch the data
        $sql = "SELECT * FROM tbl_ratings WHERE peer_id = $peer_id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $rank = $row['rank'];
        $points = $row['points'];
        $avg_rating = $row['avg_rating'];

        $response = array(
            'status' => 200,
            'message' => 'Rank inserted successfully',
            'rank' => $rank,
            'points' => $points,
            'avg_rating' => $avg_rating,
            'confetti' => null
        );
    } else {
        $response = array(
            'status' => 500,
            'message' => 'Error: ' . mysqli_error($conn),
            'confetti' => null
        );
    }
}
echo json_encode($response);
?>