<?php
require_once '../db-connect.php';

$sql = "SELECT * FROM tbl_auth WHERE acc_status = 2";
$result = mysqli_query($conn, $sql);
$data = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['category_id'] = 1) {
            $category = 'Tutee';
        } else if ($row['category_id'] = 2) {
            $category = 'Tutor';
        } else {
            $category = 'Admin';
        }
        $sql2 = 'SELECT * FROM tbl_peerinfo WHERE peer_id = ' . $row['peer_id'];
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);

        $firstname = $row2['firstname'];
        $lastname = $row2['lastname'];
        $email = $row2['email'];

        $name = $firstname . ' ' . $lastname;

        $sql3 = "SELECT * FROM tbl_inactive_accounts WHERE peer_id = " . $row['peer_id'];
        $result3 = mysqli_query($conn, $sql3);
        $row3 = mysqli_fetch_assoc($result3);

        $reason = $row3['reason'];
        $date = $row3['date'];
        // make date readable
        $date = date('F j, Y', strtotime($date));

        $button = '<button type="button" class="btn btn-sm btn-success enable-tutor" id="' . $row['peer_id'] . '" id="enable">Enable</button>';

        // put to data array
        $data[] = array(
            'peer_id' => $row['peer_id'],
            'name' => $name,
            'email' => $email,
            'category' => $category,
            'reason' => '<b><strong>'.$reason.'</strong></b>',
            'date' => $date,
            'action' => $button
        );
        
    }
} else {
    $data[] = '';
}

echo json_encode($data);
?>