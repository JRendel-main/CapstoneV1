<?php 
require_once '../db-connect.php';

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

    // update the rank based on points
    if ($points < 100) {
        $rank = 'Novice';
    } else if ($points >= 100 && $points < 200) {
        $rank = 'Junior';
    } else if ($points >= 200 && $points < 300) {
        $rank = 'Experienced';
    } else if ($points >= 300 && $points < 400) {
        $rank = 'Senior';
    } else if ($points >= 400 && $points < 500) {
        $rank = 'Master';
    } else if ($points >= 500) {
        $rank = 'Grandmaster';
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
            'avg_rating' => $avg_rating
        );
    } else {
        $response = array(
            'status' => 500,
            'message' => 'Error: ' . mysqli_error($conn)
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
        'profile' => $profile
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
            'avg_rating' => $avg_rating
        );
    } else {
        $response = array(
            'status' => 500,
            'message' => 'Error: ' . mysqli_error($conn)
        );
    }
}
echo json_encode($response);
?>