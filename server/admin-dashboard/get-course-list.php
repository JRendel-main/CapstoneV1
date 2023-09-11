<?php
require_once '../db-connect.php';

// Define DataTables response array
$response = array();

// Fetch data from the database
$sql = "SELECT * FROM tbl_course";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $course_id = $row['course_id'];
        $course_name = $row['course_name'];
        $course_alias = $row['course_alias'];
        
        $action = '
        <button class="btn btn-primary" data-course_id="'.$course_id.'" id="edit-course-btn"><i class="fa fa-edit"></i></button>
        <a class="btn btn-danger" href="../../server/admin-dashboard/delete-course.php?course_id='.$course_id.'"><i class="fa fa-trash"></i></a>';

        // Add each row as a DataTables data array
        $response[] = array(
            $course_id,
            $course_name,
            $course_alias,
            $action
        );
    }
} else {
    // If there's no data, return an empty array
    $response = array();
}

// Wrap the response in a DataTables-compatible structure
$data = array(
    "data" => $response
);

// Output as JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
