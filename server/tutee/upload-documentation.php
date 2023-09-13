<?php
require_once '../db-connect.php';

// if the post are empty
if (empty($_POST['feedback']) || empty($_POST['rating']) || empty($_POST['tutor_id']) || empty($_POST['request_id'])) {
    $response = 'Please fill up the blanks.';
    return false;
} else {
    $documentation_photo = $_FILES['file'];
    $feedback = $_POST['feedback'];
    $rating = $_POST['rating'];
    $tutor_id = $_POST['tutor_id'];
    $request_id = $_POST['request_id'];
    session_start();
    $tutee_id = $_SESSION['peer_id'];

    // upload the picture to documentation folder
    $target_dir = "../documentation/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $response = 'Sorry, your file was not uploaded.';
        return false;
        // if everything is ok, try to upload file
    } else {
        // check if the file is empty
        if (empty($_FILES['file'])) {
            $response = 'Please upload a file.';
            echo json_encode($response);
            return false;
        } else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                $response = 'The file ' . htmlspecialchars(basename($_FILES["file"]["name"])) . ' has been uploaded.';
                // insert into database
                $sql = "INSERT INTO tbl_documentation (request_id, picture_path, feedback)
                VALUES ($request_id, '$target_file', '$feedback)";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $response = 'Documentation uploaded.';
                    echo json_encode($response);
                    return true;
                } else {
                    $response = 'Error uploading documentation.';
                    echo json_encode($response);
                    return false;
                }
            } else {
                $response = 'Sorry, there was an error uploading your file.';
                echo json_encode($response);
                return false;
            }
        }
    }
}

