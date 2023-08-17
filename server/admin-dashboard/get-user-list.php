<?php
require_once '../db-connect.php';

$query = "SELECT a.peer_id, a.firstname, a.middlename, a.lastname, a.email, a.course, a.year, b.cat_id FROM tbl_peerinfo a, tbl_auth b WHERE a.peer_id = b.peer_id AND b.acc_status = 1 AND b.cat_id != 0";
$result = mysqli_query($conn, $query);

$data = array();

if (mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)){
        if ($row['cat_id'] = 1){
            $type = "Tutor";
        } else if ($row['cat_id'] = 2){
            $type = "Tutee";
        } else if ($row['cat_id'] = 3){
            $type = "Moderator";
        }
        else {
            $type = "Administrator";
        }

        // Construct the row data
        $data[] = array(
            'type' => $type,
            'fullname' => $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname'],
            'course' => $row['course'],
            'year' => $row['year'],
            'email' => $row['email'],
            'action' => '<button class="btn btn-primary btn-sm" data-peerid="' . $row['peer_id'] . '" id="action">View</button>' // Example action button
        );
    }
    echo json_encode(array('data' => $data)); // Wrap data in a parent "data" key
} else {
    echo json_encode(array('data' => [])); // Return an empty array if no data found
}
?>
