<?php 
require_once '../db-connect.php';

$sql = "SELECT * FROM tbl_reports";
$result = $conn->query($sql);
$data = array();

if ($result->num_rows > 0) {
    $reports = array();
    while($row = $result->fetch_assoc()) {
        $peer_id = $row['peer_id'];
        $sql2 = "SELECT firstname, lastname FROM tbl_peerinfo WHERE peer_id = $peer_id";
        $result2 = $conn->query($sql2);
        $row2 = $result2->fetch_assoc();
        $peer_name = $row2['firstname'] . ' ' . $row2['lastname'];
        // camel case name
        $peer_name = ucwords($peer_name);

        $report_id = $row['report_id'];
        $subject = $row['subject'];
        $priority = $row['priority_level'];
        // add switch case to priority
        switch($priority) {
            case 1:
                $priority = '<span class="badge badge-pill badge-secondary">Low</span>';
                break;
            case 2:
                $priority = '<span class="badge badge-pill badge-warning">Medium</span>';
                break;
            case 3:
                $priority = '<span class="badge badge-pill badge-info">High</span>';
                break;
            case 4:
                $priority = '<span class="badge badge-pill badge-danger">Urgent</span>';
                break;
        }
        $status = $row['status'];
        if($status == 0) {
            // add badge pill
            $status = '<span class="badge badge-pill badge-success">Open</span>';
        } else {
            $status = '<span class="badge badge-pill badge-secondary">Closed</span>';
        }
        $report = $row['report'];
        
        $data[] = array(
            'id' => '#' . $report_id,
            'sender' => $peer_name,
            'subject' => $subject,
            'priority' => $priority,
            'status' => $status,
            'report' => $report
        );
    }
} else {
    $reports[] = '';
}
echo json_encode($data);
$conn->close();

?>