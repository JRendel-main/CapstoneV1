<?php 

require_once("../db-connect.php");

// Get the top 5 tutees
$sql = "SELECT a.peer_id, a.firstname, a.lastname, b.points, b.avg_rating 
        FROM tbl_peerinfo a, tbl_ratings b WHERE a.peer_id = b.peer_id ORDER BY b.points DESC LIMIT 5";
$result = mysqli_query($conn, $sql);
$response = array();
$rank = 0;

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // add rank 1 to 5
        $rank++;
        $fullname = $row['firstname'] . " " . $row['lastname'];
        $points = $row['points'];
        $avg_rating = $row['avg_rating'];

        $response[] = array(
            "status" => "success",
            "fullname" => $fullname,
            "rank" => '#' . $rank,
            "points" => $points,
            "avg_rating" => $avg_rating
        );
    }
} else {
    $response[] = array(
        "status" => "failed"
    );
}

echo json_encode($response);
