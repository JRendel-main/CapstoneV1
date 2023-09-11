<?php
// manila timezone
date_default_timezone_set('Asia/Manila');
require_once '../db-connect.php';

$sql = "SELECT * FROM tbl_schedules WHERE sched_status = 1 ORDER BY date ASC";
$result = mysqli_query($conn, $sql);

$data = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // add start time and duration(hours)
        $start = $row['start'];
        $duration = $row['duration'];
        $end = date('H:i:s', strtotime($start . ' + ' . $duration . ' hours'));
        $date = $row['date'];
        $sched_id = $row['sched_id'];

        if (date('Y-m-d') == $date) {
            if (date('H:i:s') >= $start && date('H:i:s') <= $end) {
                $status = '<span class="badge badge-warning">Ongoing</span>';
            } else if (date('H:i:s') < $start) {
                $status = '<span class="badge badge-primary">Upcoming</span>';
            } else {
                $status = '<span class="badge badge-success">Finished</span>';
            }
        } else if (date('Y-m-d') > $date) {
            $status = '<span class="badge badge-success">Finished</span>';
        } else {
            $status = '<span class="badge badge-primary">Upcoming</span>';
        }

        //count how many tutees are enrolled
        $sql1 = "SELECT * FROM tbl_request WHERE schedule_id = " . $row['sched_id'] . " AND request_status = 1";
        $result1 = mysqli_query($conn, $sql1);
        $count = mysqli_num_rows($result1);


        $title = $row['title'];
        $description = $row['description'];
        $mode = $row['mode'];
        if ($mode == 0) {
            $sql3 = "SELECT * FROM tbl_f2f WHERE sched_id = " . $row['sched_id'];
            $result3 = mysqli_query($conn, $sql3);
            $row3 = mysqli_fetch_assoc($result3);
            $place = $row3['place'];
            $mode = 'Face to Face';
            $platform = '';
            $link = '';
        } else {
            $sql3 = "SELECT * FROM tbl_online WHERE sched_id = " . $row['sched_id'];
            $result3 = mysqli_query($conn, $sql3);
            $row3 = mysqli_fetch_assoc($result3);
            $platform = $row3['platform'];
            $link = $row3['link'];
            $mode = 'Online';
            $place = '';
        }

        $sql2 = "SELECT * FROM tbl_peerinfo WHERE peer_id = " . $row['peer_id'];
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $fullname = $row2['firstname'] . ' ' . $row2['lastname'];

        // make start and end readable
        $start = date('h:i A', strtotime($start));
        $end = date('h:i A', strtotime($end));
        // get every student enrolled in the schedule
        $sql2 = "SELECT * FROM tbl_request WHERE schedule_id = " . $row['sched_id'] . " AND request_status = 1";
        $result2 = mysqli_query($conn, $sql2);
        $data2 = array();
        if (mysqli_num_rows($result2) > 0) {
            while ($row2 = mysqli_fetch_assoc($result2)) {
                $sql3 = "SELECT * FROM tbl_peerinfo WHERE peer_id = " . $row2['tutor_id'];
                $result3 = mysqli_query($conn, $sql3);
                $row3 = mysqli_fetch_assoc($result3);
                $fullname = $row3['firstname'] . ' ' . $row3['lastname'];

                // put every student on $student and seperate with comma
                $data2[] = $fullname;
                $student = implode(', ', $data2);
            }
        } else {
            $data2[] = '';
            $student = implode(', ', $data2);
        }
        // make date more readable
        $date = date('F d, Y', strtotime($date));
        $data[] = array(
            'sched_id' => $sched_id,
            'title' => $title,
            'description' => $description,
            'mode' => $mode,
            'place' => $place,
            'platform' => $platform,
            'link' => $link,
            'date' => $date,
            'start' => $start,
            'end' => $end,
            'status' => $status,
            'fullname' => $fullname,
            'count' => $count,
            'tutees' => $student
        );
    }
} else {
    $data[] = '';
}

echo json_encode($data);
