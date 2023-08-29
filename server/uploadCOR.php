<?php
$file = $_FILES['file'];
$name = $_POST['name'];

// Process the uploaded file
if ($file['error'] === UPLOAD_ERR_OK) {
    // replace the spaces with underscores
    $name = str_replace(' ', '_', $name);
    $uploadDir = 'COR/' . $name . '/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $fileName = $file['name'];
    $filePath = $uploadDir . $fileName;

    if (move_uploaded_file($file['tmp_name'], $filePath)) {
        // File uploaded successfully
        $response = array(
            'status' => 'success',
            'message' => 'File uploaded successfully',
            'fileName' => $fileName
        );
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
?>
