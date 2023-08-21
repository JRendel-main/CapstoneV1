<?php
require_once '../db-connect.php';

$response = array();

if(isset($_POST['id'])) {
    $sched_id = $_POST['id'];

    // Delete the schedule and retrieve its title in a single query
    $sql_delete = "DELETE FROM tbl_schedules WHERE sched_id = ? RETURNING title";
    $stmt_delete = $conn->prepare($sql_delete);
    $stmt_delete->bind_param("i", $sched_id);
    if ($stmt_delete->execute()) {
        $stmt_delete->bind_result($title);
        $stmt_delete->fetch();
        $stmt_delete->close();

        $response['status'] = 'success';
        $response['message'] = 'Schedule ' . $title . ' has been deleted.';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Something went wrong. Cannot delete schedule.';
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Invalid request. Schedule ID not provided.';
}

// Return the response as JSON
echo json_encode($response);
?>
