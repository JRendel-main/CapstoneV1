<?php
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

            // Redirect user to the appropriate directory based on account type
            switch ($cat_id) {
                case '1':
                    header('Location: tutee/');
                    break;
                case '2':
                    header('Location: tutor/');
                    break;
                case '3':
                    header('Location: moderator/');
                    break;
                case '0':
                    header('Location: admin/');
                    break;
                default:
                    $response = array(
                        'status' => 'error',
                        'message' => 'Invalid account type.'
                    );
                    break;
            }
        } elseif ($accountStatus == 2) {
            $response = array(
                'status' => 'error',
                'message' => 'Your account has been disabled by the admin. Please contact the admin for further assistance.'
            );
        } else {
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
