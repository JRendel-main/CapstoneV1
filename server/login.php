<?php
date_default_timezone_set('Asia/Manila');
include_once 'db-connect.php';

// Get the form data
$username = $_POST['username'];
$password = $_POST['password'];

// Perform server-side validation
if (empty($username) || empty($password)) {
    $response = array(
        'status' => 'error',
        'message' => 'Please enter username and password.'
    );
} else {
    // Check if the username and password are valid
    $query = "SELECT * FROM tbl_auth WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $accountStatus = $row['acc_status'];
        $cat_id = $row['cat_id'];
        $peer_id = $row['peer_id'];

        if ($accountStatus == 0) {
            $response = array(
                'status' => 'error',
                'message' => 'Your account is pending activation. Please wait for admin approval.'
            );
        } elseif ($accountStatus == 1) {
            // Start a new session
            session_start();

            // Set session variables
            $_SESSION['username'] = $username;
            $_SESSION['cat_id'] = $cat_id;
            $_SESSION['peer_id'] = $peer_id;
            $dateTime = date('Y-m-d H:i:s');

            $action = 'Login';

            $sql = "INSERT INTO tbl_logs (peer_id, action, date) VALUES ('$peer_id', '$action', '$dateTime')";
            mysqli_query($conn, $sql);
            // Redirect user to the appropriate directory based on account type
            switch ($cat_id) {
                case '1':
                    $response = array(
                        'status' => 'success',
                        'message' => 'Login successful.',
                        'directory' => 'pages/tutee'
                    );
                    break;
                case '2':
                    // get the peer_id = tutor_id
                    $peer_id = $row['peer_id'];
                    $sql = "SELECT * FROM tbl_ratings WHERE peer_id = '$peer_id'";
                    $result = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($result);

                    $points = 0;
                    $response = array(
                        'status' => 'success',
                        'message' => 'Login successful.',
                        'directory' => 'pages/tutor'
                    );
                    break;
                case '3':
                    $response = array(
                        'status' => 'success',
                        'message' => 'Login successful.',
                        'directory' => 'pages/moderator'
                    );
                    break;
                case '0':
                    $response = array(
                        'status' => 'success',
                        'message' => 'Login successful.',
                        'directory' => 'pages/admin'
                    );
                    break;
                default:
                    $response = array(
                        'status' => 'error',
                        'message' => 'Invalid account type.'
                    );
                    break;
            }
        } elseif ($accountStatus == 2) {
            $query1 = "SELECT reason FROM tbl_inactive_accounts WHERE peer_id = $peer_id";
            $result1 = mysqli_query($conn, $query1);
            $row1 = mysqli_fetch_assoc($result1);

            $response = array(
                'status' => 'error',
                'message' => 'Your account has been declined. Reason: <b>' . $row1['reason'] . '</b>'
            );

        } elseif ($accountStatus == 3) {
            $query1 = "SELECT reason FROM tbl_inactive_accounts WHERE peer_id = $peer_id";
            $result1 = mysqli_query($conn, $query1);
            $row1 = mysqli_fetch_assoc($result1);

            $response = array(
                'status' => 'error',
                'message' => 'Your account has been deactivated. Reason: <b>' . $row1['reason'] . '</b>'
            );
        }
        else {
            $response = array(
                'status' => 'error',
                'message' => 'Invalid account status. Please contact the admin for further assistance.'
            );
        }
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Invalid username or password.'
        );
    }
}

// Close the database connection
mysqli_close($conn);

// Return the response as JSON
echo json_encode($response);
?>
