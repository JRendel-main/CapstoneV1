<?php
require_once '../db-connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['peerid'], $_POST['reason'])) {
        $peerid = $_POST['peerid'];
        $reason = $_POST['reason'];

        // Update account status to 2 (declined)
        $sql = "UPDATE tbl_auth SET acc_status = 2 WHERE peer_id = $peerid";
        if (mysqli_query($conn, $sql)) {
            // Get the user's name
            $sql2 = "SELECT firstname, middlename, lastname FROM tbl_peerinfo WHERE peer_id = $peerid";
            $result2 = mysqli_query($conn, $sql2);
            if ($result2 && mysqli_num_rows($result2) > 0) {
                $row = mysqli_fetch_assoc($result2);
                $name = $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'];
            } else {
                $name = 'Unknown';
            }

            // Add the reason to tbl_inactive_accounts
            $sql3 = "INSERT INTO tbl_inactive_accounts (peer_id, reason, type) VALUES ($peerid, '$reason', 1)";
            if (mysqli_query($conn, $sql3)) {
                echo "Account of <b>$name</b> has been declined.";
            } else {
                echo "Error adding reason: " . mysqli_error($conn);
            }
        } else {
            echo "Error updating account status: " . mysqli_error($conn);
        }
    } else {
        http_response_code(400); // Bad Request
        echo "Missing required parameters.";
    }
} else {
    http_response_code(405); // Method Not Allowed
    echo "Only POST requests are allowed.";
}
?>
