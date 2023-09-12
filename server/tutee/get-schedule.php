<?php 
date_default_timezone_set('Asia/Manila');

require_once '../db-connect.php';
session_start();
$peer_id = $_SESSION['peer_id'];

$dateNow = date('Y-m-d');
$timeNow = date('H:i:s');

// display only past schedules
$sql = "SELECT * FROM tbl_request WHERE tutee_id = $peer_id AND request_status = 1 AND schedule_id IN (SELECT sched_id FROM tbl_schedules WHERE date < '$dateNow' OR (date = '$dateNow' AND duration < '$timeNow'))";
$result = $conn->query($sql);
$data = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $sql = "SELECT * FROM tbl_peerinfo WHERE peer_id = " . $row['tutor_id'];
        $result2 = $conn->query($sql);
        $row2 = mysqli_fetch_assoc($result2);

        $sql = "SELECT * FROM tbl_schedules WHERE sched_id = " . $row['schedule_id'] . " AND sched_status = 1";
        $result3 = $conn->query($sql);
        $row3 = mysqli_fetch_assoc($result3);
        

        // check the tbl_documentation if there no record add status waiting if there is record add status done
        $sql = "SELECT * FROM tbl_documentation WHERE request_id = " . $row['request_id'];
        $result4 = $conn->query($sql);
        if (mysqli_num_rows($result4) > 0) {
            $status = '<span class="badge badge-success">Done</span>';
        } else {
            $status = '<span class="badge badge-warning">Waiting</span>';
        }

        $data[] = array(
            'title' => $row3['title'], // 'title' => 'Documentation
            'date' => date('F d, Y', strtotime($row3['date'])),
            'time' => date('h:i A', strtotime($row3['start'])) . ' - ' . date('h:i A', strtotime($row3['duration'])),
            'tutor_name' => $row2['firstname'] . ' ' . $row2['lastname'],
            'status' => $status,
            'action' => '<button data-id="'.$row['schedule_id'].'" class="btn btn-success btn-block"><i class="fe-plus-circle" id="add-docu"></i> Add</button>'
        );
    }
} else {
    $data = array();
}

echo json_encode($data);


