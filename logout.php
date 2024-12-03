<?php
session_start(); // Start the session
include 'connection.php';

if (isset($_SESSION['user_id'])) {
    // Update the last_login for user
    $sql = "UPDATE user SET last_login = NOW() WHERE id = " . $_SESSION['user_id'];
    if ($conn->query($sql) === TRUE) {
        echo "Last login updated for user";
       
    } else {
        echo "Error updating user last login: " . $conn->error;
    }
}

if (isset($_SESSION['admin_id'])) {
    // Update the last_login for admin
    $sql = "UPDATE admin SET last_login = NOW() WHERE id = " . $_SESSION['admin_id'];
    if ($conn->query($sql) === TRUE) {
        echo "Last login updated for admin";
       
    } else {
        echo "Error updating admin last login: " . $conn->error;
    }
}

// Unset all session variables
$_SESSION = array();

// If it's desired to kill the session, also delete the session cookie.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Destroy the session
session_destroy();
header('Location: loginForm.php');
// Redirect to login page

exit();
?>
