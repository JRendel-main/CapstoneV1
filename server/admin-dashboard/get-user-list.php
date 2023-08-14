<?php
require_once '../db-connect.php';

$query = "SELECT * FROM tbl_peerinfo a, tbl_auth b WHERE a.peer_id = b.peer_id AND b.acc_status = 1";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)){
        $data[] = $row;
    }
    echo json_encode($data);
} else {
    echo json_encode(array());
}
?>