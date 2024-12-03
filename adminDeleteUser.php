<?php
include('connection.php');

// Check if ID is set
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $delete_query = "DELETE FROM user WHERE id = $id";

    if ($conn->query($delete_query)) {
        header("Location: adminCheckUserInfo.php");
        exit();
    } else {
        echo "Error deleting user: " . $conn->error;
    }
}
?>
