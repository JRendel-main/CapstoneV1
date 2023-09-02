<?php
require_once '../db-connect.php';

$peer_id = $_POST['peer_id'];

$sql = "SELECT * FROM tbl_request WHERE tutor_id = $peer_id AND request_status = 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $data = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $tutee_id = $row['tutee_id'];
        $sql2 = "SELECT * FROM tbl_schedules WHERE sched_id = " . $row['schedule_id'];
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);

        $sched_id = $row2['sched_id'];
        $tutee_id = $row2['peer_id'];
        $title = $row2['title'];
        $start = $row2['start'];
        $date = $row2['date'];
        // if the date is already past success, if not on going use badge pill
        $current_date = date('Y-m-d');
        if ($row2['date'] < $current_date) {
            $status = '<span class="badge badge-success">Success</span>';
        } else {
            $status = '<span class="badge badge-pill badge-info">On Going</span>';
        }

        // check the date to make it more readable to user add month
        $date = date('M d, Y', strtotime($date));

        // use am and pm to make it more readable to user
        $start = date('h:i A', strtotime($start));

        $sql3 = "SELECT * FROM tbl_peerinfo WHERE peer_id = $tutee_id";
        $result3 = mysqli_query($conn, $sql3);
        $row3 = mysqli_fetch_assoc($result3);

        $data[] = array(
            'sched_id' => $sched_id,
            'topic' => $title,
            'time' => $start,
            'status' => $status,
            'tutee_id' => $tutee_id,
            'tutee_name' => $row3['firstname'] . ' ' . $row3['lastname'],
            'date' => $date
        );
    }
} else {
    $data = array();
}

echo json_encode($data);
?>
