<?php
require_once '../db-connect.php';

// count total courses top 5 users with most courses registered
$sql = "SELECT c.course_name, COUNT(p.peer_id) AS enrollment_count
FROM tbl_course c
JOIN tbl_peerinfo p ON c.course_id = p.course
GROUP BY c.course_name
ORDER BY enrollment_count DESC
LIMIT 5;
";
$result = mysqli_query($conn, $sql);

$data = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $course_name = $row['course_name'];
        $enrollment_count = $row['enrollment_count'];

        $data[] = array(
            'course_name' => $course_name,
            'enrollment_count' => $enrollment_count
        );
    }
} else {
    $data[] = '';
}

echo json_encode($data);
