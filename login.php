<?php
// Start the session
session_start();

// Check if the user is already logged in
if (isset($_SESSION['username'])) {
    // Get the account type from the session
    $accountType = $_SESSION['cat_id'];

    // Redirect based on the account type
    switch ($accountType) {
        case '1':
            header("Location: pages/tutee/index.php");
            break;
        case '2':
            header("Location: pages/tutor/index.php");
            break;
        case '3':
            header("Location: pages/moderator/index.php");
            break;
        case '0':
            header("Location: pages/admin/index.php");
            break;
        default:
            // Invalid account type, redirect to login page
            header("Location: register.php");
            break;
    }
    exit;
}
include_once 'includes/header.html';
include_once 'includes/login_page.html';
include_once 'includes/login-footer.html';
?>