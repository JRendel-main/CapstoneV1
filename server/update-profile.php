<?php
require_once 'db-connect.php';
session_start();
$peer_id = $_SESSION['peer_id'];

$file = $_FILES['file'];

// process the uploaded file
if ($file['error'] === UPLOAD_ERR_OK) {
    $uploadDir = 'profile/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $sql = "SELECT * FROM tbl_peerinfo WHERE peer_id = '$peer_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $fullname = $row['firstname'] . '_' . $row['lastname'] . '.jpg';

    $fileName = $fullname;
    $filePath = $uploadDir . $fileName;

    $path = '../../server/' . $uploadDir . $fullname;

    // remove the space from the filename and replace it with underscore
    $fileName = str_replace(' ', '_', $fileName);

    // check if the file already exists, if so, delete it
    if (file_exists($filePath)) {
        unlink($filePath);
    }


    if (move_uploaded_file($file['tmp_name'], $filePath)) {
        // File uploaded successfully
        $response = array(
            'status' => 'success',
            'message' => 'File uploaded successfully',
            'fileName' => $fileName
        );

        // update the profile picture
        $sql = "UPDATE tbl_peerinfo SET profile = '$path' WHERE peer_id = '$peer_id'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // update successful
            $response = array(
                'status' => 'success',
                'message' => 'Profile picture updated successfully',
                'fileName' => $fileName
            );
        } else {
            // update failed
            $response = array(
                'status' => 'error',
                'message' => 'Profile picture update failed'
            );
        }
    } else {
        // Error uploading file
        $response = array(
            'status' => 'error',
            'message' => 'Error uploading file'
        );
    }
} else {
    // Error uploading file
    $response = array(
        'status' => 'error',
        'message' => 'Error uploading file'
    );
}

// Send JSON response
echo json_encode($response);
