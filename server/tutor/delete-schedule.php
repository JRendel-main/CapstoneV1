<?php
require_once '../db-connect.php';

$id = $_POST['id'];

// Delete the schedule with the provided ID from the database
$sql = "DELETE FROM tbl_schedules WHERE sched_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

$response = array();

if ($stmt->execute()) {
    // Successfully deleted the schedule
    $response['status'] = 'success';
    $response['message'] = 'Schedule deleted successfully.';
} else {
    // Error deleting the schedule
    $response['status'] = 'error';
    $response['message'] = 'Error deleting schedule.';
}

$stmt->close();
$conn->close();

// Return the response as JSON
echo json_encode($response);
?>
