<?php
require_once '../db-connect.php';

// Get all the testimonials
$sql = "SELECT * FROM tbl_testimonials WHERE status = 0";
$result = mysqli_query($conn, $sql);
$response = array();

// Check if there are any results
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $peer_id = $row['peer_id'];
        $testimonial_messsage = $row['message'];

        // Get the peer's name
        $sql2 = "SELECT * FROM tbl_peerinfo WHERE peer_id = '$peer_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $firstname = $row2['firstname'];
        $middlename = $row2['middlename'];
        $lastname = $row2['lastname'];

        $fullname = $firstname . " " . $middlename . " " . $lastname;
        // add capitalization
        $fullname = ucwords($fullname);

        // put to response array
        $response[] = array(
            "testimonial_id" => $row['testimonial_id'], // this is not used in the datatable
            "peer_id" => $peer_id,
            "message" => $testimonial_messsage,
            "fullname" => $fullname
        );
    }
    // Display the array in JSON format
}
echo json_encode($response);
