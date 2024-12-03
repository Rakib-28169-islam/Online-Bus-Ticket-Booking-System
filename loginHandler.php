<?php
session_start();
include 'connection.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Function to fetch a user/admin single data
    function fetch($sql)
    {
        global $conn;
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    // Check user credentials
    $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
    $user = fetch($sql);
    if ($user) {
        // Save user data in session
        $_SESSION['loggedIn'] = true;
        foreach ($user as $key => $value) {
            $_SESSION["user_$key"] = $value; // $_SESSION['user_id'] = $user['id'];
        }

        // Add user's name to session
        $_SESSION['user_name'] = $user['user_name'];

        header('Location: userHome.php');
        exit();
    }

    // Check admin credentials only if user credentials are invalid
    $sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
    $admin = fetch($sql);
    if ($admin) {
        // Save admin data in session
        $_SESSION['loggedIn'] = true;
        foreach ($admin as $key => $value) {
            $_SESSION["admin_$key"] = $value; // $_SESSION['admin_id'] = $admin['id'];
        }

        // Add admin's name to session
        $_SESSION['admin_name'] = $admin['userName'];

        header('Location: adminPanel.php');
        exit();
    }

    // Invalid credentials
    $_SESSION['error_msg'] = "";
    header('Location: loginForm.php?error=1');
    exit();
} else {
    $_SESSION['error_msg'] = "Please enter both email and password.";
    header('Location: loginForm.php?error=1');
    exit();
}
?>
