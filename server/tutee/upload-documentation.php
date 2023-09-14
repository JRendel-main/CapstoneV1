<?php
require_once '../db-connect.php';


// if the post are empty
if (empty($_POST['feedback']) || empty($_POST['rating']) || empty($_POST['tutor_id']) || empty($_POST['request_id'])) {
    $response = array(
        'success' => false,
        'message' => 'Please fill up the blanks.'
    );
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
        $response = array(
            'success' => false,
            'message' => 'Sorry, your file was not uploaded.'
        );
        return false;
        // if everything is ok, try to upload file
    } else {
        // check if the file is empty
        if (empty($_FILES['file'])) {
            $response = array(
                'success' => false,
                'message' => 'Please upload a file.'
            );
            echo json_encode($response);
            return false;
        } else {
            // check if file name is already exist in server folder if yes then rename the file add 1 at the end
            if (file_exists($target_file)) {
                $target_file = $target_dir . basename($_FILES["file"]["name"]) . '1';
            } else {
                $target_file = $target_dir . basename($_FILES["file"]["name"]);
            }
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                $response = 'The file ' . htmlspecialchars(basename($_FILES["file"]["name"])) . ' has been uploaded.';
                // insert into database
                $sql = "INSERT INTO tbl_documentation (request_id, picture_path, feedback)
                VALUES ($request_id, '$target_file', '$feedback')";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $sql ="UPDATE tbl_request SET request_status = 3 WHERE request_id = $request_id";
                    mysqli_query($conn, $sql);
                    
                    // check if there is a rating on sql
                    $sql = "SELECT * FROM tbl_ratings WHERE peer_id = $tutor_id";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    if ($row) {
                        // get the rating and add and averatge it
                        $curr_rating = $row['avg_rating'];
                        $points = $curr_rating + $rating;
                        $rating = $points / 2;
                        // add the current points depending on the rating
                        $sql = "UPDATE tbl_ratings SET points = points + $rating WHERE peer_id = $tutor_id";
                        mysqli_query($conn, $sql);
                        // update the rating
                        $sql = "UPDATE tbl_ratings SET avg_rating = $rating WHERE peer_id = $tutor_id";
                        mysqli_query($conn, $sql);

                        // now add 10 points in every documentation
                        $sql = "UPDATE tbl_ratings SET points = points + 10 WHERE peer_id = $tutor_id";
                        mysqli_query($conn, $sql);

                        // add 1 points per rating in every documentation
                        $sql = "UPDATE tbl_ratings SET points = points + $rating WHERE peer_id = $tutee_id";
                        mysqli_query($conn, $sql);

                        // if query is successful
                        $response = array(
                            'success' => true,
                            'message' => 'Documentation uploaded successfully.'
                        );

                        echo json_encode($response);
                        
                    } else {
                        // insert the rating
                        $sql = "INSERT INTO tbl_ratings (peer_id, avg_rating, points) VALUES ($tutor_id, $rating, 0)";
                        mysqli_query($conn, $sql);

                        // now add 10 points in every documentation
                        $sql = "UPDATE tbl_ratings SET points = points + 10 WHERE peer_id = $tutor_id";
                        mysqli_query($conn, $sql);

                        // add 1 points per rating in every documentation
                        $sql = "UPDATE tbl_ratings SET points = points + $rating WHERE peer_id = $tutee_id";
                        mysqli_query($conn, $sql);

                        // if query is successful
                        $response = array(
                            'success' => true,
                            'message' => 'Documentation uploaded successfully.'
                        );
                        echo json_encode($response);
                    }
                    return true;
                } else {
                    $response = array(
                        'success' => false,
                        'message' => 'Documentation failed to upload.'
                    );
                    echo json_encode($response);
                    return false;
                }
            } else {
                $response = array(
                    'success' => false,
                    'message' => 'Sorry, there was an error uploading your file.'
                );
                echo json_encode($response);
                return false;
            }
        }
    }
}

