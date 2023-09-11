<?php 
require_once '../db-connect.php'; 

$data = array();

$sql = "SELECT * FROM tbl_logs ORDER BY date DESC";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    
    // GET THE PEER ID AND GET THE NAME OF THE USER
    $peer_id = $row['peer_id'];
    $sql2 = "SELECT * FROM tbl_peerinfo WHERE peer_id = '$peer_id'";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($result2);
    $name = $row2['firstname'] . ' ' . $row2['lastname'];

    // make datetime readable
    $row['date'] = date('F d, Y h:i A', strtotime($row['date']));

    $sql3 = "SELECT * FROM tbl_auth WHERE peer_id = '$peer_id'";
    $result3 = mysqli_query($conn, $sql3);
    $row3 = mysqli_fetch_assoc($result3);
    $cat_id = $row3['cat_id'];

    if($cat_id == 1) {
        $role = 'Tutee';
    } elseif($cat_id == 2) {
        $role = 'Tutor';
    } elseif($cat_id == 3) {
        $role = 'Moderator';
    } else {
        $role = 'Administrator';
    }

    // put to logs array and data
    $logs[] = array(
        'role' => $role,
        'name' => $name,
        'date' => $row['date'],
        'action' => $row['action']
    );
    $data['logs'] = $logs;


    // get the chart data for scatter plot graph in c3.js add also if login or logout
    $date = date('Y-m-d', strtotime($row['date']));
    $sql4 = "SELECT * FROM tbl_logs WHERE date LIKE '$date%'";
    $result4 = mysqli_query($conn, $sql4);
    $count = mysqli_num_rows($result4);
    $chart[] = array(
        'date' => $date,
        'count' => $count
    );
    $data['chart'] = $chart;

}

// return the data in json format
echo json_encode($data);
?>